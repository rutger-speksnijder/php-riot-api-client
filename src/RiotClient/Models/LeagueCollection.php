<?php

namespace RiotClient\Models;

use RiotClient\Model;
use RiotClient\Models\League;

class LeagueCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'entries_collection' => [
            League::class,
            'entries',
        ],
    ];
}
