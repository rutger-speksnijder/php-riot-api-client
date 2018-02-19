<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\LevelTip;
use RiotClient\Models\StaticData\SpellVarsCollection;
use RiotClient\Models\StaticData\Image;

class ChampionSpell extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'leveltip' => [
            LevelTip::class,
        ],
        'vars_collection' => [
            SpellVarsCollection::class,
            'vars',
        ],
        'image' => [
            Image::class,
        ],
        'altimages_collection' => [
            Image::class,
            'altimages',
        ],
    ];
}
