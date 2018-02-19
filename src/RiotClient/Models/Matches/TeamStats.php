<?php

namespace RiotClient\Models\Matches;

use RiotClient\Model;
use RiotClient\Models\Matches\TeamBans;

class TeamStats extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'bans_collection' => [
            TeamBans::class,
            'bans',
        ],
    ];
}
