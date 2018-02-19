<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\RuneStats;
use RiotClient\Models\StaticData\Image;
use RiotClient\Models\StaticData\RuneMetaData;

class Rune extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'stats' => [
            RuneStats::class,
        ],
        'image' => [
            Image::class,
        ],
        'rune' => [
            RuneMetaData::class,
        ],
    ];
}
