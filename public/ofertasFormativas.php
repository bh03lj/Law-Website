<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        session_start();
    ?>
    <title>Law - Ofertas Formativas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <script src="https://use.fontawesome.com/8d80846230.js"></script>
    <script type="text/javascript" src="showInfo.js"></script>
    <script>
        $(document).ready(function(){
            $(".img").on("click", function(e){
                $(this).toggleClass("expanded");
                $(this).next().slideToggle();
            });
        });
    </script>
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
    <div class="container" id="ofertasPadding">
        <div class="page-header">
            <h1>Ofertas de Formação(Particular)</h1>
        </div>
        <h2>Tire a formação que sempre sonhou. <a href="inscricao.php">Inscreva-se já</a></h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Formação</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/training.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>A Formação Profissional tem por objectivo a aquisição de conhecimentos, capacidades, atitudes e comportamentos necessários ao bom desempenho de determinada profissão ou tarefas de uma função, sendo assim voltada para a aquisição de competências profissionais.</p></div>
            </div>
            <div class="col-sm-4">
                <h3>Corte e Modelagem</h3>
                <div class="img">
                    <img class="img-responsive"  src="../public/resizedPics/cut.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>São aulas onde pode aprender corte e costura, além de modelagem, ao confeccionar peças de roupa, para senhora, homem ou criança, em qualquer tamanho. Temos aulas livres, cursos e workshops de corte, costura e modelagem. O material é da responsabilidade da aluna (linhas, tecidos e kit de costura)</p></div>
            </div>
            <div class="col-sm-4">
                <h3>Geriatria</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/old.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>Medicina geriátrica ou geriatria é o ramo da medicina que foca o estudo, a prevenção e o tratamento de doenças e da incapacidade em idades avançadas. O termo deve ser distinto de gerontologia, que é o estudo do envelhecimento em si.</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Estética</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/cosmetic.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>O curso de Estética e Cosmética tem como objetivo preparar profissionais para o mercado de beleza e bem-estar. Entre as habilidades ensinadas nas aulas estão técnicas e tratamentos, manipulação de cosméticos e aparelhos, cuidados com cabelo e pele, depilação, massagens, entre outros.</p></div>
            </div>
            <div class="col-sm-4">
                <h3>Medicina Alternativa</h3>
                <div class="img">
                    <img class="img-responsive"  src="../public/resizedPics/altMed.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>A medicina alternativa pode ser definida por um conjunto de práticas e uso de substâncias que não são, hoje, considerados como válidos pela  medicina convencional.</p></div>
            </div>
            <div class="col-sm-4">
                <h3>Shiatsu</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/shiatsu.png">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>O Shiatsu (lê se xi-á-tissu) também é conhecido e chamado de “massagem oriental”, porém, não podemos levar isto ao pé da letra, pois o Shiatsu é muito mais do que uma massagem.</p></div>
            </div>
        </div>
    </div>
    <div class="container" id="ofertasPadding">
        <div class="row">
            <div class="col-sm-4">
                <h3>Acupuntura</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/acupuncture.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>A acupuntura é uma terapia milenar originária da China, que consiste na aplicação de agulhas em pontos específicos do corpo para tratar doenças e para promover saúde.</p></div>
            </div>
            <div class="col-sm-4">
                <h3>Inglês I, II, III</h3>
                <div class="img">
                    <img class="img-responsive"  src="../public/resizedPics/english.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>Comece a falar e escrever de maneira natural, divertida e espontânea participando ativamente em situações atuais da vida real: primeiro você escute e compreende, depois começa a falar e escrever.</p></div>
            </div>
            <div class="col-sm-4">
                <h3>Contabilidade</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/accounting.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>Este curso faz uma abordagem prática da aplicação da contabilidade em contexto empresarial, contemplando as últimas alterações legislativas e fornecendo instrumentos para uma correta análise e preparação dos principais mapas financeiros de uma empresa.</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <h1>Ofertas de Formação(Empresa)</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3>Gestão de Tempo</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/time.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>O Curso Gestão do Tempo busca refletir sobre a importância de administrar o tempo na atualidade, apresentando algumas dicas e estratégias que lhe ajudarão a conciliar as inúmeras responsabilidades e desafios que são impostos ao seu cotidiano, tanto no ambiente de trabalho como em casa.</p></div>
            </div>
            <div class="col-sm-4">
                <h3>Gestão de Conflitos</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/conflict.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>O objetivo deste curso é fazer com que os participantes adquiram ou melhorem os seus conhecimentos acerca do processo de negociação, compreendendo a importância de uma gestão de conflitos adaptativa nos relacionamentos profissionais.</p></div>
            </div>
            <div class="col-sm-4">
                <h3>Técnicas de Vendas</h3>
                <div class="img">
                    <img class="img-responsive" src="../public/resizedPics/sales.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>O Curso de Técnicas de Vendas tem como público alvo pessoas que queiram trabalhar, ou que já trabalhem na área comercial, pessoas que tenham gosto pelo contacto com o publico, atendimento a clientes e apetência para vendas.</p></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" id="sectionPadding">
            <div class="col-sm-4">
                <h3>Inglês I, II, III</h3>
                <div class="img">
                    <img class="img-responsive"  src="../public/resizedPics/english.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>Comece a falar e escrever de maneira natural, divertida e espontânea participando ativamente em situações atuais da vida real: primeiro você escute e compreende, depois começa a falar e escrever.</p></div>
            </div>
            <div class="col-sm-4" style="padding-bottom: 80px;">
                <h3>Gestão e Motivação</h3>
                <div class="img">
                    <img class="img-responsive"  src="../public/resizedPics/motivation.jpg">
                    <h3 class="info">Clique para mais informação</h3>
                </div>
                <div class="text"><p>No final deste curso o formando estará capacitado para aplicar o coaching como um processo indispensável à superação pessoal e profissional, levando-o a obter o máximo de rendimento no seu trabalho e maior capacidade de Liderança junto de equipas de trabalho.</p></div>
            </div>
        </div>
    </div>

    <!--FOOTER-->
    <?php require_once('templates/footer.php'); ?>

</body>
</html>