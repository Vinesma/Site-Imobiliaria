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
							<option value="compra">Compra</option>
							<option value="venda">Venda</option>
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
					<a href="'.$page.'"><label>' . $_SESSION['login'] . '</label></a>
					<img class="profileimg_small" src="db_getImageByID.php?id='.$_SESSION['id'].'&isAdm='.$_SESSION['isAdm'].'" srcset="img/default_user_img.png"">
					<span class="nodisplay">|</span>
					<label><a href="db_logout.php"><i class="fas fa-sign-in-alt"></i> Logout</a></label>
				</form>';					
			 ?>	
		</div>
	</header>

	<section class="cont_leftborder">
		<div class="container_title">
			<h3>Dados do corretor:</h3>
		</div>
	</section>

	<section>
		<div class="grid">			
			<div class="userprofile_r">
				<img class="userimg" src="img/default_user_img.png">
				<a href="#">Editar dados</a>
			</div>
			<div class="userprofile_c">					
					<?php include ("db_popCliente.php") ?>		
			</div>
			<div class="userprofile_l grid">
				<h3 class="dashtop">Painel:</h3>
				<div class="dash1">
					<a href="#" title="Imóveis em locação"><img class="dashimg" src="img/dash_ploc.png"></a>
				</div>
				<div class="dash2">					
					<a href="#" title="Imóveis em aquisição"><img class="dashimg" src="img/dash_pbuying.png"></a>	
				</div>			
				<div class="dash3">
					<a href="cad_imovel.php" title="Adicionar imóveis"><img class="dashimg" src="img/dash_addhouse.png"></a>	
				</div>
			</div>	
		</div>
	</section>

	<footer>
		<p>&copy; Otavio C. 2019</p>		
	</footer>
</body>
</html>