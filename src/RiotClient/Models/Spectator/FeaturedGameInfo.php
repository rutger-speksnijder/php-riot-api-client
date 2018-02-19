<?php

namespace RiotClient\Models\Spectator;

use RiotClient\Model;
use RiotClient\Models\Spectator\BannedChampion;
use RiotClient\Models\Spectator\Participant;

class FeaturedGameInfo extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'bannedChampions_collection' => [
            BannedChampion::class,
            'bannedChampions',
        ],
        'participants_collection' => [
            Participant::class,
            'participants',
        ],
    ];
}
