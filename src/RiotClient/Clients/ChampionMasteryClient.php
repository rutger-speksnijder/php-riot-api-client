<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\ChampionMasteryCollection;
use RiotClient\Models\ChampionMastery;

class ChampionMasteryClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'champion-mastery';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Gets champion mastery by summoner id.
     *
     * @param int $summonerId The summoner id.
     * @param optional string $region The region to use for the request.
     *
     * @return ChampionMasteryCollection The collection of champion masteries.
     */
    public function getBySummonerId($summonerId, $region = '')
    {
        return $this->get('/champion-masteries/by-summoner/' . $summonerId, [], $region, ChampionMasteryCollection::class);
    }

    /**
     * Gets champion mastery by summoner and champion id.
     *
     * @param int $summonerId The summoner id.
     * @param int $championId The champion id.
     * @param optional string $region The region to use for the request.
     *
     * @return ChampionMastery The champion mastery object.
     */
    public function getBySummonerIdChampionId($summonerId, $championId, $region = '')
    {
        return $this->get('/champion-masteries/by-summoner/' . $summonerId . '/by-champion/' . $championId, [], $region, ChampionMastery::class);
    }

    /**
     * Gets a player's total champion mastery score, which is the sum of individual champion mastery levels.
     *
     * @param int $summonerId The summoner id.
     * @param optional string $region The region to use for the request.
     *
     * @return int The total score for this summoner.
     */
    public function getTotalScoreBySummonerId($summonerId, $region = '')
    {
        return (int)$this->get('/scores/by-summoner/' . $summonerId, [], $region);
    }
}
