<?php

session_start();
if ($_SESSION["connecter"] != "yes") {
    header("location:login.php");
    exit();
}
if (date("H") < 18)
    $bienvenue = "Bonjour et bienvenue "  .
        $_SESSION["prenom_nom"];
else
    $bienvenue = "Bonsoir et bienvenue "  .
        $_SESSION["prenom_nom"];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Accueil </title>
</head>

<body>
    <?php


    // HEADER

    include "header_footer/header.php";

    include "panier.php";

    echo '<div class="zone-produits">';


    include "functions.php";
    $produitModel = new ModeleProduct(0);
    $produitStatement = $produitModel->RecupProduit($_GET['idProduit']);
    $produit = $produitStatement->fetchAll();



    echo '<div id="produit' . $produit[0]['PRD_ID'] . '" class="produits">';
    echo '<div class ="container-image">';
    echo '<img src="' . $produit[0]['PRD_PICTURE'] . '"/>';
    echo '</div> ';
    echo '<h2 class="titre">' . $produit[0]['PRD_DESCRIPTION'] . '</h2>';
    echo '<p class="description">' . $produit[0]['PRD_DEFINITION'] . '</p>';
    echo '<h2 class="prix">' . $produit[0]['PRD_PRICE'] . ' </h2>';

    echo '<a href="panier.php?action=ajout&amp;l=' . $produit[0]['PRD_DESCRIPTION'] . '&amp;q=1&amp;p=' . $produit[0]['PRD_PRICE'] . '" onclick="window.open(this.href, \'\', 
\'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;"  class="add-to-cart btn btn-primary">Ajouter au panier</a>';
    echo '</div>';

    echo '</div>;';


    include "header_footer/footer.php";
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>