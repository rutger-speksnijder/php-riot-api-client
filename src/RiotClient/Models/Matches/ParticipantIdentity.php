<?php

namespace RiotClient\Models\Matches;

use RiotClient\Model;
use RiotClient\Models\Matches\Player;

class ParticipantIdentity extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'player' => [
            Player::class,
        ],
    ];
}
