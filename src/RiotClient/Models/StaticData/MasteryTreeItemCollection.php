<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\MasteryTreeItem;

class MasteryTreeItemCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'masteryTreeItems_collection' => [
            MasteryTreeItem::class,
            'masteryTreeItems',
        ],
    ];
}
