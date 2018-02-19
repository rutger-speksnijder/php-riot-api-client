<?php

namespace RiotClient\Models;

use RiotClient\Model;
use RiotClient\Models\Spectator\FeaturedGameInfo;

class FeaturedGameCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'gameList_collection' => [
            FeaturedGameInfo::class,
            'gameList',
        ],
    ];
}
