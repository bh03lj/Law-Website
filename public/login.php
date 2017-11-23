<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <title>Law - Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://use.fontawesome.com/8d80846230.js"></script>
</head>
<body>

    <!--NAVBAR-->
    <?php

        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

            require_once("templates/navLogged.php");

        }
        else{

            require_once("templates/nav.php");

        }

    ?>

    <!--CONTENT-->
    <div class="container" id="aboutPadding">
        <div class="page-header">
            <h1>Login Empresas</h1>
        </div>
        <?php

            require_once('../php/User.php');

            if (isset($_POST['login'])) {
                $user = new User();
                $user->login($_POST['uid'], $_POST['pwd']);
            }

        ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="uid" class="form-control" placeholder="Inserir Username">
            </div>
            <div class="form-group">
                <label for="Password">Password:</label>
                <input type="Password" name="pwd" class="form-control" placeholder="Inserir Password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
    </div>

    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>