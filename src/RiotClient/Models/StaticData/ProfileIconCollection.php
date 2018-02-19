<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\ProfileIcon;

class ProfileIconCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'data_collection' => [
            ProfileIcon::class,
            'profileIcons',
        ],
    ];
}
