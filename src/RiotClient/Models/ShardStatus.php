<?php

namespace RiotClient\Models;

use RiotClient\Model;
use RiotClient\Models\ShardData\Service;

class ShardStatus extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'services_collection' => [
            Service::class,
            'services',
        ],
    ];
}
