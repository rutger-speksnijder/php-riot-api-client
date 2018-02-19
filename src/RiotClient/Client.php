<?php

namespace RiotClient;

use RiotClient\Exceptions\InvalidRegionException;
use RiotClient\Exceptions\InvalidClientException;
use GuzzleHttp\Client as HTTPClient;
use RiotClient\BaseClient;

class Client
{
    /**
     * The Riot Games API key, can be obtained from the https://developer.riotgames.com website.
     * @var string.
     */
    private $apiKey;

    /**
     * The default region to use for the API requests.
     * @var string.
     */
    private $defaultRegion;

    /**
     * The list of clients and their objects.
     * @var array.
     */
    private $clients = [
        'championMastery' => null,
        'champion' => null,
        'league' => null,
        'staticData' => null,
        'status' => null,
        'match' => null,
        'spectator' => null,
        'summoner' => null,
        'thirdPartyCode' => null,
        'tournamentStub' => null,
        'tournament' => null,
    ];

    /**
     * The http client.
     * @var GuzzleHttp\Client.
     */
    private $httpClient;

    /**
     * Constructs a new instance of the Client class.
     *
     * @param string $apiKey The Riot Games API key, can be obtained from the https://developer.riotgames.com website.
     * @param optional string $defaultRegion The default region to use for the API requests.
     *
     * @throws InvalidRegionException Throws an exception for invalid/unsupported regions.
     */
    public function __construct($apiKey, $defaultRegion = '')
    {
        // Check if the region exists
        if ($defaultRegion) {
            $this->validateRegion($defaultRegion);
        }

        // Set properties
        $this->apiKey = $apiKey;
        $this->defaultRegion = $defaultRegion;

        // Create the http client
        $this->httpClient = new HTTPClient();
    }

    /**
     * Handles calling unexisting methods and binds them to clients, if they exist.
     *
     * @param string $name The called method name.
     * @param array $arguments The arguments sent to the method.
     *
     * @return mixed An instance extended from the BaseClient class if a client is called.
     */
    public function __call($name, $arguments)
    {
        // Check if the name is a client
        if (array_key_exists($name, $this->clients)) {
            // Get the region from the arguments, if any
            $region = '';
            $overwrite = false;
            if (!empty($arguments[0]) && is_string($arguments[0])) {
                $region = $arguments[0];
                $overwrite = true;
            }

            // Return the result of the create client method
            return $this->createClient($name, $region, $overwrite);
        }
    }

    /**
     * Validates a region.
     *
     * @param string $region The region.
     *
     * @throws InvalidRegionException Throws an exception for invalid regions.
     *
     * @return void.
     */
    private function validateRegion($region)
    {
        if (!isset(BaseClient::REGIONS[$region])) {
            throw new InvalidRegionException("Invalid region: {$region}.");
        }
    }

    /**
     * Creates or gets a client from the clients array and returns it.
     *
     * @param string $name The client name.
     * @param optional string $region The default region to set on the client.
     * @param optional boolean $overwrite Whether to overwrite the region with the one provided or not.
     *
     * @return BaseClient An instance of a class extended from the BaseClient class.
     */
    private function createClient($name, $region = '', $overwrite = false)
    {
        // Validate the provided region, if any
        if ($region) {
            $this->validateRegion($region);
        }

        // Set the default region to the first argument from the method call or to our default region
        $region = $region ? $region : $this->defaultRegion;

        // Create the client if hasn't been created yet
        if (!isset($this->clients[$name])) {
            $class = __NAMESPACE__ . '\\Clients\\' . ucfirst($name) . 'Client';
            if (!class_exists($class)) {
                throw new InvalidClientException("Invalid client: {$name}.");
            }
            return $this->clients[$name] = new $class($this->apiKey, $this->httpClient, $region);
        }

        // Check if we have to overwrite the region
        if ($overwrite) {
            $this->clients[$name]->setDefaultRegion($region);
        }

        // Return the client
        return $this->clients[$name];
    }
}
