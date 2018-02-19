<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\Summoner;

class SummonerClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'summoner';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Gets a summoner by account id.
     *
     * @param int $accountId The account id.
     * @param optional string $region The region to use for the request.
     *
     * @return Summoner The summoner object.
     */
    public function getByAccountId($accountId, $region = '')
    {
        return $this->get('/summoners/by-account/' . $accountId, [], $region, Summoner::class);
    }

    /**
     * Gets a summoner by name.
     *
     * @param string $name The summoner name.
     * @param optional string $region The region to use for the request.
     *
     * @return Summoner The summoner object.
     */
    public function getByName($name, $region = '')
    {
        return $this->get('/summoners/by-name/' . $name, [], $region, Summoner::class);
    }

    /**
     * Gets a summoner by id.
     *
     * @param int $id The summoner id.
     * @param optional string $region The region to use for the request.
     *
     * @return Summoner The summoner object.
     */
    public function getById($summonerId, $region = '')
    {
        return $this->get('/summoners/' . $summonerId, [], $region, Summoner::class);
    }
}
