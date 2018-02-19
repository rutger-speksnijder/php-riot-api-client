<?php

namespace RiotClient\Models;

use RiotClient\Model;
use RiotClient\Models\LeaguePosition;

class LeaguePositionCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        '_collection' => [
            LeaguePosition::class,
            'leaguePositions',
        ],
    ];
}
