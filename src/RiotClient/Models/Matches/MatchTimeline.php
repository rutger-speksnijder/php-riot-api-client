<?php

namespace RiotClient\Models\Matches;

use RiotClient\Model;
use RiotClient\Models\Matches\MatchFrame;

class MatchTimeline extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'frames_collection' => [
            MatchFrame::class,
            'frames',
        ],
    ];
}
