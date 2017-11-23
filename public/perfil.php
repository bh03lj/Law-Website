<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <title>Law - O meu perfil</title>
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
            <h1>Perfil</h1>
        </div>
        <?php

            require_once('../php/User.php');

            if (isset($_POST['alt'])){

                $proposta = new User();
                $proposta->alt($_SESSION['username'], $_POST["email"], $_POST["contacto"], $_POST["responsavel"], $_POST["num_pessoas"], $_POST["tipo"], $_POST["req"], $_POST["funcoes"]);

            }
            elseif (isset($_POST['altPwd'])){

                $user = new User();
                $user->altPwd($_SESSION['username'], $_POST['pwd'], $_POST['rePwd'] );

            }

        ?>
        <div class="container" id="sectionPadding">
            <div class='well' style='padding: 15px;padding-bottom: 80px;'>
                <?php

                    require_once('../php/User.php');

                    $user = new User();
                    $user->getUser($_SESSION['username']);

                ?>
                <form method='POST' action='<?php $_SERVER['PHP_SELF']?>'>
                    <button type='button' class='btn btn-primary' data-toggle='collapse' data-target='#alterar'>Alterar</button>
                    <button type='button' class='btn btn-primary' data-toggle='collapse' data-target='#alterarpwd'>Alterar Password</button>
                    <div id='alterarpwd' class='collapse' style='padding-top: 25px;'>
                        <form method='POST' action='<?php $_SERVER['PHP_SELF']?>'>
                            <div class='form-group'>
                                <label>Password:</label>
                                <input type='Password' name='pwd' class='form-control' placeholder='Inserir Password'>
                            </div>
                            <div class='form-group'>
                                <label>Repetir Password:</label>
                                <input type='Password' name='rePwd' class='form-control' placeholder='Inserir Password novamente'>
                            </div>
                            <button type='button' class='btn btn-primary'data-toggle='modal' data-target='#myModal2'>Submeter</button>
                            <div class='modal fade' id='myModal2' role='dialog' style='margin-top: 150px;'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                            <h4 class='modal-title'>Atenção!</h4>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Tem a certeza que pretende alterar a password.</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='submit' name='altPwd' class='btn btn-default'>Sim</button>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Não</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id='alterar' class='collapse' style='padding-top: 25px;'>
                        <form method='POST' action='<?php $_SERVER['PHP_SELF']?>'>
                            <?php

                            $user->fill($_SESSION['username']);

                            ?>
                            <button type='button' class='btn btn-primary'data-toggle='modal' data-target='#myModal'>Submeter</button>
                            <div class='modal fade' id='myModal' role='dialog' style='margin-top: 150px;'>
                                <div class='modal-dialog'>
                                    <div class='modal-content'>
                                        <div class='modal-header'>
                                            <button type='button' class='close' data-dismiss='modal'>&times;</button>
                                            <h4 class='modal-title'>Atenção!</h4>
                                        </div>
                                        <div class='modal-body'>
                                            <p>Tem a certeza que pretende alterar os dados indicados.</p>
                                        </div>
                                        <div class='modal-footer'>
                                            <button type='submit' name='alt' class='btn btn-default'>Sim</button>
                                            <button type='button' class='btn btn-default' data-dismiss='modal'>Não</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>