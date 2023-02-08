<div class="table-responsive">
    <table class="table table-hover table-striped table-sm">
        <thead>
        <tr>
            <th class="w-10">Drapeau</th>
            <th class="w-10">Code ISO 3</th>
            <th class="w-30">Nom officiel</th>
            <th class="w-20">Nom officiel français</th>
            <th class="w-20">Nom officiel anglais</th>
            <th class="w-10">Capitale</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /** @var array $data
         * @var integer $uid
         * @var string $cn_iso_2
         * @var string $cn_iso_3
         * @var string $cn_official_name_local
         * @var string $cn_short_fr
         * @var string $cn_official_name_en
         * @var string $cn_capital
         */
        foreach($data as $country) {
            extract($country);
            $showUrl = '/?mod=country&dis=show&uid=' . $uid;
            $line = '<tr>';
            $line .= '<td><a href="'.$showUrl.'">';
            $line .= '<img class="img-thumbnail rounded align-middle" alt="' . $cn_official_name_en . '" src="assets/imgs/flags/' . strtolower($cn_iso_2) . '.svg">';
            $line .= '</a></td>';
            $line .= '<td class="align-middle"><a href="'.$showUrl.'">' . $cn_iso_3 . '</a></td>';
            $line .= '<td class="align-middle">' . $cn_official_name_local . '</td>';
            $line .= '<td class="align-middle">' . $cn_short_fr . '</td>';
            $line .= '<td class="align-middle">' . $cn_official_name_en . '</td>';
            $line .= '<td class="align-middle">' . $cn_capital . '</td>';
            $line .= '</tr>';
            echo $line;
        }
        ?>
        </tbody>
    </table>
</div>