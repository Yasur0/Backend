<?php
require_once __DIR__ . '/../include/init.php';
adminSecurity();

require_once __DIR__ . '/../Model/DetailSavModel.php';
// DETAIL PRODUIT
$detailModel = new ModeleDetail(0);
$detailStatement = $detailModel->afficheDossierProduit();
$detail = $detailStatement->fetchAll(); // STATUS PRODUIT

require __DIR__ . '/../layout/top.php';
?>
<h1>Detail dossier</h1>

<table class="table_cat th_produits table table-striped">
    <tr>
        <th>N° Dossier</th>
        <th>Description</th>
        <th>Type Produit</th>
        <th>Quantite</th>
        <th>Prix unitaire</th>
        <th>Prix total</th>
        <th>Status</th>
    </tr>
    <?php
    foreach ($detail as $item) :

    ?>
        <tr>
            <td><?= $item['SAV_NUM_DOSSIER']; ?></td>
            <td><?= $item['PRD_DESCRIPTION']; ?></td>
            <td><?= $item['PTY_DESCRIPTION']; ?></td>
            <td><?= $item['DSV_QUANTITE']; ?></td>
            <td><?= $item['PRD_PRICE']; ?>€</td>
            <td><?= $item['PRD_PRICE'] * $item['DSV_QUANTITE']; ?>€</td>
            <td><?= $item['DGC_STATUT']; ?></td>
        </tr>
    <?php
    endforeach;
    ?>
</table>