<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="stylesheet" href="CSS/style.css">
        <title>Menuiz - Accueil </title>
</head>

<body>
        <?php
        // HEADER
        session_start();
        include "header.php";
        echo "<main>";

        echo '<div id="admin-box" class="box-container">';
        echo '<div class="adminPage">';
        echo '<div class="fold-container shadow form-admin">';

        // <?php
        if (isset($_SESSION["name"])) {
                echo '<H1 class="form-legend">Bienvenue ' . $_SESSION["name"] . ' !</H1>';
                echo '<br /><br /><a href="logout.php">Se déconnecter</a>';
        } else {
                header("location:pdo_login.php");
        }


        echo '</div>';
        echo '</div>';
        echo '<div class="adminPage">';
        echo '<div  class="fold-container shadow form-admin">';

        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '<div class="cardContainer">';
        $mysqlConnection = new PDO('mysql:host=localhost;dbname=menuiz;charset=utf8', 'root', '');
        $produitStatement = $mysqlConnection->prepare('SELECT * FROM t_d_product_prd');
        include "fonction.php";
        $produitModel = new ModeleProduct(0);
        $produitStatement = $produitModel->lireProduits();
        $produits = $produitStatement->fetchAll();

        // On affiche chaque produit un à un
        echo '<div class="row">';
        foreach ($produits as $produit) {


                echo '<form action="page_produit.php" method="GET" class="col-3">';
                echo '<div name ="idProduit" id="produit' . $produit['PRD_ID'] . '" class="produits">';
                echo '<div class ="container-image">';
                echo '<a href="page_produit.php?idProduit=' . $produit['PRD_ID'] . '">';

                if (empty($produit['PRD_PICTURE'])) {
                        echo '<img src="img/meme.png"/>';
                } else {
                        echo '<img src="' . $produit['PRD_PICTURE'] . '"/>';
                }

                echo '</a></div> ';
                echo '<p class="titre">' . $produit['PRD_DESCRIPTION'] . '</p>';
                echo '<p class="prix">' . $produit['PRD_PRICE'] . '$</p>';
                echo '<a class="view-more btn btn-primary" href="page_produit.php?idProduit=' . $produit['PRD_ID'] . '">Voir plus</a>';
                echo '</div>';
                echo '</form>';
        }



        // Bouton ajout panier  
        //         echo '<a href="panier.php?action=ajout&amp;l=LIBELLEPRODUIT&amp;q=QUANTITEPRODUIT&amp;p=PRIXPRODUIT" onclick="window.open(this.href, \'\', 
        // \'toolbar=no, location=no, directories=no, status=yes, scrollbars=yes, resizable=yes, copyhistory=no, width=600, height=350\'); return false;"  class="add-to-cart btn btn-primary">Ajouter au panier</a>';


        echo '</div>';
        echo '</div>';
        echo "</main>";

        // FOOTER
        include "footer.php";
        // phpinfo()
        ?>
        <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>