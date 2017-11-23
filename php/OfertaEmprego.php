<?php

require_once("DB.php");

class OfertaEmprego{

    private $oferta;
    private $data;
    private $localidade;
    private $categoria;
    private $empresa;
    private $anuncio;
    private $emailEmpresa;

    public function setOferta($Oferta, $Data, $Localidade, $Categoria, $Empresa, $Anuncio, $EmailEmpresa){

        $this->oferta = trim(filter_var($Oferta, FILTER_SANITIZE_STRING));
        $this->data = $Data;
        $this->localidade = trim(filter_var($Localidade, FILTER_SANITIZE_STRING));
        $this->categoria = $Categoria;
        $this->empresa = trim(filter_var($Empresa, FILTER_SANITIZE_STRING));
        $this->anuncio = trim(filter_var($Anuncio, FILTER_SANITIZE_STRING));
        $this->emailEmpresa = trim(filter_var($EmailEmpresa, FILTER_SANITIZE_EMAIL));

        $DB = new DB();
        $conn = $DB->connect();

        if (empty($Oferta) || empty($Empresa) || empty($EmailEmpresa)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor preencha todos os campos indicados.
				  </div>";

        }
        else {

            $sql = "INSERT INTO ofertas_emprego(oferta, data, localidade, categoria, empresa, anuncio, email_empresa) VALUES(:oferta, :data, :localidade, :categoria, :empresa, :anuncio, :email_empresa)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":oferta" => $this->oferta,
                ":data" => $this->data,
                ":localidade" => $this->localidade,
                ":categoria" => $this->categoria,
                ":empresa" => $this->empresa,
                ":anuncio" => $this->anuncio,
                ":email_empresa" => $this->emailEmpresa
            ));

            echo "<div class='alert alert-success'>
                    <strong>A oferta foi adicionada com sucesso.</strong>
                </div>";

        }
    }

    public function printData($result, $page){

        while ($row = $result->fetch()) {

            echo " <ul>
                        <li class='ofertaPadding'>
                            <a href='".$page."?OfertaId=" . $row["id"] . "'>" . $row["oferta"] . "</a><br><br>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <p><strong>Data:</strong> " . $row["data"] . "</p>
                                </div>
                                 <div class='col-sm-6'>
                                    <p><strong>Localidade:</strong> " . $row["localidade"] . "</p>
                                </div>
                             </div>
                            <div class='row'>
                                <div class='col-sm-6'>
                                    <p><strong>Categoria:</strong> " . $row["categoria"] . "</p>
                                </div>
                                <div class='col-sm-6'>
                                    <p><strong>Empresa:</strong> " . $row["empresa"] . "</p>
                                </div>
                             </div>
                         </li>
                     </ul>";

        }
    }

    public function getAll($page){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM ofertas_emprego";
        $result = $conn->query($query);

        $this->printData($result,$page);

    }

    public function getInd($id){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM ofertas_emprego WHERE id = '$id'";
        $result = $conn->query($query);

        while ($row = $result->fetch()){

            echo " <div class ='well' id='wellPad'>		
				        <h1><strong>". $row["oferta"]."</strong></h1>
						<div class='row'>
					        <div class='col-sm-6'>
							    <h3><strong>Data:</strong> ".$row["data"]."</h3>
							</div>
						    <div class='col-sm-6'>
								<h3><strong>Localidade:</strong> ".$row["localidade"]."</h3>
							</div>
						</div>
						<div class='row'>
						    <div class='col-sm-6'>
							    <h3><strong>Categoria:</strong> ".$row["categoria"]."</h3>
							</div>
							 <div class='col-sm-6'>
						        <h3><strong>Empresa:</strong> ".$row["empresa"]."</h3>
							</div>
						</div>
						<h3><strong>Anúncio:</strong></h3>	
						<p style='padding-bottom: 30px;'>".$row["anuncio"]."</p>
						<a href='candidaturas.php?OfertaId=".$id."' class='btn btn-primary'>Candidatar</a>
					</div>";

        }
    }

    public function delOferta($id){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM ofertas_emprego WHERE id = '$id'";
        $result = $conn->query($query);

        while ($row = $result->fetch()){

            echo " <div class ='well' id='wellPad'>		
				        <h1><strong>". $row["oferta"]."</strong></h1>
						<div class='row'>
					        <div class='col-sm-6'>
							    <h3><strong>Data:</strong> ".$row["data"]."</h3>
							</div>
						    <div class='col-sm-6'>
								<h3><strong>Localidade:</strong> ".$row["localidade"]."</h3>
							</div>
						</div>
						<div class='row'>
						    <div class='col-sm-6'>
							    <h3><strong>Categoria:</strong> ".$row["categoria"]."</h3>
							</div>
							 <div class='col-sm-6'>
						        <h3><strong>Empresa:</strong> ".$row["empresa"]."</h3>
							</div>
						</div>
						<h3><strong>Anúncio:</strong></h3>	
						<p style='padding-bottom: 30px;'>".$row["anuncio"]."</p>
						<form method='POST' action='".$_SERVER['PHP_SELF']."?OfertaId=".$id."'>
							<button type='button' class='btn btn-primary'data-toggle='modal' data-target='#myModal'style='margin-top: 50px;'>Eliminar</button>
							<div class='modal fade' id='myModal' role='dialog' style='margin-top: 150px;'>
				                <div class='modal-dialog'>
				                  <div class='modal-content'>
				                    <div class='modal-header'>
				                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
				                        <h4 class='modal-title'>Atenção!</h4>
				                    </div>
				                    <div class='modal-body'>
				                        <p>Tem a certeza que pretende eliminar esta oferta</p>
				                    </div>
				                    <div class='modal-footer'>
				                        <button type='submit' name='submit' class='btn btn-default'>Sim</button>
				                        <button type='button' class='btn btn-default' data-dismiss='modal'>Não</button>
				                    </div>
	                              </div>
	                            </div>
                            </div> 	
					    </form>
					</div>";

        }

        if (isset($_POST["submit"])){

            $queryDel = "DELETE FROM ofertas_emprego WHERE id = $id";
            $conn->query($queryDel);

            echo "<div class='alert alert-success'>
                     <strong>A oferta foi com sucesso</strong>
                  </div>";


        }
    }


    public function getData($loc, $cat, $page){

        $DB = new DB();
        $conn = $DB->connect();

        if($loc == "(Todas as Localidades)" && $cat == "(Todas as Categorias)") {

            $query = "SELECT * FROM ofertas_emprego";
            $result = $conn->query($query);

            $this->printData($result, $page);

        }
        elseif(isset($loc) && $cat == "(Todas as Categorias)") {

            $query = "SELECT * FROM ofertas_emprego WHERE localidade = '$loc'";
            $result = $conn->query($query);

            if($result->rowCount() > 0) {

                $this->printData($result, $page);

            }
            else{

                echo "<div class='alert alert-info'>Não existem ofertas dentro dos parâmetros indicados.</div>";

            }
        }
        elseif (isset($cat) && $loc == "(Todas as Localidades)") {

            $query = "SELECT * FROM ofertas_emprego WHERE categoria = '$cat'";
            $result = $conn->query($query);

            if($result->rowCount() > 0) {

                $this->printData($result, $page);

            }
            else{

                echo "<div class='alert alert-info'>Não existem ofertas dentro dos parâmetros indicados.</div>";

            }
        }
        elseif (isset($cat) && isset($loc)) {

            $query = "SELECT * FROM ofertas_emprego WHERE categoria = '$cat' AND localidade = '$loc'";
            $result = $conn->query($query);

            if($result->rowCount() > 0) {

                $this->printData($result, $page);

            }
            else{

                echo "<div class='alert alert-info'>Não existem ofertas dentro dos parâmetros indicados.</div>";

            }
        }
    }

    public function sendMail($id, $Nome, $Contacto, $Email, $Num, $Data, $Hab, $Empresa, $Empresa1, $Empresa2, $Empresa3, $Funcao, $Funcao1, $Funcao2, $Funcao3, $DataIni, $DataFim, $DataIni1, $DataFim1, $DataIni2, $DataFim2, $DataIni3, $DataFim3, $Obj, $For, $For2, $Hobbies, $Law, $Vir, $Razoes, $TargetFile, $Path, $FileType, $FileSize, $DataAct){

        $DB = new DB();
        $conn = $DB->connect();

        if (!file_exists($Path)) {

            if (empty($Nome) || empty($Contacto) || empty($Email) || empty($Num) || empty($Data) || empty($Hab) || empty($Obj) || empty($For) || empty($For2) || empty($Hobbies) || empty($Law) || empty($Vir) || empty($Razoes)){

                echo "<div class='alert alert-warning'>
			            <strong>Atenção!</strong> Por favor preencha todos os campos indicados.
				      </div>";

            }
            elseif (!filter_var($Contacto, FILTER_VALIDATE_INT) || strlen((string)$Contacto) != 9) {

                echo "<div class='alert alert-warning'>
			            <strong>Atenção!</strong> Por favor introduza um contacto válido.
				      </div>";

            }
            elseif (!filter_var($Num, FILTER_VALIDATE_INT)) {

                echo "<div class='alert alert-warning'>
			            <strong>Atenção!</strong> Por favor introduza um número de filhos válido.
				      </div>";

            }
            elseif (filter_var($Nome, FILTER_VALIDATE_INT)){

                echo "<div class='alert alert-warning'>
		                <strong>Atenção!</strong> Por favor introduza um nome válido.
		              </div>";

            }
            elseif (strtotime($Data) < strtotime($DataAct)){

                echo "<div class='alert alert-warning'>
				         <strong>Atenção!</strong> Por favor introduza uma data válida.
				      </div>";

            }
            else {

                $query = "SELECT * FROM ofertas_emprego WHERE id = '$id'";
                $result = $conn->query($query);

                while ($row = $result->fetch()) {

                    $emailTo = $row['email_empresa'];
                    $oferta = $row['oferta'];

                }

                require_once('../PHPMailer-master/PHPMailerAutoload.php');

                $mail = new PHPMailer();

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ));

                    //$mail->SMTPDebug = 1;

                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = 'beriadanpt@gmail.com';
                $mail->Password = 'Jakanddaxter3';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('beriadanpt@gmail.com');
                $mail->addAddress($emailTo);
                $mail->addReplyTo('beriadanpt@gmail.com');
                $mail->addCC($Email);
                $mail->addBCC('bcc@example.com');

                $mail->addAttachment($Path, $TargetFile);

                $mail->Subject = $oferta;
                $mail->Body = "Caros Srs.,<br><br>Segue abaixo uma candidatura para a posi&#231;&#227;o indicada em assunto.<br><br><b>Nome:</b> " . $Nome . "<br><b>Contacto Telef&#243;nico:</b> " . $Contacto . "<br><b>E-mail:</b> " . $Email . "<br><b>N&#250;mero de filhos:</b> " . $Num . "<br><b>Disponibilidade a partir de que data:</b> " . $Data . "<br><b>Habilita&#231;&#245;es liter&#225;rias:</b> " . $Hab . "<br><br><b>Experi&#234;ncia Professional:</b><br><br><b>Empresa:</b> " . $Empresa . "<br><b>Fun&#231;&#227;o:</b> " . $Funcao . "<br><b>Data:</b> " . $DataIni . " a " . $DataFim . "<br><br><b>Empresa:</b> " . $Empresa1 . "<br><b>Fun&#231;&#227;o:</b> " . $Funcao1 . "<br><b>Data:</b> " . $DataIni1 . " a " . $DataFim1 . "<br><br><b>Empresa:</b> " . $Empresa2 . "<br><b>Fun&#231;&#227;o:</b> " . $Funcao2 . "<br><b>Data:</b> " . $DataIni2 . " a " . $DataFim2 . "<br><br><b>Empresa:</b> " . $Empresa3 . "<br><b>Fun&#231;&#227;o:</b> " . $Funcao3 . "<br><b>Data:</b> " . $DataIni3 . " a " . $DataFim3 . "<br><br><b>Objectivos profissionais para daqui a 5 anos:</b> " . $Obj . "<br><b>Forma&#231;&#227;o complementar profissional:</b> " . $For . "<br><b>Forma&#231;&#227;o complementar pessoal:</b> " . $For2 . "<br><b>Hobbies ou gostos pessoais:</b> " . $Hobbies . "<br>
                                    <b>Explique o que ganharia a LAW se a seleccionasse:</b> " . $Law . "<br><b>Indique as virtudes que melhor o caracterizam:</b> " . $Vir . "<br><b>Indique as raz&#245;es principais que o levam a candidatura:</b> " . $Razoes . "<br><br><b>Nota:</b> Este e-mail foi gerado autom&#225;ticamente pelo servidor.<br><br>Atenciosamente,<br><br><b>Law Servi&#231;o de Recursos Humanos</b><br><b>Tel:</b> 215896472<br><b>E-mail:</b> law@gmail.com<br><br>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if (!$mail->send()) {

                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;

                } else {

                    echo "<div class='alert alert-success'>
                            <strong>A sua candidatura foi enviada com sucesso!</strong>
                          </div>";

                }
            }
        }
        else{

            if ($FileType != "pdf") {

                echo "<div class='alert alert-warning'>
				        <strong>Atenção!</strong> O ficheiro tem de ser em formato pdf.
				      </div>";

            }
            elseif ($FileSize > 1048576) {

                echo "<div class='alert alert-warning'>
					     <strong>Atenção!</strong> O ficheiro tem que ter menos de 1MB.
					  </div>";

            }
            else {

                $query = "SELECT * FROM ofertas_emprego WHERE id = '$id'";
                $result = $conn->query($query);

                while ($row = $result->fetch()) {

                    $emailTo = $row['email_empresa'];
                    $oferta = $row['oferta'];

                }

                require_once('../PHPMailer-master/PHPMailerAutoload.php');

                $mail = new PHPMailer();

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ));

                //$mail->SMTPDebug = 1;

                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = 'beriadanpt@gmail.com';
                $mail->Password = 'Jakanddaxter3';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                $mail->setFrom('beriadanpt@gmail.com');
                $mail->addAddress($emailTo);
                $mail->addReplyTo('beriadanpt@gmail.com');
                $mail->addCC($Email);
                $mail->addBCC('bcc@example.com');

                $mail->addAttachment($Path, $TargetFile);

                $mail->Subject = $oferta;
                $mail->Body    = "Caros Srs.,<br><br>Segue anexado o CV para a posi&#231;&#227;o indicada em assunto.<br><br><b>Nota:</b> Este e-mail foi gerado autom&#225;ticamente pelo servidor.<br><br>Atenciosamente,<br><br><b>Law Servi&#231;o de Recursos Humanos</b><br><b>Tel:</b> 215896472<br><b>E-mail:</b> law@gmail.com<br><br>";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                if(!$mail->send()) {

                    echo 'Message could not be sent.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;

                } else {

                    echo "<div class='alert alert-success'>
	  				        <strong>A sua candidatura foi enviada com sucesso!</strong>
					      </div>";

                }
            }
        }
    }

}