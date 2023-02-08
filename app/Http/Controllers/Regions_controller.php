<?php

namespace MVC\Controllers;

use MVC\Controllers\Controller;
use MVC\Utils\DB\Database;

class Regions extends Controller
{
    /***
     * Requête de toutes les régions
     * @return string
     */
    public function list(): string
    {
        $cnx = Database::getInstance();
        $regions = $cnx->requete('SELECT `uid`, `tr_name_fr` FROM `static_territories` ORDER BY `tr_name_fr`');
        return $this->render('layouts.Default', 'templates.Regions', $regions);
    }

    /***
     * Requête tous les pays d'une région selectionnée
     * @param $region_uid
     * @return string
     */
    public function getCountriesFromRegion($region_uid): string
    {
        $cnx = Database::getInstance();
        $parent_territory = $cnx->requete(
            sprintf('SELECT `tr_parent_territory_uid` FROM `static_territories` WHERE `uid`=%d', $region_uid),
            'fetch'
        );

        extract($parent_territory);
        // Requête des pays à partir de leur région
        $countries = [];

        /* @var int $tr_parent_territory_uid */
        if ($tr_parent_territory_uid > 0) {
            $countries = $cnx->requete(
                sprintf('SELECT `uid`, `cn_iso_2`, `cn_iso_3`, `cn_official_name_local`, `cn_official_name_en`, `cn_short_fr`, `cn_capital` 
                         FROM `static_countries` WHERE `cn_parent_territory_uid`=%s ORDER BY `cn_iso_3`', $region_uid));
        } else {
            $countries = $cnx->requete(
                sprintf('SELECT `uid`, `cn_iso_2`, `cn_iso_3`, `cn_official_name_local`, `cn_official_name_en`, `cn_short_fr`, `cn_capital` 
                FROM  `static_countries` 
                WHERE `cn_parent_territory_uid` IN (SELECT `uid` FROM `static_territories` WHERE `tr_parent_territory_uid` = %d)
                ORDER BY `cn_iso_3`', $region_uid)
            );
        }
        return $this->render('layouts.Fetch', 'templates.ListCountries', $countries);
    }
}