<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Item;
use RiotClient\Models\StaticData\GroupCollection;

class ItemCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'data_collection' => [
            Item::class,
            'items',
        ],
        'tree_collection' => [
            ItemTree::class,
            'trees',
        ],
        'groups_collection' => [
            Group::class,
            'groups',
        ],
    ];
}
