<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Accueil </title>
</head>

<body>
    <?php
    session_start();

    // HEADER

    include "header.php";
    ?>
    <div class="separation"></div>
    <?php
    echo '<div class="zone-produits">';


    echo '<a href="index.php" class="btn btn-danger">Retour</a>';
    include "fonction.php";
    include "dbconnect.php";
    $produitModel = new ModeleProduct(0);
    $produitStatement = $produitModel->RecupProduit($_GET['idProduit']);
    $produit = $produitStatement->fetchAll();


    echo '<div id="produit' . $produit[0]['PRD_ID'] . '" class="produits-page">';
    echo '<div class ="container-image">';
    if (empty($produit[0]['PRD_PICTURE'])) {
        echo '<img src="img/meme.png"/>';
    } else {
        echo '<img src="' . $produit[0]['PRD_PICTURE'] . '"/>';
    }
    echo '</div> ';
    echo '<h2 class="titre">' . $produit[0]['PRD_DESCRIPTION'] . '</h2>';
    echo '<p class="description">' . $produit[0]['PRD_DEFINITION'] . '</p>';
    echo '<h2 class="prix">' . $produit[0]['PRD_PRICE'] . ' </h2>';
    ?>
    <form class="form-inline" method="POST">
        <div class="form-group mb-2">
            <input type="number" name="product_qty" id="productQty" class="form-control" placeholder="Quantity" min="1" max="1000" value="1">
            <input type="hidden" name="product_id" value="<?php echo $produit[0]['PRD_ID'] ?>">
        </div>
        <div class="form-group mb-2 ml-2">
            <button type="submit" class="btn btn-primary" name="add_to_cart" value="add to cart">Ajouter au panier</button>
        </div>
    </form <?php

            echo '</div>';

            echo '</div>;';


            include "footer.php";
            ?> <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>