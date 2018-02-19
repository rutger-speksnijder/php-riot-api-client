<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Image;

class Mastery extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'image' => [
            Image::class,
        ],
    ];
}
