<?php

namespace RiotClient\Models\StaticData;

use RiotClient\Model;
use RiotClient\Models\StaticData\Skin;

class SkinCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        '_collection' => [
            Skin::class,
            'skins',
        ],
    ];
}
