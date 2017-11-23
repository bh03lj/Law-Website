<?php

require_once("DB.php");

class User{

    private $uid;
    private $pwd;
    private $nipc;
    private $email;
    private $contacto;
    private $area;
    private $responsavel;
    private $numPessoas;
    private $contrato;
    private $reqMin;
    private $funcoes;
    private $outras;

    public function setUser($Uid, $Pwd, $Nipc, $Email, $Contacto, $Area, $Responsavel, $NumPessoas, $Contrato, $ReqMin, $Funcoes, $Outras)
    {
        $this->uid = $Uid;
        $this->pwd = $Pwd;
        $this->nipc = trim(filter_var($Nipc, FILTER_SANITIZE_STRING));
        $this->email = trim(filter_var($Email, FILTER_SANITIZE_EMAIL));
        $this->contacto = trim(filter_var($Contacto, FILTER_SANITIZE_NUMBER_INT));
        $this->area = trim(filter_var($Area, FILTER_SANITIZE_STRING));
        $this->responsavel = trim(filter_var($Responsavel, FILTER_SANITIZE_STRING));
        $this->numPessoas = trim(filter_var($NumPessoas, FILTER_SANITIZE_STRING));
        $this->contrato = trim(filter_var($Contrato, FILTER_SANITIZE_STRING));
        $this->reqMin = trim(filter_var($ReqMin, FILTER_SANITIZE_STRING));
        $this->funcoes = trim(filter_var($Funcoes, FILTER_SANITIZE_STRING));
        $this->outras = trim(filter_var($Outras, FILTER_SANITIZE_STRING));

        $DB = new DB();
        $conn = $DB->connect();

        if (empty($this->uid) || empty($this->pwd) || empty($this->nipc) || empty($this->email) || empty($this->contacto) || empty($this->area) || empty($this->responsavel) || empty($this->numPessoas) || empty($this->contrato) || empty($this->reqMin) || empty($this->funcoes)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor preencha todos os campos indicados.
				  </div>";

        } elseif (!filter_var($this->contacto, FILTER_VALIDATE_INT) || strlen((string)$this->contacto) != 9) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza um contacto válido.
				  </div>";

        } elseif (filter_var($this->responsavel, FILTER_VALIDATE_INT)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza um nome de gestor válido.
				  </div>";

        } elseif ($this->nipc != "N/A" && strlen((int)$this->nipc) != 9) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza um NIPC válido.
				  </div>";

        }elseif (!filter_var($this->numPessoas, FILTER_VALIDATE_INT)) {

            echo "<div class='alert alert-warning'>
                    <strong>Atenção!</strong> Por favor introduza um número de pessoas válido.
                  </div>";

        }
        elseif (strlen($this->pwd) < 8 || !preg_match('/[0-9]+/',$this->pwd)) {

            echo "<div class='alert alert-warning'>
			        <strong>Atenção!</strong> Por favor introduza um password com pelo menos 8 digitos e um numero.
			     </div>";
        }
        else {

            $hash = password_hash($this->pwd, CRYPT_BLOWFISH);

            $sql = "INSERT INTO users(uid, pwd, nipc, email, contacto, area, responsavel, num_pessoas, contrato, req_min, funcoes, outras) VALUES(:uid, :pwd, :nipc, :email, :contacto, :area, :responsavel, :num_pessoas, :contrato, :req_min, :funcoes, :outras)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":uid" => $this->uid,
                ":pwd" => $hash,
                ":nipc" => $this->nipc,
                ":email" => $this->email,
                ":contacto" => $this->contacto,
                ":area" => $this->area,
                ":responsavel" => $this->responsavel,
                ":num_pessoas" => $this->numPessoas,
                ":contrato" => $this->contrato,
                ":req_min" => $this->reqMin,
                ":funcoes" => $this->funcoes,
                ":outras" => $this->outras,
            ));

            echo "<div class='alert alert-success'>
  				    <strong>O utilizador foi criado com sucesso!</strong>
				  </div>";

        }
    }

    public function login($uid, $pwd){

        $DB = new DB();
        $conn = $DB->connect();


        if (empty($uid)||empty($pwd)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor preencha todos os campos indicados.
				  </div>";

        }
        else{

            $query = "SELECT * FROM users";
            $result = $conn->query($query);

            while($row = $result->fetch())
            {
                $uid1 = $row['uid'];
                $pwd1 = $row['pwd'];

            }
            if($uid == $uid1 && password_verify($pwd, $pwd1)){

                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $uid;
                header("location: perfil.php");

            }
            else{


                echo "<div class='alert alert-warning'>
					    <strong>Atenção!</strong> A password ou username estão incorrectos.
					  </div>";



            }
        }
    }

    public function getUser($uid){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM users WHERE uid ='$uid' ";
        $result = $conn->query($query);

        while ($row = $result->fetch()) {

            echo "
                    <ul>
					    <li style='list-style-type: none;'><h3>".$row["uid"]."</h3></li>
						<li><strong>NIPC:</strong> ".$row["nipc"]."</li>
						<li><strong>E-mail:</strong> ".$row["email"]."</li>
						<li><strong>Contacto:</strong> ".$row["contacto"]."</li>
					    <li><strong>Área de Negócios:</strong> ".$row["area"]."</li>
						<li><strong>Nome do Responsável de Gestão de Recursos:</strong> ".$row["responsavel"]."</li>
						<li><strong>Nº de Pessoas a contratar:</strong> ".$row["num_pessoas"]."</li>
						<li><strong>Funções:</strong> ".$row["funcoes"]."</li>
						<li><strong>Requisitos Mínimos:</strong> ".$row["req_min"]."</li><br>
						<li><strong>Tipo de Contrato:</strong> ".$row["contrato"]."</li><br>
						<li><strong>Outras Informações:</strong> ".$row["outras"]."</li><br>
				    </ul>";
			 
        }
    }

    public function fill($uid){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM users WHERE uid = '$uid'";
        $result = $conn->query($query);

        while ($row = $result->fetch()) {

            echo "<div class='row'>
                    <div class='col-xs-6'>
                        <div class='form-group'>
                            <label>Alterar E-mail:</label>
                            <input type='email' name='email' class='form-control'  value='".$row["email"]."'>
                        </div>
                    </div>
                    <div class='col-xs-6'>
                        <div class='form-group'>
                            <label>Alterar Contactos:</label>
                            <input type='text' name='contacto' class='form-control' value='".$row["contacto"]."'>
                        </div>
                    </div>
                    </div>
                    <div class='form-group'>
                        <label>Alterar Nome do Responsável de Gestão de Recursos:</label>
                        <input type='text' class='form-control' name='responsavel'  value='".$row["responsavel"]."'>
                    </div>
                    <div class='row'>
                        <div class='col-sm-6'>
                            <div class='form-group'>
                                <label>Alterar Nº de Pessoas a contratar:</label>
                                <input type='text' name='num_pessoas' class='form-control'  value='".$row["num_pessoas"]."'>
                            </div>
                        </div>
                        <div class='col-sm-6'>
                            <div class='form-group'>
                                <label>Alterar Tipo de contracto com a Empresa prestadora de serviços:</label>
                                <input type='text' class='form-control' name='tipo'  value='".$row["contrato"]."'>
                            </div>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-xs-6'>
                            <div class='form-group'>
                                <label>Alterar Requisitos Mínimos:</label>
                                <textarea class='form-control' rows='5' name='req' style='resize: none;'>".$row["req_min"]." </textarea>
                            </div>
                        </div>
                        <div class='col-xs-6'>
                            <div class='form-group'>
                                <label>Alterar Funções:</label>
                                <textarea class='form-control' rows='5' style='resize: none;' name='funcoes'>".$row["funcoes"]."</textarea>
                            </div>
                        </div>
                     </div>";
        }
    }

    public function altPwd($uid, $Pwd, $RePwd){

        $DB = new DB();
        $conn = $DB->connect();


        if (empty($Pwd) || empty($RePwd)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor preencha todos os campos indicados.
				  </div>";

        }
        elseif (strlen($Pwd) < 8 || !preg_match('/[0-9]+/',$Pwd)) {

            echo "<div class='alert alert-warning'>
			        <strong>Atenção!</strong> Por favor introduza um password com pelo menos 8 digitos e um numero.
			     </div>";
        }
        elseif ($Pwd != $RePwd) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> As passwords não correspondem. Tente novamente.
			     </div>";

        }
        else{

            $hash = password_hash($RePwd, CRYPT_BLOWFISH);

            $query = "UPDATE users SET pwd = '$hash' WHERE uid = '$uid'";
            $result = $conn->query($query);
            $result->execute();

            echo "<div class='alert alert-success'>
                    <strong>A sua password foi alterada com sucesso!</strong>
                  </div>";

        }
    }

    public function getUsers(){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM users";
        $result = $conn->query($query);

        while ($row = $result->fetch()) {

            $id = $row["id"];

            echo "<ul>
					<div class='well' style='padding: 15px;'>
					    <li><h3>".$row["uid"]."</h3></li>
						<li><strong>NIPC:</strong> ".$row["nipc"]."</li>
						<li><strong>E-mail:</strong> ".$row["email"]."</li>
						<li><strong>Contacto:</strong> ".$row["contacto"]."</li>
					    <li><strong>Área de Negócios:</strong> ".$row["area"]."</li>
						<li><strong>Nome do Responsável de Gestão de Recursos:</strong> ".$row["responsavel"]."</li>
						<li><strong>Nº de Pessoas a contratar:</strong> ".$row["num_pessoas"]."</li>
						<li><strong>Funções:</strong> ".$row["funcoes"]."</li>
						<li><strong>Requisitos Mínimos:</strong> ".$row["req_min"]."</li><br>
						<li><strong>Tipo de Contrato:</strong> ".$row["contrato"]."</li><br>
						<li><strong>Outras Informações:</strong> ".$row["outras"]."</li><br>
					</div>
			    </ul>";
        }

    }


    public function alt($uid, $Email, $Contacto, $Responsavel, $NumPessoas, $Contrato, $ReqMin, $Funcoes){

        $DB = new DB();
        $conn = $DB->connect();

        $this->email = trim(filter_var($Email, FILTER_SANITIZE_EMAIL));
        $this->contacto = trim(filter_var($Contacto, FILTER_SANITIZE_STRING));
        $this->responsavel = trim(filter_var($Responsavel, FILTER_SANITIZE_STRING));
        $this->numPessoas = trim(filter_var($NumPessoas, FILTER_SANITIZE_STRING));
        $this->contrato = trim(filter_var($Contrato, FILTER_SANITIZE_STRING));
        $this->reqMin = trim(filter_var($ReqMin, FILTER_SANITIZE_STRING));
        $this->funcoes = trim(filter_var($Funcoes, FILTER_SANITIZE_STRING));

        if (!filter_var($this->contacto, FILTER_VALIDATE_INT) || strlen((string)$this->contacto) != 9) {

            echo "<div class='alert alert-warning'>
                    <strong>Atenção!</strong> Por favor introduza um contacto válido.
                  </div>";

        } elseif (filter_var($this->responsavel, FILTER_VALIDATE_INT)) {

            echo "<div class='alert alert-warning'>
                    <strong>Atenção!</strong> Por favor introduza um nome de gestor válido.
                  </div>";

        } elseif (!filter_var($this->numPessoas, FILTER_VALIDATE_INT)) {

            echo "<div class='alert alert-warning'>
                    <strong>Atenção!</strong> Por favor introduza um número de pessoas válido.
                  </div>";

        } else {

            $query = "UPDATE users SET email = :email, contacto = :contacto, responsavel = :responsavel, num_pessoas = :num_pessoas, contrato = :contrato, req_min = :req_min, funcoes = :funcoes WHERE uid = '$uid'";
            $stmt = $conn->prepare($query);
            $stmt->execute(array(
                ":email" => $this->email,
                ":contacto" => $this->contacto,
                ":responsavel" => $this->responsavel,
                ":num_pessoas" => $this->numPessoas,
                ":contrato" => $this->contrato,
                ":req_min" => $this->reqMin,
                ":funcoes" => $this->funcoes
            ));

            echo "<div class='alert alert-success'>
                    <strong>Os seus dados foram alterados com sucesso!</strong>
                  </div>";

        }
    }

    public function sendMail(){

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
        $mail->addAddress($this->email);
        $mail->addReplyTo('beriadanpt@gmail.com');
        $mail->addBCC('bcc@example.com');

        $mail->addAttachment("");

        $mail->Subject = "Law - Registo";
        $mail->Body = "Caro $this->uid,<br><br>O seu registo foi efetuado com os seguintes dados:<br><br><b>Username:</b> " . $this->uid . "<br><b>Password:</b> " . $this->pwd . "<br><br>Por favor altere a password no seu primeiro login.<br><br><b>Nota:</b> Este e-mail foi gerado autom&#225;ticamente pelo servidor.<br><br>Atenciosamente,<br><br><b>Law Servi&#231;o de Recursos Humanos</b><br><b>Tel:</b> 215896472<br><b>E-mail:</b> law@gmail.com<br><br>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if (!$mail->send()) {

            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;

        }
    }
}