# PHP Riot Games API client

A client for the Riot Games API written in PHP.

https://developer.riotgames.com/api-methods/

## Installation

```
composer require "rutger-speksnijder/php-riot-api-client"
```

This client uses Guzzle for executing HTTP requests.

## Usage

```php
<?php

// Composer autoloader
require 'vendor/autoload.php';

// Create the client
$client = new RiotClient\Client('API_KEY', 'euw');

// Execute commands
var_dump($client->summoner()->getByName('SummonerName'));
```

A specific client exists for every "endpoint" in the Riot Games API.
These clients can be accessed by calling their name as a method on the ```$client``` object using ```camelCase```.

For example, the summoner is accessed as shown in the example above. If you want to access the champion-mastery endpoint, you would do the following:

```php
$client->championMastery()->methodName();
```

## Results

The client returns an instance of the Result class. This object will have a boolean "error" you can check for errors and a string "errorMessage" to get the specific error message returned by the Riot Games API.

The "data" property will contain the result of the call converted to an instance of the Model class, array or int.

The "response" property will contain the original Psr7 response returned by Guzzle. Method calls to the Result class which don't exist on the Result class itself, but exist on the response object, will be called on the response object and their results will be returned.

This is useful if you for example want to check the response's status code: ```$result->getStatusCode()```.

## Regions

Requests to the Riot Games API all need a region to execute the request against.
The client's constructor takes the default region as the second parameter.

You can also send it as an argument to a specific underlying client, for example if I want to get a summoner by name from the NA region but my default region is EUW, it would look like this:

```php
// Create client for EUW
$client = new RiotClient\Client('API_KEY', 'euw');

// Use NA as default region for requests executed by the summoner client
$client->summoner('na')->getByName('SummonerName');
```

Every method accepts an optional region string as their last argument.
This could look like this:

```php
// Create client for EUW
$client = new RiotClient\Client('API_KEY', 'euw');

// Retrieve summoner from KR
$client->summoner('na')->getByName('SummonerName', 'kr');
```

## Supported regions

The following regions are supported by this client:

 * br
 * eune
 * euw
 * jp
 * kr
 * lan
 * las
 * na
 * oce
 * tr
 * ru
 * pbe

Keep in mind that some API endpoints aren't available for specific regions.
