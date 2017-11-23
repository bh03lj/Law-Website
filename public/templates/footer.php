<div class="container-fluid" id="contatcs">
    <div class="container" id="contactos">
        <h1>Contacte-nos</h1><br>
        <div class="row">
            <div class="col-sm-4">
                <h4><i class="fa fa-phone" aria-hidden="true"></i> 215896472 / 967852516</h4>
                <h4><i class="fa fa-envelope" aria-hidden="true"></i> law@gmail.com</h4>
            </div>
            <div class="col-sm-8" id="innerContacts">
                <div class="panel-group" id="accordion">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Pedido de Contacto Particulares</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <form method="POST" action="#contactos">
                                            <div class="form-group">
                                                <label>Nome Completo:</label>
                                                <input type="text" class="form-control" name="nome" placeholder="Inserir Nome Completo">
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail:</label>
                                                <input type="email" class="form-control" name="email" placeholder="Inserir E-mail">
                                            </div>
                                            <div class="form-group">
                                                <label>Contacto Telefónico:</label>
                                                <input type="text" class="form-control" name="contacto" placeholder="Inserir Contacto Telefónico">
                                            </div>
                                            <div class="form-group">
                                                <label>Assunto:</label>
                                                <textarea class="form-control" rows="5" name="assunto" placeholder="Inserir Assunto"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="submit" id="submit">Submeter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Pedido de Contacto Empresas</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <form method="POST" action="#contactos">
                                            <div class="form-group">
                                                <label>Nome da Empresa ou Sede Social:</label>
                                                <input type="text" class="form-control" name="nomeEmp" placeholder="Inserir Nome da Empresa ou Sede Social">
                                            </div>
                                            <div class="form-group">
                                                <label>NIPC:</label>
                                                <input type="text" class="form-control" name="nipc" placeholder="Inserir NIPC">
                                            </div>
                                            <div class="form-group">
                                                <label>E-mail:</label>
                                                <input type="email" class="form-control" name="emailEmp" placeholder="Inserir E-mail">
                                            </div>
                                            <div class="form-group">
                                                <label>Gestor:</label>
                                                <input type="text" class="form-control" name="gestor" placeholder="Inserir Nome do Gestor">
                                            </div>
                                            <div class="form-group">
                                                <label>Contacto Telefónico:</label>
                                                <input type="text" class="form-control" name="contactoEmp" placeholder="Inserir Contacto Telefónico">
                                            </div>
                                            <div class="form-group">
                                                <label>Assunto:</label>
                                                <textarea class="form-control" rows="5" name="assuntoEmp" placeholder="Inserir Assunto"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary" name="submitEmp">Submeter</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php

            require_once('../php/PedidoContacto.php');

            if (isset($_POST["submit"])){

                $pedido = new PedidoContacto();
                $pedido->setPedido(($_POST["nome"]), $_POST["email"], $_POST["contacto"], $_POST["assunto"], "N/A", "N/A");
                $pedido->setData();

            }
            elseif(isset($_POST["submitEmp"])){

                $pedidoEmp = new PedidoContacto();
                $pedidoEmp->setPedido($_POST["nomeEmp"], $_POST["emailEmp"], $_POST["contactoEmp"], $_POST["assuntoEmp"], $_POST["gestor"], $_POST["nipc"]);
                $pedidoEmp->setData();

            }

        ?>
    </div>
</div>
<div class="container-fluid" id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6" id="footerEx">
                <ul>
                    <li><h3><u>Explore</u></h3></li>
                    <li><a href="about.php">A Empresa</a></li>
                    <li><a href="ofertasEmprego.php">Ofertas Emprego</a></li>
                    <li><a href="ofertasFormativas.php">Ofertas Formativas</a></li>
                    <li><a href="propostas.php">Proposta Online Empresas</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-sm-offset-4">
                <p>&#9400; 2017 Developed by Ricardo Silva @ richardaccounts@hotmail.com</p>
            </div>
        </div>
    </div>
</div>

