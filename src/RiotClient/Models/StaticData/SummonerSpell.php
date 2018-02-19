<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Image;
use RiotClient\Models\StaticData\SpellVars;
use RiotClient\Models\StaticData\LevelTip;

class SummonerSpell extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'vars_collection' => [
            SpellVars::class,
            'vars',
        ],
        'image' => [
            Image::class,
        ],
        'leveltip' => [
            LevelTip::class,
        ],
    ];
}
