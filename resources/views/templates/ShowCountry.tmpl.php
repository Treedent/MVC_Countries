<?php
    /***
     * Template affichant les informations d'un pays
     * @var array $data
    ***/
    $labels = [
        'cn_iso_2' => 'Code ISO 2',
        'cn_iso_3' => 'Code ISO 3',
        'cn_official_name_local' => 'Nom officiel local',
        'cn_official_name_en' => 'Nom officiel anglais',
        'cn_short_fr' => 'Nom officiel français',
        'cn_capital' => 'Capitale',
        'cn_tldomain' => 'Domain internet',
        'cn_phone' => 'Indicatif téléphonique',
        'cn_eu_member' => 'Membre de l\'UE',
        'cn_uno_member' => 'Membre des Nations Unies'
    ];
?>

<div class="table-responsive">

    <table class="table table-hover table-striped table-sm">
        <tr>
            <td class="align-middle text-center" colspan="2">
                <img src="assets/imgs/flags/<?= strtolower($data['cn_iso_2']);?>.svg" class="w-25 img-fluid rounded" alt="<?= $data['cn_official_name_en'];?>'">
            </td>
        </tr>
        <?php
            foreach($data as $key=>$countryInfo) {
        ?>
            <tr>
                <th class="w-25"><?= $labels[$key]; ?></th>
                <?php
                    if($key ==='cn_eu_member' || $key==='cn_uno_member') {
                        $countryInfo = $countryInfo === 0 ? 'Non' : 'Oui';
                    }
                ?>
                <td><?= $countryInfo; ?></td>
            </tr>

        <?php } ?>
    </table>
    <a href="/" class="btn btn-primary float-start">Retourner à la liste des pays</a>
</div>
<!--
uid
cn_iso_2
cn_iso_3
cn_iso_nr
cn_parent_territory_uid
cn_parent_tr_iso_nr
cn_official_name_local
cn_official_name_en
cn_capital
cn_tldomain
cn_currency_uid
cn_currency_iso_3
cn_currency_iso_nr
cn_phone
cn_eu_member
cn_uno_member
cn_address_format
cn_zone_flag
cn_short_local
cn_short_en
cn_country_zones
-->


