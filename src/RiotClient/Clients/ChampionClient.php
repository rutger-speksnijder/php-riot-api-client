<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\ChampionCollection;
use RiotClient\Models\Champion;

class ChampionClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'platform';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Gets all champions.
     *
     * @param optional boolean $freeToPlayOnly Whether to filter for free to play champions or not.
     * @param optional string $region The region to use for the request.
     *
     * @return ChampionCollection A collection of champion objects.
     */
    public function all($freeToPlayOnly = false, $region = '')
    {
        return $this->get('/champions', ['freeToPlay' => $freeToPlayOnly ? 'true': 'false'], $region, ChampionCollection::class);
    }

    /**
     * Gets a champion by id.
     *
     * @param int $id The champion id.
     * @param optional string $region The regon to use for this request.
     *
     * @return Champion The champion object.
     */
    public function getById($id, $region = '')
    {
        return $this->get('/champions/' . $id, [], $region, Champion::class);
    }
}
