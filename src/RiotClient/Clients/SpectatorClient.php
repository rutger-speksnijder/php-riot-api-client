<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\CurrentGameInfo;
use RiotClient\Models\FeaturedGameCollection;

class SpectatorClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'spectator';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Gets the current game by summoner id.
     *
     * @param int $summonerId The summoner id.
     * @param optional string $region The region to use for this request.
     *
     * @return CurrentGameInfo The current game info object.
     */
    public function getCurrentGameBySummonerId($summonerId, $region = '')
    {
        return $this->get(
            '/active-games/by-summoner/' . $summonerId,
            [],
            $region,
            CurrentGameInfo::class
        );
    }

    /**
     * Gets featured games.
     *
     * @param optional string $region The region to use for this request.
     *
     * @return FeaturedGameCollection A collection of featured game objects.
     */
    public function getFeaturedGames($region = '')
    {
        return $this->get(
            '/featured-games',
            [],
            $region,
            FeaturedGameCollection::class
        );
    }
}
