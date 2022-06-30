<?php
session_start();
include("infos.php");
@$valider = $_POST["inscrire"];
$erreur = "";
if (isset($valider)) {
  if (empty($nom)) $erreur = "Le champs nom est obligatoire !";
  elseif (empty($prenom)) $erreur = "Le champs prénom est obligatoire !";
  elseif (empty($pseudo)) $erreur = "Le champs Pseudo est obligatoire !";
  elseif (empty($email)) $erreur = "Le champs Email est obligatoire !";
  elseif (empty($password)) $erreur = "Le champs mot de passe est obligatoire !";
  elseif ($password != $passwordConf) $erreur = "Mots de passe differents !";
  else {
    include("connexion.php");
    $verify_pseudo = $pdo->prepare("select USR_ID from t_d_user_usr where username=? limit 1");
    $verify_pseudo->execute(array($pseudo));
    $user_pseudo = $verify_pseudo->fetchAll();
    if (count($user_pseudo) > 0)
      $erreur = "Pseudo existe déjà!";


    /* Vérifier si l'e-mail est déjà dans la base de données. */
    $verify_email = $pdo->prepare("select USR_ID from t_d_user_usr where USR_MAIL=? limit 1");
    $verify_email->execute(array($email));
    $user_email = $verify_email->fetchAll();
    if (count($user_email) > 0)
      $erreur = "Email déjà existante !";

    else {
      $ins = $pdo->prepare("insert into t_d_user_usr(USR_LASTNAME,USR_FIRSTNAME,username,USR_PASSWORD, USR_MAIL) values(?,?,?,?,?)");
      if ($ins->execute(array($nom, $prenom, $pseudo, md5($password), $email)))
        header("location:login.php");
    }
  }
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
    [type=password],
    [type=email] {
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

<body>
  <h1>Inscription</h1>
  <div class="erreur"><?php echo  $erreur  ?></div>
  <form name="fo" method="post" action="">
    <input type="text" name="nom" placeholder="Nom" value="<?= $nom  ?>" /><br />
    <input type="text" name="prenom" placeholder="Prénom" value="<?= $prenom  ?>" /><br />
    <input type="text" name="pseudo" placeholder="Votre Pseudo" value="<?= $pseudo  ?>" /><br />
    <input type="email" name="email" placeholder="Votre adresse mail" /> <br>
    <input type="password" name="password" placeholder="Mot de passe" /><br />
    <input type="password" name="passconf" placeholder="Confirmez votre Mot de passe" /><br />
    <input type="submit" name="inscrire" value="S'inscrire" />
    <a href="login.php">Deja un compte ?</a>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>