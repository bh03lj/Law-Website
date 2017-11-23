<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Adicionar Oferta</title>
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
            <h1>Nova Oferta</h1>
        </div>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" style="padding-bottom: 40px; padding-top: 30px;">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Nome da Oferta:</label>
                                <input type="text" name="oferta" class="form-control" placeholder="Inserir Nome da Oferta">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Nome da Empresa:</label>
                                <input type="text" name="empresa" class="form-control" placeholder="Inserir Nome da Empresa">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Localidade:</label>
                                <select class="form-control" name="loc">
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
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="Morada">Categoria:</label>
                                <select class="form-control" name="cat">
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
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>E-mail da Empresa:</label>
                        <input type="email" name="email" class="form-control" placeholder="Inserir E-mail da Empresa">
                    </div>
                    <div class="form-group">
                        <label>Anúncio:</label>
                        <textarea class="form-control" rows="5" style="resize: none;" name="anuncio" placeholder="Inserir Anúncio"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submeter</button>
                    </div>
                    <div class="col-sm-6" style="padding-top: 50px;">
                    <?php

                        require_once ('../php/OfertaEmprego.php');

                        $oferta = new OfertaEmprego();

                        if (isset($_POST["submit"])){

                            $oferta->setOferta($_POST["oferta"], date("y.m.d"), $_POST["loc"], $_POST["cat"], $_POST["empresa"], $_POST["anuncio"], $_POST["email"]);

                        }

                        $oferta->getAll("oferta.php");

                    ?>
                    </div>
            </div>
        </form>
    </div>


</body>
</html>