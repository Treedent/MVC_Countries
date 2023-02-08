<?php
/***
 * Template affichant la liste des pays par région
 * @var array $data
 * @var int $uid
 * @var string $tr_name_fr
 * @var int $tr_parent_territory_uid
 ***/
?>
<h2>Liste des pays par Région</h2>
<div class="row">
    <div class="col-6">
        <form id="regionsForm">
            <div class="form-floating">
                <select class="form-select" name="regionsList" id="regionsList" aria-label="Veuillez sélectionner une région">
                    <option value="0" selected>Veuillez sélectionner une région</option>
                    <?php
                    foreach ($data as $region) {
                        extract($region);
                        ?>
                        <option data-continent="<?= $tr_parent_territory_uid;?>" value="<?= $uid; ?>"><?= $tr_name_fr; ?></option>
                    <?php } ?>
                </select>
                <label for="regionsList">Liste des régions du monde</label>
            </div>
        </form>
    </div>
</div>
<div class="row mt-5 d-none" id="countriesList">
    <div class="col">
        <h3>Liste des pays de la zone <span id="regionName"></span></h3>
        <div id="selectedList" class="text-center"></div>
    </div>
</div>



