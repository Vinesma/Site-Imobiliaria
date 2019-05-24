<!DOCTYPE html>
<html>
<head>
	<?php //verifica se existe esta sessão
		session_start(); 

		if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
  			include ("db_logout.php");
 		}
 
		$logado = $_SESSION['login'];
	?>
	<meta charset="utf-8">
	<meta name="viewport" content=width=device-width>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script type="text/javascript" src="script.js"></script>  
	<title>Site Imobiliária</title>
</head>
<body>
	<header>
		<div class="container_top">
			<a href="main.php"><img src="img/houseLogo.png"></a>
		</div>
		<div class="container_mid">
			<form action="" method="POST">
				<label><i class="fas fa-search"></i> Busca Rápida:</label>
				<input class="notbtn" type="text" name="busca" placeholder="Código do imóvel">
				<input class="formbtn" type="submit" name="submit" value="Pesquisar">
				<span class="nodisplay">|</span>
				<div class="dropdown">
					<label><i class="fas fa-search-plus"></i> Pesquisa Avançada</label>
					<div class="dropdown-content">
						<form class="dropdown-content" action="" method="POST">
							<label>Tipo:</label>
							<select name="tipo_imovel">
								<?php include ("db_popSelect.php");//popula o select com dados do BD?>
							</select>
						<label>Finalidade:</label>
						<select name="finalidade">
							<option value="Venda">Venda</option>	
							<option value="Aluguel">Aluguel</option>
						</select>
						<label>Cidade:</label>
						<select name="cidade">
							<option value="petrolina">Petrolina</option>
							<option value="juazeiro">Juazeiro</option>
						<input class="formbtn" type="submit" name="submit_2" value="Pesquisar">
						</select>
						</form>
					</div>
				</div>
			</form>				
			<?php
				if ($_SESSION['tipo_pessoa'] == 'A') {
					$page = 'info_corretor.php';
				}else{
					$page = 'info_cliente.php';
				}

				echo 
				'<form action="" name="login_form" method="POST">
					<label><i class="fas fa-id-badge"></i> Logado como:</label>
					<a href="'.$page.'"><label>' . $_SESSION['login'] . '</label></a>';
					include ("db_getImageById.php");
				echo
					'<span class="nodisplay">|</span>
					<label><a href="db_logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a></label>
				</form>';					
			 ?>	
		</div>
	</header>

	<section class="cont_leftborder">
		<div class="container_title">
			<h3>Adicione um novo imóvel:</h3>
		</div>
	</section>

	<section>
		<div>
			<form enctype="multipart/form-data" class="flex_col form_cad" name="cad_imovel" action="db_imovel.php" method="POST" onsubmit="return validaCadImovel()">
				<h3>Informe os dados do imóvel:</h3>
				<label>Proprietário:</label>
					<select name="proprietario" class="inputw" required>
						<?php include ("db_popProprietario.php") ?>
					</select>
				<label>Cidade:</label>
				<select class="inputw" name="cidade" required>
					<option value="Petrolina">Petrolina</option>
					<option value="Juazeiro">Juazeiro</option>						
				</select>
				<label>Endereço:</label>
				<input class="inputw" type="text" name="endereco" placeholder="Endereço" required>	
				<label>Tipo:</label>
					<select name="tipo_imovel" class="inputw" required>
						<option value=1>Casa</option>
						<option value=2>Terreno</option>
						<option value=3>Apartamento</option>
						<option value=4>Comercial</option>
					</select>
				<label>Finalidade:</label>
					<select name="finalidade" class="inputw" required>
						<option value="Venda">Venda</option>	
						<option value="Aluguel">Aluguel</option>	
					</select>
				<fieldset class="inputw">
					<legend>Quantidade de:</legend>
					<label>Quartos (sem incluir suítes):</label>
					<input class="inputNumberw" type="number" name="qquartos" placeholder="Nº Quartos" required>
					<label>Banheiros (sem incluir suítes):</label>
					<input class="inputNumberw" type="number" name="qbanheiros" placeholder="Nº Banheiros" required><br><br>
					<label>Suites:</label>
					<input class="inputNumberw" type="number" name="qsuites" placeholder="Nº Suites" required>					
					<label>Garagens:</label>
					<input class="inputNumberw" type="number" name="qgaragens" placeholder="Nº Garagens" required>
				</fieldset>
				<label>Área (m²):</label>
				<input class="inputNumberw" type="number" name="area" placeholder="Área do lote" required>
				<label>Descrição:</label>
				<textarea class="inputw" name="descricao" placeholder="Uma descrição rápida do imóvel." required></textarea>
				<label>Foto:</label>
					<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
    				<input class="inputw" name="img" type="file" accept=".jpg" required />				
				<label><span class="important_text">*Todos os campos são obrigatórios.</span></label>
				<input class="formbtn submitbtn" type="submit" name="submitCad" value="Fazer cadastro!">
			</form>
		</div>
	</section>

	<footer>
		<div class="ft_left">
			<a href="https://github.com/Vinesma"><p>Otavio C. &copy; 2019</p></a>	
		</div>
		<div class="ft_right">
			<a href="https://www.facebook.com/"><p><i class="fab fa-facebook-square"></i>Facebook</p></a>
			<a href="https://twitter.com/"><p><i class="fab fa-twitter-square"></i>Twitter</p></a>
		</div>		
	</footer>
</body>
</html>