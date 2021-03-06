<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Registo</title>
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
        <h1>Novo Utilizador</h1>
    </div>
    <?php

        require_once ('../php/User.php');

        $user = new User();

        if (isset($_POST["submit"])){

            $user->setUser($_POST["uid"], $_POST["pwd"], $_POST["nipc"], $_POST["email"], $_POST["contacto"], $_POST["area"], $_POST["responsavel"], $_POST["num"], $_POST["tipo"], $_POST["req"], $_POST["funcoes"], $_POST["outros"]);
            $user->sendMail();
        }


    ?>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']?>" style="padding-bottom: 80px;">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" name="uid" class="form-control" placeholder="Inserir Username">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" name="pwd" class="form-control" placeholder="Inserir Password">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>NIPC:</label>
            <input type="text" name="nipc" class="form-control" placeholder="Inserir NIPC">
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label>E-mail:</label>
                    <input type="email" name="email" class="form-control" placeholder="Inserir E-mail">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Contacto Telefónico:</label>
                    <input type="text" name="contacto" class="form-control" placeholder="Inserir Contacto Telefónico">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Área de Negócios:</label>
                    <select class="form-control" name="area">
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
                        <option>(Outros)</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nome do Responsável de Gestão de Recursos:</label>
                    <input type="text" class="form-control" placeholder="Nome do Responsável de Gestão de Recursos" name="responsavel">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Nº de Pessoas a contratar:</label>
                    <input type="text" name="num" class="form-control" placeholder="Nº de Pessoas a contratar">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Tipo de contracto com a Empresa prestadora de serviços:</label>
                    <input type="text" class="form-control" placeholder="Inserir Tipo de contracto" name="tipo">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Requisitos Mínimos:</label>
                    <textarea class="form-control" rows="5" style="resize: none;" name="req" placeholder="Inserir Requisitos Mínimos"></textarea>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label>Funções:</label>
                    <textarea class="form-control" rows="5" style="resize: none;" name="funcoes" placeholder="Inserir Funções"></textarea>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Outras Informações:</label>
            <textarea class="form-control" rows="5" style="resize: none;" name="outros" placeholder="Inserir Outras Informações"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submeter</button>
    </form>
</div>




</body>
</html>