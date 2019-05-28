<?php

	if ($_SESSION['tipo_pessoa'] == 'F'){
		populatePessoaFisica();	
	}elseif ($_SESSION['tipo_pessoa'] == 'J'){
		populatePessoaJuridica();	
	}else{
		populateCorretor();
	}

 	function populatePessoaFisica(){
		$conn = ConnectTo();

		$id = $_SESSION['id'];

		$sql = "SELECT cpf FROM pessoa_fisica WHERE FK_CL = '$id'";

		if ($result = $conn->query($sql)) {
    		$row = $result->fetch_assoc();
        	echo ("<div class="."datacliente jsSetPF"."><h4>CPF:</h4><p>".$row["cpf"]."</p></div>");
    		

    		$sql = "SELECT * FROM cliente WHERE ID_CL = '$id'";
    		$result = $conn->query($sql);
    		$row = $result->fetch_assoc();
        	echo ("<div class="."datacliente"."><h4>Email:</h4><p>".$row["email"]."</p></div>");
        	echo ("<div class="."datacliente"."><h4>Endereço:</h4><p>".$row["endereco"]."</p></div>");
        	echo ("<div class="."datacliente"."><h4>Telefone:</h4><p>".$row["telefone"]."</p></div>");

    		$sql = "SELECT sexo FROM pessoa_fisica WHERE FK_CL = '$id'";
    		$result = $conn->query($sql) or die($conn->error);
    		$row = $result->fetch_assoc();
        	echo ("<div class="."datacliente"."><h4>Sexo:</h4><p>".$row["sexo"]."</p></div>");
    		
		}else{
			echo "Erro: " . $sql . "<br>" . $conn->error;
		}		
		CloseConnection($conn);
	}

	function populatePessoaJuridica(){
		$conn = ConnectTo();

		$id = $_SESSION['id'];

		$sql = "SELECT nomef FROM pessoa_juridica WHERE FK_CL = '$id'";

		if ($result = $conn->query($sql)) {
		    while($row = $result->fetch_assoc()) {
        		echo ("<div class="."datacliente jsSetPJ"."><h4>Nome Fantasia:</h4><p>".$row["nomef"]."</p></div>");
    		}

    		$sql = "SELECT cnpj FROM pessoa_juridica WHERE FK_CL = '$id'";
    		$result = $conn->query($sql);
    		while($row = $result->fetch_assoc()) {
        		echo ("<div class="."datacliente"."><h4>CNPJ:</h4><p>".$row["cnpj"]."</p></div>");
    		}

    		$sql = "SELECT ramo FROM pessoa_juridica WHERE FK_CL = '$id'";
    		$result = $conn->query($sql);
    		while($row = $result->fetch_assoc()) {
        		echo ("<div class="."datacliente"."><h4>Ramo:</h4><p>".$row["ramo"]."</p></div>");
    		}

    		$sql = "SELECT email FROM cliente WHERE ID_CL = '$id'";
    		$result = $conn->query($sql);
    		while($row = $result->fetch_assoc()) {
        		echo ("<div class="."datacliente"."><h4>Email:</h4><p>".$row["email"]."</p></div>");
    		}

    		$sql = "SELECT endereco FROM cliente WHERE ID_CL = '$id'";
    		$result = $conn->query($sql);
    		while($row = $result->fetch_assoc()) {
        		echo ("<div class="."datacliente"."><h4>Endereço:</h4><p>".$row["endereco"]."</p></div>");
    		}

    		$sql = "SELECT telefone FROM cliente WHERE ID_CL = '$id'";
    		$result = $conn->query($sql);
    		while($row = $result->fetch_assoc()) {
        		echo ("<div class="."datacliente"."><h4>Telefone:</h4><p>".$row["telefone"]."</p></div>");
    		}
		}else{
			echo "Erro: " . $sql . "<br>" . $conn->error;
		}		
		CloseConnection($conn);
	}

	function populateCorretor(){
		$conn = ConnectTo();

		$id = $_SESSION['id'];

		$sql = "SELECT cpf FROM corretor WHERE ID_CT = '$id'";

		if ($result = $conn->query($sql)) {
    		$row = $result->fetch_assoc();
        	echo ("<div class="."datacliente"."><h4>CPF:</h4><p>".$row["cpf"]."</p></div>");

        	$sql = "SELECT creci FROM corretor WHERE ID_CT = '$id'";
    		$result = $conn->query($sql);
    		$row = $result->fetch_assoc();
        	echo ("<div class="."datacliente"."><h4>CRECI:</h4><p>".$row["creci"]."</p></div>"); 
    		
    		$sql = "SELECT endereco FROM corretor WHERE ID_CT = '$id'";
    		$result = $conn->query($sql);
    		$row = $result->fetch_assoc();
        	echo ("<div class="."datacliente"."><h4>Endereço:</h4><p>".$row["endereco"]."</p></div>");
		}else{
			echo "Erro: " . $sql . "<br>" . $conn->error;
		}		
		CloseConnection($conn);
	}
?>