<?php

namespace RiotClient\Models;

use RiotClient\Model;
use RiotClient\Models\Matches\ParticipantIdentity;
use RiotClient\Models\Matches\TeamStats;
use RiotClient\Models\Matches\Participant;

class Match extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'participantIdentities_collection' => [
            ParticipantIdentity::class,
            'participantIdentities',
        ],
        'teams_collection' => [
            TeamStats::class,
            'teams',
        ],
        'participants_collection' => [
            Participant::class,
            'participants',
        ],
    ];
}
