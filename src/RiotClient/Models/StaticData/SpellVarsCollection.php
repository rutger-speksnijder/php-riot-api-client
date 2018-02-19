<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\SpellVars;

class SpellVarsCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        '_collection' => [
            SpellVars::class,
            'vars',
        ],
    ];
}
