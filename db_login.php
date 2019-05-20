<?php
	LoginTo();

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

 	function LoginTo(){
 		session_start();

 		$login = $_POST['login'];
 		$senha = $_POST['senha'];

 		$conn = ConnectTo();

 		$sql = "SELECT * FROM cliente WHERE login = '$login' AND senha = '$senha'";

 		if ($result = $conn->query($sql)) {
	 		if($result->num_rows > 0 ){
				$_SESSION['login'] = $login;
				$_SESSION['senha'] = $senha;
				header("location: http://localhost/Site-imobiliaria/main.php");
			}else{
			  	unset ($_SESSION['login']);
			  	unset ($_SESSION['senha']);
			  	header("location: http://localhost/Site-imobiliaria/index.php");
			}
		}else{
		    echo "Erro: " . $sql . "<br>" . $conn->error;
		}
	}
?>