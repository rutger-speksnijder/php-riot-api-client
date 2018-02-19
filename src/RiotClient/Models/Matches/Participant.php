<?php

namespace RiotClient\Models\Matches;

use RiotClient\Model;
use RiotClient\Models\Matches\ParticipantStats;
use RiotClient\Models\Matches\Rune;
use RiotClient\Models\Matches\ParticipantTimeline;
use RiotClient\Models\Matches\Mastery;

class Participant extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'stats' => [
            ParticipantStats::class,
        ],
        'runes_collection' => [
            Rune::class,
            'runes',
        ],
        'timeline' => [
            ParticipantTimeline::class,
        ],
        'masteries_collection' => [
            Mastery::class,
        ],
    ];
}
