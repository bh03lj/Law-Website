<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <title>Law - A Empresa</title>
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
    <div class="container">
        <div class="page-header">
            <h1>A Empresa</h1>
        </div>
    </div>
    <div class="container" id="aboutPadding">
        <div class="row">
            <div class="col-sm-6" style="padding-top: 50px;">
                <img src="../public/resizedPics/office.jpg" class="img-responsive">
            </div>
            <div style="padding-top: 50px;">
                <div class="col-sm-6" id="info">
                    <h3>Capital Social de 5000€</h3>
                    <h3>Sediada na Morada R. Grão Vasco 62, Póvoa de Santa Iria</h3>
                    <h3>Administração: Cristina Dias</h3>
                    <h3>Direção Financeira: Cristina Dias</h3>
                    <h3>Getão de Recursos Humanos: Cristina Dias</h3>
                    <h3>Departamento Comercial: Cristina Dias</h3>
                </div>
            </div>
        </div>
    </div>


    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>