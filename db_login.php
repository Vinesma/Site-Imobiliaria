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

		if(mysqli_num_rows($sql) > 0 ){ //figure out how to get the no of rows outta this thang
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			header("location: http://localhost/Site-imobiliaria/main.php");			
		}else{
		  	unset ($_SESSION['login']);
		  	unset ($_SESSION['senha']);
		  	//header("location: http://localhost/Site-imobiliaria/index.php");
		  	echo "string";
		}
	}
?>