<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <title>Law - HomePage</title>
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

    <!--LOGO-->
    <div class="container-fluid" id="logoBackground">
        <img class="img-responsive" src="../public/resizedPics/logo.png" alt="logo">
    </div>

    <!--INTRO-->
    <div class="container">
        <h1>A nossa Missão</h1>
        <div class="row">
            <div class="col-sm-6" id="imgPaddingTp">
                <p>
                    Vocacionados para todas as áreas de Negócio, temos como principal objectivo junto do Mercado Empresarial quer Nacional e Internacional,fazer crescer
                    o sector Económico das Empresas nossas Clientes e Parceiros. Com a criação de postos de trabalho, garantindo uma maior produtividade. Apostando na
                    formação, qualificando os candidatos para o Desempenho das suas funções, recrutando e seleccionando os melhores profissionais para as Empresas nossas
                    Clientes apostando na formação e qualificação dos nossos Colaboradores damos a oportunidade de poder contribuir para o Crescimento Económico, reduzindo
                    desta forma o desemprego, disponibilizando a oportunidade de igualdade no Mercado de Trabalho.
                </p>
            </div>
            <div class="col-sm-6">
                <img src="../public/resizedPics/job.png" class="img-responsive">
            </div>
        </div>
    </div>

    <!--MOVING BANNER-->
    <div  class="container" id="container">
        <h1>Oferta Formativa</h1>
        <div class="photobanner">
            <img class="first" src="../public/resizedPics/banner/training.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/altMed.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/english.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/old.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/sales.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/time.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/training.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/altMed.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/english.jpg" alt="Banner"/>
            <img src="../public/resizedPics/banner/old.jpg" alt="Banner"/>
        </div>
    </div>

    <!--INFO-->
    <div class="container" id="sectionPadding">
        <div class="row">
            <div class="col-sm-6">
                <div class="container-fluid">
                    <img src="../public/resizedPics/business.jpg" class="img-responsive">
                </div>
                <div class="container-fluid">
                    <img src="../public/resizedPics/hands.jpg" class="img-responsive" id="imgPadding">
                </div>
                <div class="container-fluid">
                    <h1>Parcerias</h1>
                    <h3>Apoio do Centro de Emprego e Formação Profissional</h3><br>
                    <p>
                        Neste momento atuamos com a Parceria do IEFP, para a Empregabilidade de cidadãos desempregados e jovens à procura de Emprego,
                        apoiando na redução de Desemprego em Portugal. Também com o apoio do IEFP na certificação de cursos profissionais e outros
                    </p>
                    <img src="../public/resizedPics/iefp.jpg" class="img-responsive" id="imgPaddingBt">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="container-fluid" id="info">
                    <div class="container-fluid	">
                        <h1>Os nossos valores</h1>
                        <ul>
                            <li>Integridade</li>
                            <li>Transparência</li>
                            <li>Eficiência</li>
                            <li>Rigor</li>
                            <li>Responsabilidade - Social</li>
                            <li>Valor Humano</li>
                        </ul>
                    </div>
                    <div class="container-fluid">
                        <h1>Como actuamos no Mercado</h1>
                        <p>
                            Recentemente no mercado, somos uma Empresa Jovem e Inovadora, estamos presentes a nível Nacional e Internacional,
                            direccionados para o Recrutamento e Selecção de profissionais . Vocacionados para todas as áreas de Negócio, temos
                            como principal objectivo junto do Mercado, fazer crescer o sector Económico das Empresas nossas Clientes e Parceiros.
                            Recorrendo à Empregabilidade, recrutando e seleccionando os melhores profissionais para as Empresas nossas Clientes.
                        </p>
                    </div>
                    <div class="container-fluid">
                        <h1>Solidariedade Social</h1>
                        <p>
                            Junto da AMI(Assistência Médica Internacional, Organização Não Governamental) Contribui em conjunto com os seus colaboradores,
                            todos os anos dia 10 de Outubro com bens essenciais aos mais carenciados.
                        </p>
                        <p>Com o “Projecto viver Mais”, Reintegramos cidadãos no mercado de trabalho, reduzindo desta forma a precariedade, pobreza e desemprego</p>
                        <h3>“Ajuda de Berço”</h3>
                        <p>Actuamos apadrinhando crianças sem lar e em risco, contribuímos com bens essenciais, ajudando para um crescimento com melhores condições educacionais e sustentabilidade</p>
                        <p>Com vista também num futuro próximo a parceria com Unidades de Saúde, a contribuir para uma prevenção e acompanhamento da saúde das crianças, desta Instituição e de outras.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>