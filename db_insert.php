 <?php
 	if ($_POST["tipopessoa"] === "Física") {
 		InsertPessoaFisica();
 	}else{
 		InsertPessoaJuridica();
 	}

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
	
	function InsertPessoaFisica(){
		$conn = ConnectTo();

		$user_login = $_POST["login"];
		$user_name = $_POST["nomeCad"];
		$user_password = $_POST["senhaCad"];
		$user_cpf = $_POST["cpf"];
		$user_endereco = $_POST["endereco"];
		$user_email = $_POST["email"];
		$user_tel = $_POST["tel"];
		$user_sexo = $_POST["sexo"];

		$sql = "INSERT INTO cliente (login, senha, endereco , email, telefone) 
		VALUES ('$user_login', '$user_password', '$user_endereco', '$user_email', '$user_tel')";

		if ($conn->query($sql) === TRUE) {
		    echo "Cliente cadastrado com sucesso!";
		} else {
		    echo "Erro: " . $sql . "<br>" . $conn->error;
		}

		$last_id = $conn->insert_id;

		$sql = "INSERT INTO pessoa_fisica (FK_CL, nome, cpf , sexo)
	    VALUES ('$last_id', '$user_name', '$user_cpf', '$user_sexo')";

		if ($conn->query($sql) === TRUE) {
		    echo "Pessoa Física cadastrada com sucesso!";
		} else {
		    echo "Erro: " . $sql . "<br>" . $conn->error;
		}				

		CloseConnection($conn);
		header("Location: http://localhost/Site-imobiliaria/cad_cliente.php");	
	}

	function InsertPessoaJuridica(){
		$conn = ConnectTo();

		$user_login = $_POST["login"];
		$user_name = $_POST["nomeFt"];
		$user_password = $_POST["senhaCad"];
		$user_cnpj = $_POST["cnpj"];
		$user_endereco = $_POST["endereco"];
		$user_ramo = $_POST["ramo"];
		$user_email = $_POST["email"];
		$user_tel = $_POST["tel"];

		$sql = "INSERT INTO cliente (login, senha, endereco , email, telefone) 
		VALUES ('$user_login', '$user_password', '$user_endereco', '$user_email', '$user_tel')";

		if ($conn->query($sql) === TRUE) {
		    echo "Cliente cadastrado com sucesso!";
		} else {
		    echo "Erro: " . $sql . "<br>" . $conn->error;
		}

		$last_id = $conn->insert_id;

		$sql = "INSERT INTO pessoa_juridica (FK_CL, nomef, cnpj , ramo)
	    VALUES ('$last_id', '$user_name', '$user_cnpj', '$user_ramo')";

		if ($conn->query($sql) === TRUE) {
		    echo "Pessoa Jurídica cadastrada com sucesso!";
		} else {
		    echo "Erro: " . $sql . "<br>" . $conn->error;
		}				

		CloseConnection($conn);
		header("Location: http://localhost/Site-imobiliaria/cad_cliente.php");	
	}	
?> 