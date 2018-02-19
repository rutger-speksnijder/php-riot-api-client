<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;

class ThirdPartyCodeClient extends BaseClient
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
     * Gets the third party code by summoner id.
     *
     * @param int $summonerId The summoner id.
     * @param optional string $region The region to use for this request.
     *
     * @return string The third party code.
     */
    public function getCodeBySummonerId($summonerId, $region = '')
    {
        $data = $this->get(
            '/third-party-code/by-summoner/' . $summonerId,
            [],
            $region,
            'array'
        );
        if (is_string($data) && $data) {
            return $data;
        }
        return '';
    }
}
