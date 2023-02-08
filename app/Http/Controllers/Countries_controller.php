<?php

namespace MVC\Controllers;

use MVC\Controllers\Controller;
use MVC\Utils\DB\Database;

class Countries extends Controller
{
    public function listPaginate($nombre): string
    {
        $cnx = Database::getInstance();

        // On récupère le nombre d'enregistrements dans la table static_countries
        $nbCountries_ar = $cnx->requete('SELECT COUNT(*) AS nbCountries FROM static_countries', 'fetch');
        $nbCountries = $nbCountries_ar['nbCountries'];

        // On récupère la page à afficger d ans l'URL
        $page = $_GET['page'] ?? 1;

        // On calcule le rang du premier enregistrement de la page.
        $rang = $page * $nombre - $nombre;

        // Requête de tous les pays
        $countries = $cnx->requete('SELECT `uid`, `cn_iso_2`, `cn_iso_3`, `cn_official_name_local`, `cn_short_fr`, `cn_official_name_en`, `cn_capital` FROM `static_countries` ORDER BY `cn_iso_3` LIMIT ' . $rang . ',' . $nombre);
        return $this->render('layouts.Default', 'templates.ListCountriesPaginated', $countries, $nbCountries, $nombre);
    }

    public function show($uid_country): string
    {
        // On se connecte à la base de données
        $cnx = Database::getInstance();

        // Requête d'un seul pays
        $country = $cnx->requete('SELECT `cn_iso_2`, `cn_iso_3`, `cn_official_name_local`, `cn_short_fr`, `cn_official_name_en`, `cn_capital`, `cn_tldomain`, `cn_phone`, `cn_eu_member`, `cn_uno_member` FROM `static_countries` WHERE `uid`=' . $uid_country, 'fetch');

        // On affiche les informations d'un seul pays par son uid
        return $this->render('layouts.Default', 'templates.ShowCountry', $country);
    }
}