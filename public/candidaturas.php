<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <title>Law - Candidatura</title>
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
    <div class="container" style="padding-bottom: 30px;">
        <div class="page-header">
            <h1>Ficha de Candidatura</h1>
        </div>
        <?php

            require_once('../php/OfertaEmprego.php');

            if (isset($_POST["submitCand"])){

                $id = $_GET["OfertaId"];
                $oferta = new OfertaEmprego();
                $oferta->sendMail($id, $_POST["nome"], $_POST["contacto"], $_POST["email"], $_POST["num"], $_POST["data"], $_POST["hab"], $_POST["empresa"], $_POST["empresa1"], $_POST["empresa2"], $_POST["empresa3"], $_POST["função"], $_POST["função1"], $_POST["função2"], $_POST["função3"], $_POST["dataIni"], $_POST["dataFim"], $_POST["dataIni1"], $_POST["dataFim1"], $_POST["dataIni2"], $_POST["dataFim2"], $_POST["dataIni3"], $_POST["dataFim3"], $_POST["obj"], $_POST["for"], $_POST["for2"], $_POST["hobbies"], $_POST["law"], $_POST["vir"], $_POST["razoes"],  $_FILES['file']['name'], $_FILES["file"]["tmp_name"], pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION), $_FILES['file']['size'], date("m.d.y"));

            }

        ?>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" id="imgPaddingBt">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" name="nome" class="form-control" placeholder="Inserir Nome">
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>Contacto Telefónico:</label>
                        <input type="text" name="contacto" class="form-control" placeholder="Inserir Contacto Telefónico">
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="form-group">
                        <label>E-mail:</label>
                        <input type="email" name="email" class="form-control" placeholder="Inserir E-mail">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Número de filhos:</label>
                        <input type="text" name="num" class="form-control" placeholder="Inserir Número de filhos">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Disponibilidade a partir de que data:</label>
                        <input type="date" name="data" class="form-control" placeholder="Inserir Disponibilidade">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Habilitações literárias:</label>
                <select name="hab" class="form-control">
                    <option>9.º ano de escolaridade</option>
                    <option>12º ano de escolaridade</option>
                    <option>Curso técnico-profissional</option>
                    <option>Licenciatura</option>
                    <option>Mestrado</option>
                    <option>Doutoramento</option>
                </select>
            </div>
            <div class="form-group" id="imgPadding">
                <label id="imgPaddingTp">Experiência profissional</label>
                <div class='row'>
                    <div class='col-sm-4'>
                        <label>Empresa:</label>
                        <input type="text" class="form-control" placeholder="Inserir nome da Empresa" name="empresa"><br>
                        <input type="text" class="form-control" placeholder="Inserir nome da Empresa" name="empresa1"><br>
                        <input type="text" class="form-control" placeholder="Inserir nome da Empresa" name="empresa2"><br>
                        <input type="text" class="form-control" placeholder="Inserir nome da Empresa" name="empresa3"><br>
                    </div>
                    <div class='col-sm-4'>
                        <label>Função:</label>
                        <input type="text" class="form-control" placeholder="Inserir Função" name="função"><br>
                        <input type="text" class="form-control" placeholder="Inserir Função" name="função1"><br>
                        <input type="text" class="form-control" placeholder="Inserir Função" name="função2"><br>
                        <input type="text" class="form-control" placeholder="Inserir Função" name="função3"><br>
                    </div>
                    <div class='col-sm-4'>
                        <label>Data:</label>
                        <div class="row">
                            <div class='col-sm-6'>
                                <input type="date" class="form-control" name="dataIni">
                            </div>
                            <div class='col-sm-6'>
                                <input type="date" class="form-control" name="dataFim">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class='col-sm-6'>
                                <input type="date" class="form-control" name="dataIni1">
                            </div>
                            <div class='col-sm-6'>
                                <input type="date" class="form-control" name="dataFim1">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class='col-sm-6'>
                                <input type="date" class="form-control" name="dataIni2">
                            </div>
                            <div class='col-sm-6'>
                                <input type="date" class="form-control" name="dataFim2">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class='col-sm-6'>
                                <input type="date" class="form-control" name="dataIni3">
                            </div>
                            <div class='col-sm-6'>
                                <input type="date" class="form-control" name="dataFim3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Objectivos profissionais para daqui a 5 anos:</label>
                        <textarea name="obj" class="form-control" rows="5" placeholder="Inserir Objectivos" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Formação complementar profissional:</label>
                        <textarea name="for" class="form-control"  rows="5" placeholder="Inserir Formação profissional" style="resize: none;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Formação complementar pessoal:</label>
                        <textarea name="for2" class="form-control" rows="5" placeholder="Inserir Formação pessoal" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Hobbies ou gostos pessoais:</label>
                        <textarea name="hobbies" class="form-control" rows="5" placeholder="Inserir Hobbies" style="resize: none;"></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Explique o que ganharia a LAW se a seleccionasse:</label>
                        <textarea name="law" class="form-control" rows="5" placeholder="Inserir o que ganharia a LAW se a seleccionasse" style="resize: none;"></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Indique as virtudes que melhor o caracterizam:</label>
                        <textarea name="vir" class="form-control" rows="5" placeholder="Inserir Virtudes" style="resize: none;"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Indique as razões principais que o levam a candidatura:</label>
                <textarea class="form-control" rows="5" style="resize: none;" placeholder="Inserir Razões" name="razoes"></textarea>
            </div>
            <div id="imgPaddingBt">
                <button type="submit" class="btn btn-primary" name="submitCand">Submeter</button>
                <label class="btn btn-primary btn-file">
                    Inserir CV <input type="file" style="display: none;" name="file">
                </label>
            </div>
        </form>
    </div>


    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>