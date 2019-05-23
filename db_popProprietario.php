<?php
	populateProprietario();

 	function populateProprietario(){
		$conn = ConnectTo();

		$id = $_SESSION['id'];

		$sql = "SELECT * FROM cliente";

		if ($result = $conn->query($sql)) {
    		while ($row = $result->fetch_assoc()) {
                echo ("<option value=".$row["ID_CL"].">".$row["login"]."</option>");
            }
		}else{
			echo "Erro: " . $sql . "<br>" . $conn->error;
		}		
		CloseConnection($conn);
	}
?>