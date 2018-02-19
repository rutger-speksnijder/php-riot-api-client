<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\SummonerSpell;

class SummonerSpellCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'data_collection' => [
            SummonerSpell::class,
            'spells',
        ],
    ];
}
