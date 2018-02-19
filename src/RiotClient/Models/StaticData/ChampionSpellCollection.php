<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\ChampionSpell;

class ChampionSpellCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        '_collection' => [
            ChampionSpell::class,
            'spells',
        ],
    ];
}
