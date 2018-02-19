<?php

namespace RiotClient\Models\ShardData;

use RiotClient\Model;
use RiotClient\Models\ShardData\Incident;

class Service extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'incidents_collection' => [
            Incident::class,
            'incidents',
        ],
    ];
}
