<?php
	makeForm();

 	function makeForm(){
 		$conn = ConnectTo();

		$id = $_SESSION['id'];
		$im_id = $_GET['im_id'];

		$sql = "SELECT * FROM imovel WHERE ID_IM = $im_id";

		if ($result = $conn->query($sql)) {
			$row = $result->fetch_assoc();
		}else{
			echo "Erro: " . $sql . "<br>" . $conn->error;
		}

		if ($row["finalidade"] == 'Venda') {
			$valor = $row['preco'];
			$FK_IM = $im_id;
			$FK_CTPR = $row['FK_CLPR'];
			$FK_CTCP = $id;

			$sql = "INSERT INTO venda (valor, FK_IM, FK_CTPR, FK_CTCP) VALUES ('$valor', '$FK_IM', '$FK_CTPR', '$FK_CTCP')";

			$sql2 = "SELECT * FROM venda WHERE FK_IM = $FK_IM AND FK_CTCP = $FK_CTCP";
			if ($result = $conn->query($sql2)) {
				if ($result->num_rows > 0) {
	                echo (
	                    '<div class="form_cad">
	                        <h4>Voce já demonstrou seu interesse neste imóvel!</h4><br>
	                        <h4>Aguarde a aprovação de um corretor.</h4>
	                    </div>'
	                    );
            	}else{
            		if ($conn->query($sql) === TRUE) {				
		    		echo "
		    			<h4>Seu interesse na compra do imóvel foi gravado!</h4><br>
		    			<h4>Aguarde a aprovação de um corretor.</h4>";
					} else {
		    			echo "Erro: " . $sql . "<br>" . $conn->error;
					}
            	}
			}
		}else{
			$FK_IM = $im_id;
			$FK_CLLO = $row['FK_CLPR'];
			$FK_CLLC = $id;

			$sql = "INSERT INTO aluguel (FK_CLLO, FK_CLLC, FK_IM) VALUES ('$FK_CLLO', '$FK_CLLC', '$FK_IM')";

			$sql2 = "SELECT * FROM aluguel WHERE FK_IM = $FK_IM AND FK_CLLC = $FK_CLLC";
			if ($result = $conn->query($sql2)) {
				if ($result->num_rows > 0) {
	                echo (
	                    '<div class="form_cad">
	                        <h4>Voce já demonstrou seu interesse neste imóvel!</h4><br>
	                        <h4>Aguarde a aprovação de um corretor.</h4>
	                    </div>'
	                    );
            	}else{
            		if ($conn->query($sql) === TRUE) {
		    		echo "
		    			<h4>Seu interesse no aluguel do imóvel foi gravado!</h4><br>
		    			<h4>Aguarde a aprovação de um corretor.</h4>";
					} else {
		    			echo "Erro: " . $sql . "<br>" . $conn->error;
					}
            	}
			}		
		}
		CloseConnection($conn);
 	}
?>