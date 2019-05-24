 <?php
 	GetImage();
	
	function GetImage(){
		$conn = ConnectTo();
		
		$user_id = $_SESSION["id"];
		$tipo_pessoa = $_SESSION["tipo_pessoa"];

		if ($user_id == null || $user_id == "") {
			CloseConnection($conn);
		}else{
			if ($tipo_pessoa != 'A') {
				$sql = "SELECT imglink FROM cliente WHERE ID_CL = '$user_id'";
			}else{
				$sql = "SELECT imglink FROM corretor WHERE ID_CT = '$user_id'";
			}
			
			if ($result = $conn->query($sql)) {
				$row = $result->fetch_assoc();
        		echo '<img class="userimg" src="'.$row['imglink'].'">';
			}else{
		    	echo "Erro: " . $sql . "<br>" . $conn->error;
			}
			CloseConnection($conn);
		}
	}			
?> 