<?php
	populate();

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

 	function populate(){ //WIP
		$conn = ConnectTo();

		$sql = "SELECT nome FROM tipo_imovel";

		if ($result = $conn->query($sql)) {
		    while($row = $result->fetch_assoc()) {
        		echo ("<option value='".$row["nome"]."'>".$row["nome"]."</option>");
    		}
		}else{
			echo "Erro: " . $sql . "<br>" . $conn->error;
		}		
		CloseConnection($conn);
	}
?>