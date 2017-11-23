<?php

require_once("DB.php");

class PedidoContacto{

    private $nome;
    private $email;
    private $contacto;
    private $assunto;

    //só se aplica a empresas
    private $gestor;
    private $nipc;

    public function setPedido($Nome, $Email, $Contacto, $Assunto, $Gestor, $Nipc){

        $this->nome = trim(filter_var($Nome, FILTER_SANITIZE_STRING));
        $this->email = trim(filter_var($Email, FILTER_SANITIZE_EMAIL));
        $this->contacto = trim(filter_var($Contacto, FILTER_SANITIZE_STRING));
        $this->assunto = trim(filter_var($Assunto, FILTER_SANITIZE_STRING));
        $this->gestor = trim(filter_var($Gestor, FILTER_SANITIZE_STRING));
        $this->nipc = trim(filter_var($Nipc, FILTER_SANITIZE_STRING));

    }

    public function setData(){

        $DB = new DB();
        $conn = $DB->connect();

        if (empty($this->nome) || empty($this->email) || empty($this->contacto) || empty($this->assunto) || empty($this->gestor) || empty($this->nipc)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor preencha todos os campos indicados.
				  </div>";

        } elseif (!filter_var($this->contacto, FILTER_VALIDATE_INT) || strlen((string)$this->contacto) != 9) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza um contacto válido.
				  </div>";

        } elseif (filter_var($this->gestor, FILTER_VALIDATE_INT)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza o nome do gestor.
				  </div>";

        } elseif ($this->nipc != "N/A" && strlen((int)$this->nipc) != 9) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza um NIPC válido.
				  </div>";

        } else {

            $sql = "INSERT INTO pedidos_contacto(nome, email, contacto, assunto, gestor, nipc) VALUES(:nome, :email, :contacto, :assunto, :gestor, :nipc)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":nome" => $this->nome,
                ":email" => $this->email,
                ":contacto" => $this->contacto,
                ":assunto" => $this->assunto,
                ":gestor" => $this->gestor,
                ":nipc" => $this->nipc
            ));

            echo "<div class='alert alert-success'>
  				    <strong>O seu pedido foi enviado com sucesso!</strong>
				  </div>";

        }
    }
    public function getPedidos(){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM pedidos_contacto";
        $result = $conn->query($query);

        while ($row = $result->fetch()) {



            echo "<ul>
					<div class='well' style='padding: 15px;'>
					    <li><h3>".$row["nome"]."</h3></li>
					    <li><strong>E-mail:</strong> ".$row["email"]."</li>
						<li><strong>Contacto:</strong> ".$row["contacto"]."</li>
						<li><strong>NIPC:</strong> ".$row["nipc"]."</li>
						<li><strong>Gestor:</strong> ".$row["gestor"]."</li><br>
					    <li><strong>Assunto:</strong> ".$row["assunto"]."</li>
					</div>
				 </ul>";
        }
    }

}