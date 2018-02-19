<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\Match;
use RiotClient\Models\Matches\MatchReferenceCollection;
use RiotClient\Models\Matches\MatchTimeline;

class MatchClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'match';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Gets a match by id.
     *
     * @param int $id The match id.
     * @param optional string $region The region to use for this request.
     *
     * @return Match The match object.
     */
    public function getMatchById($id, $region = '')
    {
        return $this->get(
            '/matches/' . $id,
            [],
            $region,
            Match::class
        );
    }

    /**
     * Gets matches by account id.
     *
     * @see https://developer.riotgames.com/api-methods/#match-v3/GET_getMatch.
     *
     * @param int $accountId The account id.
     * @param optional array $championIds Champion ids to filter the matches.
     * @param optional array $queueIds Queue ids to filter the matches.
     * @param optional array $seasonIds Season ids to filter the matches.
     * @param optional int $beginIndex The index to start from.
     * @param optional int $endIndex The index to end at.
     * @param optional int $beginTime The time to start from as epoch milliseconds.
     * @param optional int $endTime The time to end at as epoch milliseconds.
     * @param optional string $region The region to use for this request.
     *
     * @return MatchReferenceCollection A collection of match references.
     */
    public function getMatchesByAccountId(
        $accountId,
        $championIds = [],
        $queueIds = [],
        $seasonIds = [],
        $beginIndex = null,
        $endIndex = null,
        $beginTime = null,
        $endTime = null,
        $region = ''
    ) {
        // Set the params
        $params = [
            'champion' => $championIds,
            'queue' => $queueIds,
            'season' => $seasonIds,
        ];

        // Set the optional parameters for start/end index/time only if they aren't null
        if (null !== $beginIndex) {
            $params['beginIndex'] = $beginIndex;
        }
        if (null !== $endIndex) {
            $params['endIndex'] = $endIndex;
        }
        if (null !== $beginTime) {
            $params['beginTime'] = $beginTime;
        }
        if (null !== $endTime) {
            $params['endTime'] = $endTime;
        }

        // Return the result
        return $this->get(
            '/matchlists/by-account/' . $accountId,
            $params,
            $region,
            MatchReferenceCollection::class
        );
    }

    /**
     * Gets recent matches by account id.
     *
     * @see https://developer.riotgames.com/api-methods/#match-v3/GET_getRecentMatchlist.
     *
     * @param int $accountId The account id.
     * @param optional string $region The region to use for this request.
     *
     * @return MatchReferenceCollection A collection of match references.
     */
    public function getRecentMatchesByAccountId($accountId, $region = '')
    {
        // Return the result
        return $this->get(
            '/matchlists/by-account/' . $accountId . '/recent',
            [],
            $region,
            MatchReferenceCollection::class
        );
    }

    /**
     * Gets match timeline by match id.
     *
     * @see https://developer.riotgames.com/api-methods/#match-v3/GET_getMatchTimeline.
     *
     * @param int $matchId The match id.
     * @param optional string $region The region to use for this request.
     *
     * @return MatchTimeline The match timeline object.
     */
    public function getTimelineByMatchId($matchId, $region = '')
    {
        return $this->get(
            '/timelines/by-match/' . $matchId,
            [],
            $region,
            MatchTimeline::class
        );
    }

    /**
     * Gets match ids by tournament code.
     *
     * @see https://developer.riotgames.com/api-methods/#match-v3/GET_getMatchIdsByTournamentCode.
     *
     * @param string $tournamentCode The tournament code.
     * @param optional string $region The region to use for this request.
     *
     * @return array An array of match ids.
     */
    public function getMatchIdsByTournamentCode($tournamentCode, $region = '')
    {
        return $this->get(
            '/matches/by-tournament-code/' . $tournamentCode . '/ids',
            [],
            $region,
            'array'
        );
    }

    /**
     * Gets a match by match id and tournament code.
     *
     * @see https://developer.riotgames.com/api-methods/#match-v3/GET_getMatchByTournamentCode.
     *
     * @param int $matchId The match id.
     * @param string $tournamentCode The tournament code.
     * @param optional string $region The region to use for this request.
     *
     * @return Match The match object.
     */
    public function getMatchByIdAndTournamentCode($matchId, $tournamentCode, $region = '')
    {
        return $this->get(
            '/matches/' . $matchId . '/by-tournament-code/' . $tournamentCode,
            [],
            $region,
            Match::class
        );
    }
}
