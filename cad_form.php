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
			<form action="info_imovel.php" method="GET">
				<label><i class="fas fa-search"></i> Busca Rápida:</label>
				<input class="notbtn" type="text" name="id" placeholder="Código do imóvel">
				<input class="formbtn" type="submit" name="submit" value="Pesquisar">
			</form>
			<form action="busca.php" method="GET">
				<div class="dropdown">
					<label><i class="fas fa-search-plus"></i> Pesquisa Avançada</label>
					<div class="dropdown-content">
						<form class="dropdown-content" action="">
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
							<option value="Petrolina">Petrolina</option>
							<option value="Juazeiro">Juazeiro</option>
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
			<h3><i class="fas fa-info-circle"></i> Informação:</h3>
		</div>
	</section>

	<section>
		<div style="margin: 15px;">
			<?php include ("db_cadform.php"); ?>		
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