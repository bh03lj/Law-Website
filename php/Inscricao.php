<?php

require_once("DB.php");

class Inscricao{
    //extends db
    private $nome;
    private $morada;
    private $email;
    private $contacto;
    private $curso;
    private $data;

    //só se aplica a empresas
    private $nipc;
    private $numPessoas;
    private $tipo;
    private $formandos;

    public function setInscricao($Nome, $Morada, $Email, $Contacto, $Curso, $Data, $Nipc, $NumPessoas, $Tipo, $Formandos){

        $this->nome = trim(filter_var($Nome, FILTER_SANITIZE_STRING));
        $this->morada = trim(filter_var($Morada, FILTER_SANITIZE_STRING));
        $this->email = trim(filter_var($Email, FILTER_SANITIZE_EMAIL));
        $this->contacto = trim(filter_var($Contacto, FILTER_SANITIZE_STRING));
        $this->curso = $Curso;
        $this->data = $Data ;
        $this->nipc = trim(filter_var($Nipc, FILTER_SANITIZE_STRING));
        $this->numPessoas = trim(filter_var($NumPessoas, FILTER_SANITIZE_STRING));
        $this->tipo = trim(filter_var($Tipo, FILTER_SANITIZE_STRING));
        $this->formandos = trim(filter_var($Formandos, FILTER_SANITIZE_STRING));

    }

    public function setData(){

        if (empty($this->nome) || empty($this->morada) || empty($this->email) || empty($this->contacto) || empty($this->curso) || empty($this->data) || empty($this->nipc) || empty($this->numPessoas) || empty($this->tipo) || empty($this->formandos)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor preencha todos os campos indicados.
				  </div>";

        } elseif (!filter_var($this->contacto, FILTER_VALIDATE_INT) || strlen((string)$this->contacto) != 9) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza um contacto válido.
				  </div>";

        } elseif ($this->nipc != "N/A" && strlen((int)$this->nipc) != 9) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza um NIPC válido.
				  </div>";

        }elseif ($this->numPessoas != "N/A" && !filter_var($this->numPessoas, FILTER_VALIDATE_INT)) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza o número de Formandos.
				  </div>";

        }elseif (strtotime($this->data) <= strtotime(date("m.d.y"))) {

            echo "<div class='alert alert-warning'>
				    <strong>Atenção!</strong> Por favor introduza uma data válida.
				  </div>";

        } else {

            $DB = new DB();
            $conn = $DB->connect();

            $sql = "INSERT INTO inscricoes(nome, morada, email, contacto, curso, data, nipc, num_pessoas, tipo, formandos) VALUES(:nome, :morada, :email, :contacto, :curso, :data, :nipc, :num_pessoas, :tipo, :formandos)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":nome" => $this->nome,
                ":morada" => $this->morada,
                ":email" => $this->email,
                ":contacto" => $this->contacto,
                ":curso" => $this->curso,
                ":data" => $this->data,
                ":nipc" => $this->nipc,
                ":num_pessoas" => $this->numPessoas,
                ":tipo" => $this->tipo,
                ":formandos" => $this->formandos
            ));

            echo "<div class='alert alert-success'>
  				    <strong>A sua inscrição foi submetida com sucesso!</strong>
				  </div>";

        }
    }

    public function getInscricoes(){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM inscricoes";
        $result = $conn->query($query);

        while ($row = $result->fetch()) {

            echo "<ul>
					<div class='well' style='padding: 15px;'>
						<li><h3>".$row["nome"]."</h3></li>
						<li><strong>E-mail:</strong> ".$row["email"]."</li>
						<li><strong>Contacto:</strong> ".$row["contacto"]."</li>
						<li><strong>Morada:</strong> ".$row["morada"]."</li>
						<li><strong>Curso:</strong> ".$row["curso"]."</li>
						<li><strong>Data de Início:</strong> ".$row["data"]."</li>
						<li><strong>NIPC:</strong> ".$row["nipc"]."</li>
						<li><strong>Número de Formandos:</strong> ".$row["num_pessoas"]."</li>
						<li><strong>Nome dos Formandos:</strong> ".$row["formandos"]."</li>
						<li><strong>Tipo de Protocolo:</strong> ".$row["tipo"]."</li><br>
					</div>
				   </ul>";

        }
    }
}