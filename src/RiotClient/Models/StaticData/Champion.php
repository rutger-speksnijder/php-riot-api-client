<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;

use RiotClient\Models\StaticData\Info;
use RiotClient\Models\StaticData\Stats;
use RiotClient\Models\StaticData\Image;
use RiotClient\Models\StaticData\SkinCollection;
use RiotClient\Models\StaticData\Passive;
use RiotClient\Models\StaticData\RecommendedCollection;
use RiotClient\Models\StaticData\ChampionSpellCollection;

class Champion extends Model
{
    /**
     * The bindings.
     * @var arra.
     */
    protected $bindings = [
        'info' => [
            Info::class,
        ],
        'stats' => [
            Stats::class,
        ],
        'image' => [
            Image::class,
        ],
        'skins_collection' => [
            SkinCollection::class,
            'skins',
        ],
        'passive' => [
            Passive::class,
        ],
        'recommended_collection' => [
            RecommendedCollection::class,
            'recommended',
        ],
        'spells_collection' => [
            ChampionSpellCollection::class,
            'spells',
        ],
    ];
}
