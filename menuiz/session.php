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
<html>

<head>
    <meta charset="utf-8" />
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 20px;
        }

        h2 {
            text-align: center;
            color: pink;
        }


        #userbar {
            color: blue;
            text-decoration: none;
            float: right;
        }
    </style>
</head>

<body onLoad="document.fo.login.focus()">
    <?php include "header_footer/header.php"; ?>

    <div class="panier"><?php include "panier.php"; ?></div>
    <h2 class="bienvenue"><?php echo  $bienvenue  ?></h2>
    <?php

    $mysqlConnection = new PDO('mysql:host=localhost;dbname=menuiz;charset=utf8', 'root', '');
    $produitStatement = $mysqlConnection->prepare('SELECT * FROM t_d_product_prd');

    $produitStatement->execute();
    $produits = $produitStatement->fetchAll();



    include "produits.php";
    include "header_footer/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>