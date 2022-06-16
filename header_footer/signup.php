<?php
session_start();
include("dbconnect.php");

// // Si il y a une session active alors cette page ne s'affichera pas.
// if (isset($_SESSION['id'])) {
//     header('Location: index.php');
//     exit;
// }

// Si la variable "$_Post" contient des informations alors on les traitres
if (!empty($_POST)) {
    extract($_POST);
    $valid = true;

    // On se place sur le bon formulaire grâce au "name" de la balise "input"
    if (isset($_POST['inscription'])) {

        $firstname  = htmlspecialchars(trim($firstname)); // On récupère le prénom
        $lastname = htmlspecialchars(trim($lastname)); // on récupère le nom
        $email = htmlspecialchars(strtolower(trim($email))); // On récupère le mail
        $password_hash = sha1($password); // On récupère le mot de passe 
        $password_hash = sha1($cpassword); //  On récupère la confirmation du mot de passe

        // VERIF NOM
        if (empty($lastname)) {
            $valid = false;
            $er_lastname = "Le nom d'utilisateur ne peut pas être vide";
        }

        // VERIF PRENOM
        if (empty($firstname)) {
            $valid = false;
            $er_firstname = "Le prénom d'utilisateur ne peut pas être vide";
        }

        // VERIF MAIL

        if (empty($email)) {
            $valid = false;
            $er_email = "Le mail ne peut pas être vide";

            // Verifie que le mail est dans le bon format
        } elseif (!preg_match("/^[a-z0-9\-_.]+@[a-z]+\.[a-z]{2,3}$/i", $email)) {
            $valid = false;
            $er_email = "Le mail n'est pas valide";
        } else {
            // Verifie que le mail est dispo
            $req_mail = $DB->query(
                "SELECT USR_MAIL FROM t_d_user_usr WHERE USR_MAIL = ?",
                array($email)
            );

            $resultat = $req_mail->fetch();

            if ($resultat) {
                $valid = false;
                $er_email = "Ce mail existe déja";
            }
        }

        // VERIF MDP
        if (empty($password)) {
            $valid = false;
            $er_password = "Le mot de passe ne peut pas être vide";
        } elseif ($password != $cpassword) {
            $valid = false;
            $er_password = "La confirmation du mot de passe ne correspond pas";
        }

        // Si toutes les conditions sont remplies alors on fait le traitement
        if ($valid) {
            // $date_creation_compte = date('Y-m-d H:i:s');
            $password_hash = sha1($password);
            $token = bin2hex(random_bytes(12));

            // Insert donnée dans la table utilisateur
            $DB->insert(
                "INSERT INTO t_d_user_usr (USR_MAIL, USR_PASSWORD, USR_FIRSTNAME, USR_LASTNAME) VALUES (?,?,?,?)",
                array($email, $password_hash, $firstname, $lastname)
            );

            $req = $DB->query(
                "SELECT * FROM t_d_user_usr WHERE USR_MAIL = ?",
                array($email)
            );

            $req = $req->fetch();

            header('Location:index.php');
            session_start();
            $_SESSION['id'] = $req['USR_ID'];
            $_SESSION['firstname'] = $req['USR_FIRSTNAME'];
            $_SESSION['lastname'] = $req['USR_LASTNAME'];
            $_SESSION['email'] = $req['USR_MAIL'];

            exit;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Incsription - Menuiz</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/loginstyle.css">
</head>

<body>

    <div class="main">

        <div class="container">
            <?php
            if (isset($message)) {
                echo '<label class="text-danger">' . $message . '</label>';
            }
            ?>
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form">
                    <h2>Inscription</h2>
                    <div class="form-group">
                        <input type="text" class="form-input" name="firstname" id="name" placeholder="Prénom *" value="<?php if (isset($firstname)) {
                                                                                                                            echo $firstname;
                                                                                                                        } ?>" required />
                        <?php
                        if (isset($er_firstname)) {

                        ?>
                            <div class="message-error"><?= $er_firstname ?></div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="lastname" id="name" placeholder="Nom *" value="<?php if (isset($lastname)) {
                                                                                                                        echo $lastname;
                                                                                                                    } ?>" required />
                        <?php
                        if (isset($er_lastname)) {

                        ?>
                            <div class="message-error"><?= $er_lastname ?></div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" id="email" placeholder="Email *" value="<?php if (isset($email)) {
                                                                                                                        echo $email;
                                                                                                                    } ?>" required />
                        <?php
                        if (isset($er_email)) {

                        ?>
                            <div class="message-error"><?= $er_email ?></div>
                        <?php
                        }
                        ?>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="password" id="password" placeholder="Mot de passe *" value="<?php if (isset($password)) {
                                                                                                                                    echo $password;
                                                                                                                                } ?>" required />
                        <?php
                        if (isset($er_password)) {

                        ?>
                            <div class="message-error"><?= $er_password ?></div>
                        <?php
                        }
                        ?>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="cpassword" id="cpassword" placeholder="Confirmer le mot de passe *" requires />
                        <span toggle="#cpassword" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="inscription" id="submit" class="form-submit submit" value="S'inscrire" />
                        <a href="pdo_login.php" class="submit-link submit">Retour</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>