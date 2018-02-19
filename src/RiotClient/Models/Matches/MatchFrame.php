<?php

namespace RiotClient\Models\Matches;

use RiotClient\Model;
use RiotClient\Models\Matches\ParticipantFrame;
use RiotClient\Models\Matches\MatchEvent;

class MatchFrame extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'participantFrames_collection' => [
            ParticipantFrame::class,
            'participantFrames',
        ],
        'events_collection' => [
            MatchEvent::class,
            'events',
        ],
    ];
}
