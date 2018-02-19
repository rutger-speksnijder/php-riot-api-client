<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Champion;

class ChampionCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'data_collection' => [
            Champion::class,
            'champions',
        ],
    ];
}
