<?php

namespace RiotClient;

use RiotClient\Client;
use RiotClient\Result;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\BadResponseException;

abstract class BaseClient
{
    /**
     * The list of regions and their api urls.
     * @var array.
     */
    const REGIONS = [
        'br' => 'br1.api.riotgames.com',
        'eune' => 'eun1.api.riotgames.com',
        'euw' => 'euw1.api.riotgames.com',
        'jp' => 'jp1.api.riotgames.com',
        'kr' => 'kr.api.riotgames.com',
        'lan' => 'la1.api.riotgames.com',
        'las' => 'la2.api.riotgames.com',
        'na' => 'na1.api.riotgames.com',
        'oce' => 'oc1.api.riotgames.com',
        'tr' => 'tr1.api.riotgames.com',
        'ru' => 'ru.api.riotgames.com',
        'pbe' => 'pbe1.api.riotgames.com',
    ];

    /**
     * The debug mode.
     * @var boolean.
     */
    const DEBUG = true;

    /**
     * The api key.
     * @var string.
     */
    protected $apiKey;

    /**
     * The default region.
     * @var string.
     */
    protected $defaultRegion;

    /**
     * The http client.
     * @var GuzzleHttp\Client.
     */
    protected $httpClient;

    /**
     * The endpoint for the client.
     * @var string.
     */
    protected $endpoint;

    /**
     * The version for the client.
     * @var string.
     */
    protected $version;

    /**
     * Constructs a new instance of the BaseClient class.
     *
     * @param string $apiKey The Riot Games API key.
     * @param GuzzleHttp\Client $httpClient The HTTP client.
     * @param string $defaultRegion The default region to use for method calls on this client.
     */
    final public function __construct($apiKey, $httpClient, $defaultRegion)
    {
        $this->apiKey = $apiKey;
        $this->httpClient = $httpClient;
        $this->defaultRegion = $defaultRegion;
    }

    /**
     * Gets the url for the current region, endpoint and version.
     *
     * @param optional string $region Region to use for the url. Defaults to the default region.
     *
     * @return string The url for this API client.
     */
    protected function url($region = '')
    {
        $region = $region ? $region : $this->defaultRegion;
        return 'https://' . self::REGIONS[$region] . '/lol/' . $this->endpoint . '/' . $this->version;
    }

    /**
     * Executes a request.
     *
     * @param string $method The request method.
     * @param string $endpoint The endpoint to add to the url.
     * @param optional array $parameters The parameters to send with the request.
     * @param optional string $region The region to execute the request on. Defaults to the default region.
     * @param optional string $modelClass The class to convert the data to. Defaults to an array.
     * @param optional string $dataType The data type to send the parameters as.
     *      Defaults to query string if the method is GET, defaults to json if the method is anything else.
     *
     * @return mixed Model class if provided, array if model class is set to array.
     */
    protected function request($method, $endpoint, $parameters = [], $region = '', $modelClass = 'array', $dataType = '')
    {
        // Set the url for the request
        $url = $this->url($region) . $endpoint;

        // Set the data array
        $data = [
            'query' => [],
        ];

        // Check if the parameters itself contains the 'query' array
        // - this means the parameters array is the full data array
        if (isset($parameters['query']) && is_array($parameters['query'])) {
            $data = $parameters;
        } else {
            // Check if a data type is set, if so use that data type
            if ($dataType) {
                $data[$dataType] = $parameters;
            } elseif (strtolower($method) == 'get') {
                // If the request method is GET, add the received parameters to the query data
                $data['query'] = array_merge($data['query'], $parameters);
            } elseif (!empty($parameters)) {
                // If the request method is anything but GET, it should be send as JSON data
                $data['json'] = $parameters;
            }
        }

        // Check if we should add the debug method
        if (self::DEBUG) {
            $data['on_stats'] = function ($stats) use (&$url) {
                echo $url . '<br>';
            };
        }

        // Add the api key to the query data
        if (!isset($data['query'])) {
            $data['query'] = [];
        }
        $data['query']['api_key'] = $this->apiKey;

        // Execute the request and return the response
        try {
            return $this->parse($this->httpClient->request($method, $url, $data), $modelClass);
        } catch (BadResponseException $ex) {
            return $this->parse($ex->getResponse(), $modelClass);
        }
    }

    /**
     * Provides magic request methods functionality, for example calling $this->get() or $this->post().
     *
     * @param string $method The method being called.
     * @param array $arguments The arguments sent to the method.
     *
     * @return mixed The result of the request method.
     */
    public function __call($method, $arguments)
    {
        if (count($arguments) < 1) {
            throw new \InvalidArgumentException('Magic request methods require an endpoint.');
        }

        // Add the request method to the arguments and call the request method
        array_unshift($arguments, $method);
        return call_user_func_array([$this, 'request'], $arguments);
    }

    /**
     * Sets the default region.
     *
     * @param string $defaultRegion The default region.
     *
     * @return $this The current object.
     */
    public function setDefaultRegion($defaultRegion)
    {
        $this->defaultRegion = $defaultRegion;
        return $this;
    }

    /**
     * Parses a response and converts it to the provided model.
     *
     * @param Repsonse $response The response.
     * @param string $class The model class to convert the response data to.
     *
     * @return Model A new instance of the model with the parsed data.
     */
    public function parse(Response $response, $class)
    {
        // Parse the response body
        $array = json_decode($response->getBody(), true);

        // Create the result
        $result = new Result($response, $array);

        // Check if we should return an array as data
        if ($class == 'array') {
            $result->data = $array;
            return $result;
        }

        // Check if the data should be parsed as an integer
        if ($class == 'int') {
            $result->data = $this->parseInt($array);
            return $result;
        }

        // Create the model and parse the response
        $model = (new $class())->parse($array);
        $result->data = $model;
        return $result;
    }

    /**
     * Parses response data as an int.
     *
     * @param mixed $data The response data.
     *
     * @return int The parsed response.
     */
    protected function parseInt($data)
    {
        if (is_array($data)) {
            return 0;
        }
        $data = (int)$data;
        if ($data > 0) {
            return $data;
        }
        return 0;
    }
}
