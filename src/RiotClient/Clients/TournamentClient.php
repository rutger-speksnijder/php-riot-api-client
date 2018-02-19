<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\Tournament;

class TournamentClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'tournament';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Creates tournament codes by tournament id.
     *
     * @see https://developer.riotgames.com/api-methods/#tournament-v3/POST_createTournamentCode.
     *
     * @param int $tournamentId The tournament id.
     * @param string $spectatorType The spectator type of the game.
     * @param int $teamSize The team size of the game.
     * @param string $pickType The pick type of the game.
     * @param string $mapType The map type of the game.
     * @param optional array $allowedSummonerIds List of allowed summoner ids.
     * @param optional string $metaData Extra data used to denote custom information about the game.
     * @param optional int $amount The amount of codes to generate. Defaults to 1.
     * @param optional string $region The region to use for this request.
     *
     * @return array An array of tournament codes.
     */
    public function createTournamentCodesById(
        $tournamentId,
        $spectatorType,
        $teamSize,
        $pickType,
        $mapType,
        $allowedSummonerIds = [],
        $metaData = '',
        $amount = 1,
        $region = ''
    ) {
        return $this->post(
            '/codes',
            [
                'query' => [
                    'count' => $amount,
                    'tournamentId' => $tournamentId,
                ],
                'json' => [
                    'allowedSummonerIds' => $allowedSummonerIds,
                    'mapType' => $mapType,
                    'metadata' => $metaData,
                    'pickType' => $pickType,
                    'spectatorType' => $spectatorType,
                    'teamSize' => $teamSize,
                ],
            ],
            $region,
            'array'
        );
    }

    /**
     * Sets tournament data by tournament code.
     *
     * @see https://developer.riotgames.com/api-methods/#tournament-v3/PUT_updateCode.
     *
     * @param string $tournamentCode The tournament code.
     * @param string $spectatorType The spectator type of the game.
     * @param string $pickType The pick type of the game.
     * @param string $mapType The map type of the game.
     * @param optional array $allowedSummonerIds List of allowed summoner ids.
     * @param optional string $region The region to use for this request.
     *
     * @return Result The result object.
     */
    public function setDataByTournamentCode($tournamentCode, $spectatorType, $pickType, $mapType, $allowedSummonerIds = [], $region = '')
    {
        return $this->put(
            '/codes/' . $tournamentCode,
            [
                'allowedSummonerIds' => $allowedSummonerIds,
                'mapType' => $mapType,
                'pickType' => $pickType,
                'spectatorType' => $spectatorType,
            ],
            $region,
            'array',
            'json'
        );
    }

    /**
     * Gets tournament data by tournament code.
     *
     * @see https://developer.riotgames.com/api-methods/#tournament-v3/GET_getTournamentCode.
     *
     * @param string $tournamentCode The tournament code.
     * @param optional string $region The region to use for this request.
     *
     * @return Tournament The tournament object.
     */
    public function getDataByTournamentCode($tournamentCode, $region = '')
    {
        return $this->get(
            '/codes/' . $tournamentCode,
            [],
            $region,
            Tournament::class
        );
    }

    /**
     * Gets a list of lobby events by tournament code.
     *
     * @see https://developer.riotgames.com/api-methods/#tournament-v3/GET_getLobbyEventsByCode.
     *
     * @param string $tournamentCode The tournament code.
     * @param optional string $region The region to use for this request.
     *
     * @return LobbyEventCollection The collection of lobby event objects.
     */
    public function getLobbyEventsByTournamentCode($tournamentCode, $region = '')
    {
        return $this->get(
            '/lobby-events/by-code/' . $tournamentCode,
            [],
            $region,
            LobbyEventCollection::class
        );
    }

    /**
     * Creates a tournament provider.
     *
     * @see https://developer.riotgames.com/api-methods/#tournament-v3/POST_registerProviderData.
     *
     * @param string $url The provider's callback URL. See the link above for the requirements.
     * @param string $tournamentRegion The region in which the provider will be running tournaments.
     *      See the link above for available regions.
     * @param optional string $region The region to use for this request.
     *
     * @return int The created provider id.
     */
    public function createProvider($url, $tournamentRegion, $region = '')
    {
        return $this->post(
            '/providers',
            [
                'url' => $url,
                'region' => $tournamentRegion,
            ],
            $region,
            'int',
            'json'
        );
    }

    /**
     * Creates a tournament.
     *
     * @see https://developer.riotgames.com/api-methods/#tournament-v3/POST_registerTournament.
     *
     * @param int $providerId The provider id.
     * @param optional string $name The tournament name.
     * @param optional string $region The region to use for this request.
     *
     * @return int The tournament id.
     */
    public function createTournament($providerId, $name = '', $region = '')
    {
        return $this->post(
            '/tournaments',
            [
                'name' => $name,
                'providerId' => $providerId,
            ],
            $region,
            'int',
            'json'
        );
    }
}
