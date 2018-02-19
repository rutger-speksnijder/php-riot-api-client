<?php

namespace RiotClient\Models;

use RiotClient\Model;

class League extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'miniSeries' => [
            '\\\RiotClient\\Models\\MiniSeries',
        ],
    ];
}
