<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\ShardStatus;

class StatusClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'status';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Gets shard status for the given region.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-status-v3/GET_getShardData.
     *
     * @param optional string $region The region to use for this request.
     *
     * @return ShardStatus The shard status object.
     */
    public function getShardStatus($region = '')
    {
        return $this->get(
            '/shard-data',
            [],
            $region,
            ShardStatus::class
        );
    }
}
