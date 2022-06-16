<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$database = "menuiz";
$message = "";
try {
    $connect = new PDO("mysql:host=$host; dbname=$database", $username, $password);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST["login"])) {
        if (empty($_POST["username"]) || empty($_POST["password"])) {
            $message = '<label>All fields are required</label>';
        } else {
            $query = "SELECT * FROM t_d_user_usr WHERE  USR_MAIL = :username AND USR_PASSWORD = sha1(:password)";
            $statement = $connect->prepare($query);
            $statement->execute(
                array(
                    'username'     =>     $_POST["username"],
                    'password'     =>     $_POST["password"],
                )
            );
            $users = $statement->fetchAll();

            $count = count($users);

            if ($count > 0) {
                foreach ($users as $user) {
                    $_SESSION["name"] = $user['USR_FIRSTNAME'] . ' ' . $user['USR_LASTNAME'];
                }
                header("location:index.php");
            } else {
                $message = '<label>Wrong Data</label>';
            }
        }
    }
    // Emmene vers la page d'inscription
    if (isset($_POST["signup"])) {
        header("location:signup.php");
    }
} catch (PDOException $error) {
    $message = $error->getMessage();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Menuiz - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css" />
</head>

<body>
    <br />
    <div class="container" style="width:500px;">
        <?php
        if (isset($message)) {
            echo '<label class="text-danger">' . $message . '</label>';
        }
        ?>
        <h3 align="">Hello </h3><br />
        <div class="container">
            <form method="post">
                <label>Email</label>
                <input type="text" name="username" class="form-control" />
                <br />
                <label>Password</label>
                <input type="password" name="password" class="form-control" />
                <br />
                <div class="logcont">
                    <input type="submit" name="login" class="btn btn-primary" value="Se connecter" />
                    <p>Ou</p>
                    <input type="submit" name="signup" class="btn btn-primary" value="Créer un compte" />
                </div>

            </form>
        </div>
    </div>
    <br />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>