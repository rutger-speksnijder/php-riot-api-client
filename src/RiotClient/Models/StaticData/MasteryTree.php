<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;

class MasteryTree extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'Resolve_collection' => [
            MasteryTreeItemCollection::class,
            'resolve',
        ],
        'Ferocity_collection' => [
            MasteryTreeItemCollection::class,
            'ferocity',
        ],
        'Cunning_collection' => [
            MasteryTreeItemCollection::class,
            'cunning',
        ],
    ];
}
