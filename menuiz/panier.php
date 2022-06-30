<?php
if (!isset($_SESSION)) {
   session_start();
}

include_once("fonctions-panier.php");

$erreur = false;

$action = (isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null));
if ($action !== null) {
   if (!in_array($action, array('ajout', 'suppression', 'refresh')))
      $erreur = true;

   //récupération des variables en POST ou GET
   $l = (isset($_POST['l']) ? $_POST['l'] : (isset($_GET['l']) ? $_GET['l'] : null));
   $p = (isset($_POST['p']) ? $_POST['p'] : (isset($_GET['p']) ? $_GET['p'] : null));
   $q = (isset($_POST['q']) ? $_POST['q'] : (isset($_GET['q']) ? $_GET['q'] : null));

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '', $l);
   //On vérifie que $p est un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers

   if (is_array($q)) {
      $QteArticle = array();
      $i = 0;
      foreach ($q as $contenu) {
         $QteArticle[$i++] = intval($contenu);
      }
   } else
      $q = intval($q);
}

if (!$erreur) {
   switch ($action) {
      case "ajout":
         ajouterArticle($l, $q, $p);
         break;

      case "suppression":
         supprimerArticle($l);
         break;

      case "refresh":
         for ($i = 0; $i < count($QteArticle); $i++) {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i], round($QteArticle[$i]));
         }
         break;

      default:
         break;
   }
}

echo '<?xml version="1.0" encoding="utf-8"?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">

<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   <link rel="stylesheet" href="CSS/style.css">
</head>

<body>

   <form method="post" action="panier.php">
      <table style="width: 400px">
         <tr>
            <td colspan="4">Votre panier</td>
         </tr>
         <tr>
            <td>Libellé</td>
            <td>Quantité</td>
            <td>Prix Unitaire</td>
            <td>Action</td>
         </tr>


         <?php
         if (creationPanier()) {
            $nbArticles = count($_SESSION['panier']['libelleProduit']);
            if ($nbArticles <= 0)
               echo "<tr><td>Votre panier est vide </ td></tr>";
            else {
               for ($i = 0; $i < $nbArticles; $i++) {
                  echo "<tr>";
                  echo "<td>" . htmlspecialchars($_SESSION['panier']['libelleProduit'][$i]) . "</ td>";
                  echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"" . htmlspecialchars($_SESSION['panier']['qteProduit'][$i]) . "\"/></td>";
                  echo "<td>" . htmlspecialchars($_SESSION['panier']['prixProduit'][$i]) . "</td>";
                  echo "<td><a class='btn btn-danger ' href=\"" . htmlspecialchars("panier.php?action=suppression&l=" . rawurlencode($_SESSION['panier']['libelleProduit'][$i])) . "\">Supprimer</a></td>";
                  echo "</tr>";
               }

               echo "<tr><td colspan=\"2\"> </td>";
               echo "<td colspan=\"2\">";
               echo "Total : " . MontantGlobal();
               echo "</td></tr>";

               echo "<tr><td colspan=\"4\">";
               echo "<input class='btn btn-secondary' type=\"submit\" value=\"Modifier\"/>";
               echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
               echo "</td></tr>";

               echo "<a href='session.php'>Retour Accueil</a>";
            }
         }
         ?>
      </table>
   </form>
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>