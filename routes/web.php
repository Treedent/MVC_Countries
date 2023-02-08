<?php

use MVC\Controllers\Countries;
use MVC\Controllers\Regions;

// Inclusion du chargement automatique des classes utilisées dans l'application.
require_once __DIR__ . '/../app/autoload.php';

$_GP = array_merge($_POST, $_GET);

$countrylist_active = $regionlist_active = ' text-white';

// Je suis sur la Home Page
if (empty($_GP)) {
    $countrylist_active = ' text-bg-light';
}

if (isset($_GP['mod']) && $_GP['mod'] === 'country') {
    if (isset($_GP['dis']) && $_GP['dis'] === 'list') {
        $countrylist_active = ' text-bg-light';
        if (isset($_GP['page'])) {
            $country = new Countries;
            echo $country->listPaginate(20);
            exit();
        }
    }
    if (isset($_GP['dis']) && $_GP['dis'] === 'show') {
        if (isset($_GP['uid'])) {
            $country = new Countries;
            echo $country->show($_GP['uid']);
            exit();
        }
    }
}

if (isset($_GP['mod']) && $_GP['mod'] === 'region') {
    if (isset($_GP['dis']) && $_GP['dis'] === 'list') {
        $regionlist_active = ' text-bg-light';
        $region = new Regions;
        echo $region->list();
        exit();
    }
    if (isset($_GP['dis']) && $_GP['dis'] === 'show') {
        if (isset($_GP['uid'])) {
            $region = new Regions;
            echo $region->show($_GP['uid']);
            exit();
        }
    }
}

if(isset($_GP['regionsList'])) {
    $region= new Regions;
    $countries = $region->getCountriesFromRegion($_GP['regionsList']);
    echo json_encode(['success'=>true, 'content'=>$countries]);
    exit();
}


