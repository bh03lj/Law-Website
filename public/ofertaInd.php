<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <title>Law - Ofertas de Emprego</title>
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
    <div class="container" id="aboutPadding" style="padding-top: 50px;">
    <?php

        require_once('../php/OfertaEmprego.php');

        $id = $_GET["OfertaId"];

        $oferta = new OfertaEmprego();
        $oferta->getInd($id);

    ?>
    </div>

    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>