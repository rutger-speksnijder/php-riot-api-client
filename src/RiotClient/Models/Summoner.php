<?php

namespace RiotClient\Models;

use RiotClient\Model;

class Summoner extends Model
{
    /**
     * The bindings for this model.
     * @var array.
     */
    protected $bindings = [
        'summonerLevel' => 'level',
    ];

    /**
     * The ID of the summoner icon associated with the summoner.
     * @var int.
     */
    public $profileIconId;

    /**
     * The summoner name.
     * @var string.
     */
    public $name;

    /**
     * The summoner level associated with the summoner.
     * @var int.
     */
    public $level;

    /**
     * The date the summoner was last modified specified as epoch milliseconds.
     * The following events will update this timestamp:
     * profile icon change
     * playing the tutorial or advanced tutorial
     * finishing a game
     * summoner name change
     *
     * @var string.
     */
    public $revisionDate;

    /**
     * The summoner id.
     * @var int.
     */
    public $id;

    /**
     * The account id.
     * @var int.
     */
    public $accountId;
}
