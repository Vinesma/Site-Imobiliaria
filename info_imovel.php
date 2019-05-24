<!DOCTYPE html>
<html>
<head>
	<?php
		session_start();

		$im_id = $_GET['id']; 
	?>
	<meta charset="utf-8">
	<meta name="viewport" content=width=device-width>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Anton|Roboto+Condensed" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">  
	<title>Site Imobiliária</title>
</head>
<body>
	<header>
		<div class="container_top">
			<a href="index.php"><img src="img/houseLogo.png"></a>
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
				if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true)){
					echo '
					<form action="" method="POST">
						<label><i class="fas fa-id-badge"></i> Login:</label>
						<input class="notbtn" type="text" name="usuario" placeholder="Usuário">
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
			<h3>Informações do imóvel:</h3>
		</div>
	</section>

	<section>
		<div class="form_cad">
			<div class="grid_info">
				<div class="info_desc">				
					<h3>Descrição:</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
				<div class="info_stat">
					<h3>Características:</h3>
					<div class="iconbox boxborder flex_center">
					<div class="boxborder_child">
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div class="boxborder_child">
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div class="boxborder_child">
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
					<div class="boxborder_child">
						<i class="fas fa-bed"></i>
						<i class="fas fa-toilet"> <p>Suites:</p></i>
						<p>0</p>
					</div>
				</div>
				<div class="info_loc">
					<h4>Cidade:</h4><p class="boxborder_child">CIDADE</p>
					<h4>Endereço:</h4><p class="boxborder_child">Rua 0 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
				</div>
				<div class="info_outros">
					<h4>Tipo:</h4><p class="boxborder_child">TIPO</p>
					<h4>Finalidade:</h4><p class="boxborder_child">FINALIDADE</p>
					<h4>Área (m²):</h4><p class="boxborder_child">000</p>
				</div>
				</div>
				<div class="info_action">
					<button class="formbtn">Alugar</button>
					<button class="formbtn">Comprar</button><br>
					<h4>R$ 000.000.000,00</h4>
				</div>
				<div><img class="info_img" src="img/house1.jpg"></div>		
			</div>		
		</div>
	</section>

	<footer>
		<p>&copy; Otavio C. 2019</p>		
	</footer>
</body>
</html>