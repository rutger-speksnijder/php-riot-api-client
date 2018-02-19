<?php

namespace RiotClient\Models;

use RiotClient\Model;
use RiotClient\Models\Spectator\BannedChampion;
use RiotClient\Models\Spectator\Observer;
use RiotClient\Models\Spectator\Participant;

class CurrentGameInfo extends Model
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
        'observers' => [
            Observer::class,
        ],
        'participants_collection' => [
            Participant::class,
            'participants',
        ],
    ];
}
