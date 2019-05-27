<?php
 	aprovaIM();

 	function ConnectTo (){
 		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "website_imobiliaria";

		// Cria conexão
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Checa conexão
		if ($conn->connect_error) {
	    	die("Connection failed: " . $conn->connect_error);
		}

		return $conn;
 	}

 	function CloseConnection($conn){
 		$conn->close();	
 	}

 	function aprovaIM(){
 		$conn = ConnectTo();

        $id = $_GET['id'];
        $tipo = $_GET['t'];
        $adm = $_GET['adm'];

        if ($tipo == 'c') {
        	$sql = "UPDATE venda SET aprovado = 1, FK_CT = $adm WHERE ID_VD = $id";
        	if ($conn->query($sql) === TRUE){
        		header("location: busca.php?type=compra");
        	}else{
        		echo "Erro: " . $sql . "<br>" . $conn->error;
        	}
        }else{
        	$sql = "UPDATE aluguel SET aprovado = 1, FK_CT = $adm WHERE ID_CO = $id";
        	if ($conn->query($sql) === TRUE){
        		header("location: busca.php?type=locacao");
        	}else{
        		echo "Erro: " . $sql . "<br>" . $conn->error;
        	}
        }    
 	}
?>