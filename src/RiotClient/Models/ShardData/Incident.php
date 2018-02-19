<?php

namespace RiotClient\Models\ShardData;

use RiotClient\Model;
use RiotClient\Models\ShardData\Message;

class Incident extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'updates_collection' => [
            Message::class,
            'updates',
        ],
    ];
}
