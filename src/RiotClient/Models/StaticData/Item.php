<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Gold;
use RiotClient\Models\StaticData\InventoryDataStats;
use RiotClient\Models\StaticData\Image;

class Item extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'gold' => [
            Gold::class,
        ],
        'stats' => [
            InventoryDataStats::class,
        ],
        'image' => [
            Image::class,
        ],
    ];
}
