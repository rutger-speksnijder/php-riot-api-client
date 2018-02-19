<?php

namespace RiotClient\Models\ShardData;

use RiotClient\Model;
use RiotClient\Models\ShardData\Translation;

class Message extends Model
{
    /**
     * The bindings.
     * @var array.
     */
    protected $bindings = [
        'translations_collection' => [
            Translation::class,
            'translations',
        ],
    ];
}
