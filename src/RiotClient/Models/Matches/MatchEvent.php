<?php

namespace RiotClient\Models\Matches;

use RiotClient\Model;
use RiotClient\Models\Matches\MatchPosition;

class MatchEvent extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'position' => [
            MatchPosition::class,
        ],
    ];
}
