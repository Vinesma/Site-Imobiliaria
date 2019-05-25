<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();
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
			<?php  
				if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
					echo '<a href="index.php"><img src="img/houseLogo.png"></a>';
				}else{
					echo '<a href="main.php"><img src="img/houseLogo.png"></a>';
				}
			?>	
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
				if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
					echo '
					<form action="db_login.php" name="login_form" method="POST" onsubmit="return validaLogin()">
						<label><i class="fas fa-id-badge"></i> Login:</label>
							<input class="notbtn" type="text" name="login" placeholder="Usuário">
							<input class="notbtn" type="password" name="senha" placeholder="Senha">
							<input class="formbtn" type="submit" name="submit_3" value="Login">
							<span class="nodisplay">|</span>
						<label><a href="cad_cliente.php"><i class="fas fa-sign-in-alt"></i> Fazer cadastro</a></label>
					</form>';
 				}else{
 					if ($_SESSION['tipo_pessoa'] == 'A') {
						$page = "info_corretor.php";
					}else{
						$page = "info_cliente.php";
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
 				}
			?>
		</div>
	</header>

	<section class="cont_leftborder">
		<div class="container_title">
			<h3>Resultados:</h3>
		</div>
	</section>

	<section>
		<div class="grid">
			<?php include ("db_popGridSearch.php") ?>
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