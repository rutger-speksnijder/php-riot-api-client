<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\BlockItem;

class Block extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'items_collection' => [
            BlockItem::class,
            'items',
        ],
    ];
}
