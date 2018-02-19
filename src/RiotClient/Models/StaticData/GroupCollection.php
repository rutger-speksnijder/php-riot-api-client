<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Group;

class GroupCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        '_collection' => [
            Group::class,
            'groups',
        ],
    ];
}
