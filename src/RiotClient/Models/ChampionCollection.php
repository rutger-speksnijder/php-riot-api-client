<?php

namespace RiotClient\Models;

use RiotClient\Model;
use RiotClient\Models\Champion;

class ChampionCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'champions_collection' => [
            Champion::class,
            'champions',
        ],
    ];
}
