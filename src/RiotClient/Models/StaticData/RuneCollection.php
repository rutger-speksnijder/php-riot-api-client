<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Rune;

class RuneCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'data_collection' => [
            Rune::class,
            'runes',
        ],
    ];
}
