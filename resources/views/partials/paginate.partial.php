<?php
/***
 * @var int $nbdata
 * @var int $nbperpage
 ***/
$currentpage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$nbpages = (int)ceil($nbdata / $nbperpage);
$rang = $currentpage * $nbperpage - $nbperpage + 1;
$rangmax = $currentpage * $nbperpage < $nbdata ? $currentpage * $nbperpage : $nbdata;
?>
<hr>
<nav aria-label="Navigation">
    <ul class="pagination pagination-sm">
        <?php
            $previous_disabled = $currentpage === 1 ? ' disabled' : '';
            $lnk = '/?mod=country&dis=list&page=' . $currentpage - 1;
        ?>
        <li class="page-item"><a class="page-link<?= $previous_disabled; ?>" href="<?= $lnk; ?>">Précédent</a></li>
        <?php
            for ($i = 1; $i <= $nbpages; $i++) {
                $lnk = '/?mod=country&dis=list&page=' . $i;
                $pageactive = $currentpage === $i ? ' active' : '';
            ?>
            <li class="page-item"><a class="page-link<?= $pageactive; ?>" href="<?= $lnk; ?>"><?= $i; ?></a></li>
        <?php } ?>
        <?php
            $next_disabled = $currentpage === $nbpages ? ' disabled' : '';
            $lnk = '/?mod=country&dis=list&page=' . $currentpage + 1;
        ?>
        <li class="page-item"><a class="page-link<?= $next_disabled; ?>" href="<?= $lnk; ?>">Suivant</a></li>
        <li class="ms-3">
            <?= '<h5 class="badge bg-primary">Enregistrements ' . $rang . ' à ' . $rangmax . ' sur ' . $nbdata . '</h5>' ?>
        </li>
    </ul>
</nav>
<hr>
