<?php

session_start();
include("infos.php");
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
    include("connexion.php");
    $verify = $pdo->prepare("select * from t_d_user_usr where username=? and USR_PASSWORD=? limit 1");
    $verify->execute(array($pseudo, $pass_crypt));
    $user = $verify->fetchAll();
    if (count($user) > 0) {
        $_SESSION["prenom_nom"] = $pseudo;
        // ucfirst(strtolower($user[0]["prenom"])) .
        // " "  .  strtoupper($user[0]["nom"]);
        $_SESSION["connecter"] = "yes";
        header("location:session.php");
    } else
        $erreur = "Mauvais login ou mot de passe!";
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="CSS/style.css">
    <style>
        * {
            font-family: arial;
        }

        body {
            margin: 20px;
        }

        form {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -150px;
            margin-top: -100px;
        }

        h1 {
            text-align: center;
            color: #FFFAFA;
            background: gray;
        }

        input[type=submit] {
            border: solid 1px violet;
            margin-bottom: 10px;
            float: right;
            padding: 15px;
            outline: none;
            border-radius: 7px;
            width: 120px;
        }

        input[type=text],
        [type=password] {
            border: solid 1px violet;
            margin-bottom: 10px;
            padding: 16px;
            outline: none;
            border-radius: 7px;
            width: 300px;
        }

        .erreur {
            text-align: center;
            color: red;
            margin-top: 10px;
        }

        a {
            font-size: 14pt;
            color: blue;
            text-decoration: none;
            font-weight: normal;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body onLoad="document.fo.login.focus()">
    <h1>Authentification</h1>
    <div class="erreur"><?php echo  $erreur  ?></div>
    <form name="form" method="post" action="">
        <input type="text" name="pseudo" placeholder="Votre Pseudo" /><br />
        <input type="password" name="password" placeholder="Mot de passe" /><br />
        <input type="submit" name="valider" value="S'authentifier" />
        <a href="inscription.php">Créer votre Compte</a>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>