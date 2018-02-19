<?php

namespace RiotClient\Models\Spectator;

use RiotClient\Model;
use RiotClient\Models\Spectator\GameCustomization;
use RiotClient\Models\Spectator\Perks;

class Participant extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'gameCustomizationObjects_collection' => [
            GameCustomization::class,
            'gameCustomizationObjects',
        ],
        'perks' => [
            Perks::class,
        ],
    ];
}
