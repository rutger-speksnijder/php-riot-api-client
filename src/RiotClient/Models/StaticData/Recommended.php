<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Block;

class Recommended extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'blocks' => [
            Block::class,
        ],
    ];
}
