<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <title>Law - Ficha de Inscrição</title>
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
            <h1>Ficha de Inscrição</h1>
        </div>
        <?php

            require_once('../php/Inscricao.php');

            if (isset($_POST["submitIns"])){
                $inscricao = new Inscricao();
                $inscricao->setInscricao($_POST["nome"], $_POST["morada"], $_POST["email"], $_POST["contacto"], $_POST["curso"], $_POST["data"], "N/A", "N/A", "N/A", "N/A");
                $inscricao->setData();
            }
            elseif(isset($_POST["submitEmpIns"])){
                $inscricaoEmp = new Inscricao();
                $inscricaoEmp->setInscricao($_POST["nomeEmp"], $_POST["moradaEmp"], $_POST["emailEmp"], $_POST["contactoEmp"], $_POST["cursoEmp"], $_POST["dataEmp"], $_POST["nipc"], $_POST["numFor"], $_POST["tipo"], $_POST["nomeFor"]);
                $inscricaoEmp->setData();
            }

        ?>
    <div class="row">
        <div class="col-sm-6" style="padding-top: 20px;">
            <h3 style="padding-bottom: 15px;">Particular</h3>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                <div class="form-group">
                    <label>Nome Completo:</label>
                    <input type="text" name="nome" class="form-control" placeholder="Inserir Nome Completo">
                </div>
                <div class="form-group">
                    <label>Morada:</label>
                    <input type="text" name="morada" class="form-control" placeholder="Inserir Morada">
                </div>
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="Inserir E-mail">
                </div>
                <div class="form-group">
                    <label>Contacto Telefónico:</label>
                    <input type="text" name="contacto" class="form-control" placeholder="Inserir Contacto Telefónico">
                </div>
                <div class="form-group">
                    <label>Cursos a frequentar:</label>
                    <select name="curso" class="form-control">
                        <option>Formação</option>
                        <option>Corte e Modelagem</option>
                        <option>Geriatria</option>
                        <option>Estética</option>
                        <option>Medicina Alternativa</option>
                        <option>Shiatsu</option>
                        <option>Acupuntura</option>
                        <option>Inglês I, II, III</option>
                        <option>Contabilidade</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Data de Início:</label>
                    <input type="date" class="form-control" placeholder="Inserir Data de Início" name="data">
                </div>
                <button type="submit" class="btn btn-primary" name="submitIns">Submeter</button>
            </form>
        </div>
        <div class="col-sm-6" style="padding-bottom: 40px; padding-top: 20px;">
            <h3 style="padding-bottom: 15px;">Empresas</h3>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                <div class="form-group">
                    <label>Nome da Empresa:</label>
                    <input type="text" name="nomeEmp" class="form-control" placeholder="Inserir Nome da Empresa">
                </div>
                <div class="form-group">
                    <label >Morada:</label>
                    <input type="text" name="moradaEmp" class="form-control" placeholder="Inserir Morada">
                </div>
                <div class="form-group">
                    <label>NIPC:</label>
                    <input type="text" name="nipc" class="form-control" placeholder="Inserir NIPC">
                </div>
                <div class="form-group">
                    <label>Contacto Telefónico:</label>
                    <input type="text" name="contactoEmp" class="form-control" placeholder="Inserir Contacto Telefónico">
                </div>
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="email" name="emailEmp" class="form-control" placeholder="Inserir E-mail">
                </div>
                <div class="form-group">
                    <label>Cursos a frequentar:</label>
                    <select name="cursoEmp" class="form-control">
                        <option>Gestão de Tempo</option>
                        <option>Gestão de Conflictos</option>
                        <option>Técnicas de Vendas</option>
                        <option>Inglês I, II, III</option>
                        <option>Gestão e Motivação</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Número de Formandos:</label>
                    <input type="text" name="numFor" class="form-control" placeholder="Inserir Número de Formandos">
                </div>
                <div class="form-group">
                    <label>Data de Início:</label>
                    <input type="date" class="form-control" placeholder="Inserir Data de Início" name="dataEmp">
                </div>
                <div class="form-group">
                    <label>Tipo de Protocolo:</label>
                    <input type="text" class="form-control" placeholder="Inserir Tipo de Protocolo" name="tipo">
                </div>
                <div class="form-group">
                    <label>Nome dos Formandos:</label>
                    <textarea class="form-control" rows="5" style="resize: none;" name="nomeFor" placeholder="Inserir Nome dos Formandos"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submitEmpIns">Submeter</button>
            </form>
        </div>
    </div>
    </div>

    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>