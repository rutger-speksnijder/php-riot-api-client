<?php

namespace RiotClient\Clients;

use RiotClient\BaseClient;
use RiotClient\Models\StaticData\ChampionCollection;
use RiotClient\Models\StaticData\Champion;
use RiotClient\Models\StaticData\ItemCollection;
use RiotClient\Models\StaticData\Item;
use RiotClient\Models\StaticData\LanguageStrings;
use RiotClient\Models\StaticData\MapCollection;
use RiotClient\Models\StaticData\MasteryCollection;
use RiotClient\Models\StaticData\Mastery;
use RiotClient\Models\StaticData\ProfileIconCollection;
use RiotClient\Models\StaticData\RealmData;
use RiotClient\Models\StaticData\RuneCollection;
use RiotClient\Models\StaticData\Rune;
use RiotClient\Models\StaticData\SummonerSpellCollection;
use RiotClient\Models\StaticData\SummonerSpell;

class StaticDataClient extends BaseClient
{
    /**
     * The endpoint.
     * @var string.
     */
    protected $endpoint = 'static-data';

    /**
     * The version.
     * @var string.
     */
    protected $version = 'v3';

    /**
     * Gets all champions.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getChampionList.
     *
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $champListData The list of champion data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional boolean $dataById If true, the returned data will have the champions' IDs as keys.
     * @param optional string $region The region to use for this request.
     *
     * @return ChampionCollection A collection of Champion static data objects.
     */
    public function getChampions($locale = 'en_US', $version = '', $champListData = 'all', $tags = 'all', $dataById = false, $region = '')
    {
        return $this->get(
            '/champions',
            [
                'locale' => $locale,
                'version' => $version,
                'champListData' => $champListData,
                'tags' => $tags,
                'dataById' => $dataById ? 'true' : 'false',
            ],
            $region,
            ChampionCollection::class
        );
    }

    /**
     * Gets a champion by id.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getChampionById.
     *
     * @param int $id The champion id.
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $champData The list of champion data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional string $region The region to use for this request.
     *
     * @return Champion The champion object.
     */
    public function getChampionById($id, $locale = 'en_US', $version = '', $champData = 'all', $tags = 'all', $region = '')
    {
        return $this->get(
            '/champions/' . $id,
            [
                'locale' => $locale,
                'version' => $version,
                'champData' => $champData,
                'tags' => $tags,
            ],
            $region,
            Champion::class
        );
    }

    /**
     * Gets all items.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getItemList.
     *
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $itemListData The list of item data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional string $region The region to use for this request.
     *
     * @return ItemCollection A collection of items.
     */
    public function getItems($locale = 'en_US', $version = '', $itemListData = 'all', $tags = 'all', $region = '')
    {
        return $this->get(
            '/items',
            [
                'locale' => $locale,
                'itemListData' => $itemListData,
                'version' => $version,
                'tags' => $tags,
            ],
            $region,
            ItemCollection::class
        );
    }

    /**
     * Gets an item by id.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getItemById.
     *
     * @param int $id The item id.
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $itemData The list of item data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional string $region The region to use for this request.
     *
     * @return Item The item object.
     */
    public function getItemById($id, $locale = 'en_US', $version = '', $itemData = 'all', $tags = 'all', $region = '')
    {
        return $this->get(
            '/items/' . $id,
            [
                'locale' => $locale,
                'itemData' => $itemData,
                'version' => $version,
                'tags' => $tags,
            ],
            $region,
            Item::class
        );
    }

    /**
     * Gets all language strings.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getLanguageStrings.
     *
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string $region The region to use for this request.
     *
     * @return LanguageStrings The language strings object.
     */
    public function getLanguageStrings($locale = 'en_US', $version = '', $region = '')
    {
        return $this->get(
            '/language-strings',
            [
                'locale' => $locale,
                'version' => $version,
            ],
            $region,
            LanguageStrings::class
        );
    }

    /**
     * Gets all languages.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getLanguages.
     *
     * @param optional string $region The region to use for this request.
     *
     * @return array An array with supported languages.
     */
    public function getLanguages($region = '')
    {
        return $this->get(
            '/languages',
            [],
            $region,
            'array'
        );
    }

    /**
     * Gets all maps.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getMapData.
     *
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string $region The region to use for this request.
     *
     * @return MapCollection The map collection.
     */
    public function getMaps($locale = 'en_US', $version = '', $region = '')
    {
        return $this->get(
            '/maps',
            [
                'locale' => $locale,
                'version' => $version,
            ],
            $region,
            MapCollection::class
        );
    }

    /**
     * Gets all masteries.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getMasteryList.
     *
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $masteryListData The list of mastery data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional string $region The region to use for this request.
     *
     * @return MasteryCollection A collection of masteries.
     */
    public function getMasteries($locale = 'en_US', $version = '', $masteryListData = 'all', $tags = 'all', $region = '')
    {
        return $this->get(
            '/masteries',
            [
                'locale' => $locale,
                'version' => $version,
                'masteryListData' => $masteryListData,
                'tags' => $tags,
            ],
            $region,
            MasteryCollection::class
        );
    }

    /**
     * Gets a mastery by id.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getMasteryById.
     *
     * @param int $id The mastery id.
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $masteryData The list of mastery data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional string $region The region to use for this request.
     *
     * @return Mastery The mastery object.
     */
    public function getMasteryById($id, $locale = 'en_US', $version = '', $masteryData = 'all', $tags = 'all', $region = '')
    {
        return $this->get(
            '/masteries/' . $id,
            [
                'locale' => $locale,
                'version' => $version,
                'masteryData' => $masteryData,
                'tags' => $tags,
            ],
            $region,
            Mastery::class
        );
    }

    /**
     * Gets all profile icons.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getProfileIcons.
     *
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string $region The region to use for this request.
     *
     * @return ProfileIconCollection The profile icon collection object.
     */
    public function getProfileIcons($locale = 'en_US', $version = '', $region = '')
    {
        return $this->get(
            '/profile-icons',
            [
                'locale' => $locale,
                'version' => $version,
            ],
            $region,
            ProfileIconCollection::class
        );
    }

    /**
     * Gets realm data.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getRealm.
     *
     * @param optional string $region The region to use for this request.
     *
     * @return RealmData The realm data object.
     */
    public function getRealmData($region = '')
    {
        return $this->get(
            '/realms',
            [],
            $region,
            RealmData::class
        );
    }

    /**
     * Gets all runes.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getRuneList.
     *
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $runeListData The list of rune data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional string $region The region to use for this request.
     *
     * @return RuneCollection The rune collection object.
     */
    public function getRunes($locale = 'en_US', $version = '', $runeListData = 'all', $tags = 'all', $region = '')
    {
        return $this->get(
            '/runes',
            [
                'locale' => $locale,
                'version' => $version,
                'runeListData' => $runeListData,
                'tags' => $tags,
            ],
            $region,
            RuneCollection::class
        );
    }

    /**
     * Gets a rune by id.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getRuneById.
     *
     * @param int $id The rune id.
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $runeData The list of rune data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional string $region The region to use for this request.
     *
     * @return Rune The rune object.
     */
    public function getRuneById($id, $locale = 'en_US', $version = '', $runeData = 'all', $tags = 'all', $region = '')
    {
        return $this->get(
            '/runes/' . $id,
            [
                'locale' => $locale,
                'version' => $version,
                'runeData' => $runeData,
                'tags' => $tags,
            ],
            $region,
            Rune::class
        );
    }

    /**
     * Gets all summoner spells.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getSummonerSpellList.
     *
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $spellListData The list of summoner spell data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional boolean $dataById If true, the returned data will have the spells' IDs as keys.
     * @param optional string $region The region to use for this request.
     *
     * @return SummonerSpellCollection The collection of summoner spells.
     */
    public function getSummonerSpells($locale = 'en_US', $version = '', $spellListData = 'all', $tags = 'all', $dataById = false, $region = '')
    {
        return $this->get(
            '/summoner-spells',
            [
                'locale' => $locale,
                'version' => $version,
                'spellListData' => $spellListData,
                'tags' => $tags,
                'dataById' => $dataById ? 'true' : 'false',
            ],
            $region,
            SummonerSpellCollection::class
        );
    }

    /**
     * Gets a summoner spell by id.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getSummonerSpellById.
     *
     * @param int $id The summoner spell id.
     * @param optional string $locale The locale to use, defaults to en_US.
     * @param optional string $version The patch version to use for the data. Defaults to latest patch, empty string.
     * @param optional string|array $spellData The list of summoner spell data to return. Defaults to 'all'.
     * @param optional string|array $tags The list of tags to return. Defaults to 'all'.
     * @param optional string $region The region to use for this request.
     *
     * @return SummonerSpell The summoner spell object.
     */
    public function getSummonerSpellById($id, $locale = 'en_US', $version = '', $spellData = 'all', $tags = 'all', $region = '')
    {
        return $this->get(
            '/summoner-spells/' . $id,
            [
                'locale' => $locale,
                'version' => $version,
                'spellData' => $spellData,
                'tags' => $tags,
            ],
            $region,
            SummonerSpell::class
        );
    }

    /**
     * Gets all versions.
     *
     * @see https://developer.riotgames.com/api-methods/#lol-static-data-v3/GET_getVersions.
     *
     * @param optional string $region The region to use for this request.
     *
     * @return array An array with versions.
     */
    public function getVersions($region = '')
    {
        return $this->get(
            '/versions',
            [],
            $region,
            'array'
        );
    }
}
