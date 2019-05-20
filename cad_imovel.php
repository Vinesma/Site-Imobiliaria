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
			<h3>Adicione um novo imóvel:</h3>
		</div>
	</section>

	<section>
		<div>
			<form class="flex_col form_cad" name="cad_imovel" action="db_imovel.php" method="POST" onsubmit="return validaCadImovel()">
				<h3>Informe os dados do imóvel:</h3>
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
						<option value="Compra">Compra</option>	
						<option value="Venda">Venda</option>	
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
				<input class="inputw" type="file" name="img" accept=".jpg, .png" required>
				<label><span class="important_text">*Todos os campos são obrigatórios.</span></label>
				<input class="formbtn submitbtn" type="submit" name="submitCad" value="Fazer cadastro!">
			</form>
		</div>
	</section>

	<footer>
		<p>&copy; Otavio C. 2019</p>		
	</footer>
</body>
</html>