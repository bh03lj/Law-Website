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
    <div class="container">
        <div class="page-header">
            <h1>Ofertas de Emprego</h1>
        </div>
    </div>
    <div class="container" id="aboutPadding">
        <div class="row">
            <div class="col-sm-4">
                <h3>Parâmetros de Pesquisa</h3><br>
                <form method="get" action="<?php $_SERVER['PHP_SELF']?>">
                    <div class="form-group">
                        <label>Localidade:</label>
                        <select class="form-control" name="loc">
                            <option>(Todas as Localidades)</option>
                            <option>Açores</option>
                            <option>Aveiro</option>
                            <option>Beja</option>
                            <option>Braga</option>
                            <option>Bragança</option>
                            <option>Castelo Branco</option>
                            <option>Coimbra</option>
                            <option>Évora</option>
                            <option>Faro</option>
                            <option>Guarda</option>
                            <option>Leiria</option>
                            <option>Lisboa</option>
                            <option>Madeira</option>
                            <option>Portalegre</option>
                            <option>Porto</option>
                            <option>Santarém</option>
                            <option>Setúbal</option>
                            <option>Viana do Castelo</option>
                            <option>Vilda Real</option>
                            <option>Viseu</option>
                        </select><br>
                        <label>Categoria:</label>
                        <select class="form-control" name="cat">
                            <option>(Todas as Categorias)</option>
                            <option>Administrativo e Secretariado</option>
                            <option>Agricultura e Pescas</option>
                            <option>Artes</option>
                            <option>Banca e Seguros</option>
                            <option>Beleza e Bem Estar</option>
                            <option>Call Center, Help Desk e Telemarketing</option>
                            <option>Comunicação e Media</option>
                            <option>Construção Civil</option>
                            <option>Contabilidade e Finanças</option>
                            <option>Desporto</option>
                            <option>Educação e Formação</option>
                            <option>Engenharia</option>
                            <option>Hotelaria e Restauração</option>
                            <option>Imobiliário</option>
                            <option>Informática</option>
                            <option>Limpezas</option>
                            <option>Lojas e Comércio</option>
                            <option>Marketing e Publicidade</option>
                            <option>Moda</option>
                            <option>Recursos Humanos</option>
                            <option>Saúde</option>
                            <option>Transportes</option>
                            <option>Turismo</option>
                        </select>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="procurar">Procurar</button>
                </form>
            </div>
            <div class="col-sm-8 col-sm-5 col-sm-offset-2" style="padding-top: 50px;">
                <?php

                    require_once('../php/OfertaEmprego.php');

                    if (isset($_GET["procurar"])){

                        $oferta = new OfertaEmprego();
                        $oferta->getData($_GET["loc"], $_GET["cat"],"ofertaInd.php" );

                    }
                    else{

                        $oferta2 = new OfertaEmprego();
                        $oferta2->getAll("ofertaInd.php");

                    }
                ?>
            </div>
        </div>
    </div>

    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>