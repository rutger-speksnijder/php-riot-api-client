<?php

namespace RiotClient\Models\Matches;

use RiotClient\Model;
use RiotClient\Models\Matches\MatchReference;

class MatchReferenceCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'matches_collection' => [
            MatchReference::class,
            'matches',
        ],
    ];
}
