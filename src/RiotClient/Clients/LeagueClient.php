<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\LeagueCollection;
use RiotClient\Models\League;
use RiotClient\Models\LeaguePositionCollection;

class LeagueClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'league';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Gets the challenger leagues for the given queue.
     *
     * @param string $queue The queue.
     * @param optional string $region The region to use for this request.
     *
     * @return LeagueCollection The collection of leagues.
     */
    public function getChallengerLeaguesByQueue($queue, $region = '')
    {
        return $this->get('/challengerleagues/by-queue/' . $queue, [], $region, LeagueCollection::class);
    }

    /**
     * Gets leagues by id.
     *
     * @param string $id The league id.
     * @param optional string $region The region to use for this request.
     *
     * @return LeagueCollectioon The collection of leagues.
     */
    public function getLeaguesById($id, $region = '')
    {
        return $this->get('/leagues/' . $id, [], $region, LeagueCollection::class);
    }

    /**
     * Gets master leagues for the given queue.
     *
     * @param string $queue The queue.
     * @param optional string $region The region to use for this request.
     *
     * @return LeagueCollection The collection of leagues.
     */
    public function getMasterLeaguesByQueue($queue, $region = '')
    {
        return $this->get('/masterleagues/by-queue/' . $queue, [], $region, LeagueCollection::class);
    }

    /**
     * Gets league positions in all queues for a given summoner id.
     *
     * @param int $summonerId The summoner id.
     * @param optional string $region The region to use for this request.
     *
     * @return LeaguePosition The league position object.
     */
    public function getLeaguePositionsBySummonerId($summonerId, $region = '')
    {
        return $this->get('/positions/by-summoner/' . $summonerId, [], $region, LeaguePositionCollection::class);
    }
}
