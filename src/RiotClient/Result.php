<?php

namespace RiotClient;

use GuzzleHttp\Psr7\Response;

class Result
{
    /**
     * The error state.
     * @var boolean.
     */
    public $error = false;

    /**
     * The error message.
     * @var string.
     */
    public $errorMessage;

    /**
     * The parsed response data.
     * @var mixed.
     */
    public $data;

    /**
     * The response.
     * @var Response.
     */
    public $response;

    /**
     * Constructs a new instance of the Result class.
     *
     * @param Response $response The response.
     * @param array $data The response data in array format.
     */
    public function __construct(Response $response, $data)
    {
        // Check for errors
        $this->response = $response;
        if ($this->response->getStatusCode() > 200) {
            $this->error = true;

            // Set the error message if it exists in the data
            if (!empty($data['status']['message'])) {
                $this->errorMessage = $data['status']['message'];
            }
        }
    }

    /**
     * Magic method allowing direct calls to the response object.
     *
     * @param string $method The method name.
     * @param array $arguments The arguments sent to the method.
     *
     * @return mixed The result of the method, if it exists.
     */
    public function __call($method, $arguments)
    {
        if (method_exists($this->response, $method)) {
            return call_user_func_array([$this->response, $method], $arguments);
        }
    }
}
