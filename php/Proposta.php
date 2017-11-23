<?php

require_once("DB.php");

class Proposta
{
    private $nome;
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

    public function setProposta($Nome, $Nipc, $Email, $Contacto, $Area, $Responsavel, $NumPessoas, $Contrato, $ReqMin, $Funcoes, $Outras){

        $this->nome = trim(filter_var($Nome, FILTER_SANITIZE_STRING));
        $this->nipc = trim(filter_var($Nipc, FILTER_SANITIZE_STRING));
        $this->email = trim(filter_var($Email, FILTER_SANITIZE_EMAIL));
        $this->contacto = trim(filter_var($Contacto, FILTER_SANITIZE_EMAIL));
        $this->area = trim(filter_var($Area, FILTER_SANITIZE_STRING));
        $this->responsavel = trim(filter_var($Responsavel, FILTER_SANITIZE_STRING));
        $this->numPessoas = trim(filter_var($NumPessoas, FILTER_SANITIZE_STRING));
        $this->contrato = trim(filter_var($Contrato, FILTER_SANITIZE_STRING));
        $this->reqMin = trim(filter_var($ReqMin, FILTER_SANITIZE_STRING));
        $this->funcoes = trim(filter_var($Funcoes, FILTER_SANITIZE_STRING));
        $this->outras = trim(filter_var($Outras, FILTER_SANITIZE_STRING));

    }

    public function setData(){

        $DB = new DB();
        $conn = $DB->connect();

        if (empty($this->nome) || empty($this->nipc) || empty($this->email) || empty($this->contacto) || empty($this->area) || empty($this->responsavel) || empty($this->numPessoas) || empty($this->contrato) || empty($this->reqMin) || empty($this->funcoes)) {

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
        else {

            $sql = "INSERT INTO propostas(nome, nipc, email, contacto, area, responsavel, num_pessoas, contrato, req_min, funcoes, outras) VALUES(:nome, :nipc, :email, :contacto, :area, :responsavel, :num_pessoas, :contrato, :req_min, :funcoes, :outras)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(
                ":nome" => $this->nome,
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
  				    <strong>A sua proposta foi submetida com sucesso!</strong>
				  </div>";

        }
    }


    public function getPropostas(){

        $DB = new DB();
        $conn = $DB->connect();

        $query = "SELECT * FROM propostas";
        $result = $conn->query($query);

        while ($row = $result->fetch()) {

            $id = $row["id"];

            echo "<ul>
					<div class='well' style='padding: 15px;'>
					    <li><h3>".$row["nome"]."</h3></li>
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

}