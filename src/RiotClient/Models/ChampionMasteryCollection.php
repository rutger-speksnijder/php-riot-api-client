<?php

namespace RiotClient\Models;

use RiotClient\Model;
use RiotClient\Models\ChampionMastery;

class ChampionMasteryCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        '_collection' => [
            ChampionMastery::class,
            'championMasteries',
        ],
    ];
}
