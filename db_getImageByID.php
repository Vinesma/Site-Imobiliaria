 <?php
 	GetImage();

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
	
	function GetImage(){
		$conn = ConnectTo();

		$user_id = $_GET["id"];
		$isAdm = $_GET["isAdm"];

		if ($user_id == null || $user_id == "") {
			CloseConnection($conn);
		}else{
			if ($isAdm != 1) {
				$sql = "SELECT imagem FROM cliente WHERE ID_CL = '$user_id'";
			}else{
				$sql = "SELECT imagem FROM corretor WHERE ID_CT = '$user_id'";
			}
			
			if ($result = $conn->query($sql)) {
				while($row = $result->fetch_assoc()) {
					header("Content-type: image/png");
        			echo base64_encode($row["imagem"]);
    			}
			}else{
		    	echo "Erro: " . $sql . "<br>" . $conn->error;
			}
			CloseConnection($conn);
		}
	}			
?> 