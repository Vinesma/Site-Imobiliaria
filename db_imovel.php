 <?php
 	InsertImovel();

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
	
	function InsertImovel(){
		$conn = ConnectTo();

		$im_cidade = $_POST["cidade"];
		$im_finalidade = $_POST["finalidade"];
		$im_qgaragens = $_POST["qgaragens"];
		$im_area = $_POST["area"];
		$im_descricao = $_POST["descricao"];
		$im_qquartos = $_POST["qquartos"];
		$im_qsuites = $_POST["qsuites"];
		$im_qbanheiros = $_POST["qbanheiros"];
		$im_endereco = $_POST["endereco"];
		$im_tipo = $_POST["tipo_imovel"];
		$im_preco = $_POST["preco"];
		$im_proprietario = $_POST["proprietario"];
		$destdir = 'imgdata/';
		$im_imglink = $destdir . uploadIMG($destdir);

		$sql = "INSERT INTO imovel (cidade, finalidade, garagens , area, descricao, quartos, suites, banheiros, endereco, preco, imglink, FK_TI, FK_CLPR) VALUES ('$im_cidade', '$im_finalidade', '$im_qgaragens', '$im_area', '$im_descricao', '$im_qquartos', '$im_qsuites', '$im_qbanheiros', '$im_endereco', '$im_preco', '$im_imglink', '$im_tipo', '$im_proprietario')";

		if ($conn->query($sql) === TRUE) {
		    echo "Imovel cadastrado com sucesso!";
		} else {
		    echo "Erro: " . $sql . "<br>" . $conn->error;
		}

		CloseConnection($conn);
		header("Location: http://localhost/Site-imobiliaria/cad_imovel.php");
	}

	function uploadIMG($destdir){
		$uploadfile = $destdir . basename($_FILES['img']['name']);
		if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
		} else {
			echo "Upload failed";
		}			
			
		return $_FILES['img']['name'];	
	}
?> 