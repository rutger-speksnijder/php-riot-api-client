<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Mastery;
use RiotClient\Models\StaticData\MasteryTree;

class MasteryCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'data_collection' => [
            Mastery::class,
            'masteries',
        ],
        'tree'=> [
            MasteryTree::class,
        ],
    ];
}
