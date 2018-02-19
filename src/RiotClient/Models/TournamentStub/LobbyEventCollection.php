<?php

namespace RiotClient\Models\TournamentStub;

use RiotClient\Model;
use RiotClient\Models\TournamentStub\LobbyEvent;

class LobbyEventCollection extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'eventList_collection' => [
            LobbyEvent::class,
            'eventList',
        ],
    ];
}
