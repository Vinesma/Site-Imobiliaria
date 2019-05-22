 <?php
 	session_start();
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

		$user_id = $_SESSION["id"];
		$tipo_pessoa = $_SESSION["tipo_pessoa"];

		if ($user_id == null || $user_id == "") {
			CloseConnection($conn);
		}else{
			if ($tipo_pessoa != 'A') {
				$sql = "SELECT imagem FROM cliente WHERE ID_CL = '$user_id'";
			}else{
				$sql = "SELECT imagem FROM corretor WHERE ID_CT = '$user_id'";
			}
			
			if ($result = $conn->query($sql)) {
				$row = $result->fetch_assoc();					
        		echo '<img class="profileimg_small" src="data:image/jpeg;base64,'.base64_encode( $row['imagem'] ).'">';
			}else{
		    	echo "Erro: " . $sql . "<br>" . $conn->error;
			}
			CloseConnection($conn);
		}
	}			
?> 