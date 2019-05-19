<!DOCTYPE html>
<html>
<head>
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
								<option value="casa">Casa</option>
								<option value="terreno">Terreno</option>
								<option value="apartamento">Apartamento</option>
								<option value="comercial">Comercial</option>
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
			<form action="" method="POST">
				<label><i class="fas fa-id-badge"></i> Login:</label>
				<input class="notbtn" type="text" name="usuario" placeholder="Usuário">
				<input class="notbtn" type="password" name="senha" placeholder="Senha">
				<input class="formbtn" type="submit" name="submit_3" value="Login">
				<span class="nodisplay">|</span>
				<label><a href="cad_cliente.php"><i class="fas fa-sign-in-alt"></i> Fazer cadastro</a></label>
			</form>
		</div>
	</header>

	<section class="cont_leftborder">
		<div class="container_title">
			<h3>Imóvel em destaque:</h3>
		</div>
	</section>	

	<section>
		<div class="flex">
			<div class="newsleft">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
				</div>
			</div>
			<div class="newsright">
				<img src="img/brickwall.jpg">
			</div>
		</div>
	</section>

	<section class="cont_leftborder">
		<div class="container_title">
			<h3>Imóveis:</h3>
		</div>
	</section>

	<section>
		<div class="grid">
			<div class="item1 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>	
			</div>
			<div class="item2 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>
			</div>
			<div class="item3 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>
			</div>
			<div class="item4 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>
			</div>
			<div class="item5 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>
			</div>
			<div class="item6 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>
			</div>
			<div class="item7 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>
			</div>
			<div class="item8 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>
			</div>
			<div class="item9 bordergrid">
				<img src="img/house1.jpg">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua.</p>
				<div class="iconbox flex_center nodisplay">
					<div>
						<i class="fas fa-bed"> <p>Quartos:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-toilet"> <p>Banheiros:</p></i>
						<p>0</p>
					</div>
					<div>
						<i class="fas fa-car"> <p>Garagens:</p></i>
						<p>0</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer>
		<p>&copy; Otavio C. 2019</p>		
	</footer>
</body>
</html>