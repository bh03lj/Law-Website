<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Propostas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styleAdmin.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://use.fontawesome.com/8d80846230.js"></script>
</head>
<body>

    <!--NAVBAR-->
    <?php require_once ('templates/nav.php')?>

    <!--CONTENT-->
    <div class="container">
        <div class="page-header">
            <h1>Propostas de Empresas</h1>
        </div>
        <?php

        require_once ("../php/Proposta.php");

        $proposta = new Proposta();


        if (isset($_POST["submit"])){
            $proposta->deleteProposta();
        }

        $proposta->getPropostas();
        
        ?>
    </div>


</body>
</html>