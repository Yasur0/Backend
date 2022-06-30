<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/diag.css">
    <title>Diagnostique</title>
</head>

<body>

    <?php
    require_once __DIR__ . '/../include/init.php';
    adminSecurity();
    require __DIR__ . '/../layout/top.php'; ?>

    <div class="grid">
        <div class="cont grid1" id="search ">
            <h1>Rechercher</h1>
            <label for="#BL">Recherche pas BL, LF, OL :</label>
            <input id="BL" type="text"><br>
            <label for="#numCom">Numéro de commande ou d'affaire :</label>
            <input id="numCom" type="text"><br>
            <label for="#numDoss">Numéro de dossier :</label>
            <input id="numDoss" type="text"><br>
            <label for="#logWeb">Login Web :</label>
            <input id="logWeb" type="text"><br>
            <label for="#provenance">Provenance :</label>
            <input id="provenance" type="text"><br>
            <label for="#denomCli">Dénomination Client :</label>
            <input id="denomCli" type="text"><br>
            <label for="#numFournisseur">Numéro Fournisseur :</label>
            <input id="numFournisseur" type="text">
        </div>
        <div class="cont grid2" id="dossiersCont ">
            <h1>Dossiers</h1>
            <div class="zoneDossiers"></div>
        </div>
        <div class="cont grid3" id="dossiercont ">
            <h1>Dossier</h1>
            <label for="#numeroDossier">Numéro de dossier :</label>
            <input id="numeroDossier" type="text"><br>
            <label for="#numeroFournisseur">Numéro de fournisseur :</label>
            <input id="numeroFournisseur" type="text"><br>
            <label for="#numeroCommande">N° Commande :</label>
            <input id="numeroCommande" type="text"><br>
            <label for="#dateCreation">Date de création :</label>
            <input id="dateCreation" type="date"><br>
            <label for="#typeDossier">Type de dossier :</label>
            <input id="typeDossier" type="text"><br>
            <label for="#denominationClient">Dénomination Client :</label>
            <input id="denominationClient" type="text">
        </div>
        <div class="cont grid4" id="detailDossierCont">
            <h1>Détail Dossier</h1>
            <div class="zoneDetailDossier"></div>
        </div>
        <div class="cont grid5" id="listeDiagCont ">
            <h1>Liste Diagnostique</h1>
            <div class="zoneDiag"></div>
        </div>
        <div class="cont grid6" id="detailDiagCont ">
            <h1>Détail Diagnostique</h1>
            <label for="produitDossier">Produit du dossier :</label>
            <input id="produitDossier" type="text"><br>
            <label for="produitComposant">Produit ou composant :</label>
            <input id="produitComposant" type="text"><br>
            <label for="numSerie">Numéro de série ou identifiant: </label>
            <input id="numSerie" type="text"><br>
            <label for="comm">Commentaires</label>
            <input id="comm" type="text">
        </div>
    </div>

    <!-- grid -->

    <!-- <div class="parent">
        <div class="div1"> </div>
        <div class="div2"> </div>
        <div class="div3"> </div>
        <div class="div4"> </div>
        <div class="div5"> </div>
        <div class="div6"> </div>
    </div> -->


    <?php require __DIR__ . '/../layout/bottom.php'; ?>
</body>

</html>