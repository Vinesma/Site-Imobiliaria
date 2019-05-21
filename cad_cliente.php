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
<body onload="setDisplay()">
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
			<form action="db_login.php" name="login_form" method="POST" onsubmit="return validaLogin()">
				<label><i class="fas fa-id-badge"></i> Login:</label>
				<input class="notbtn" type="text" name="login" placeholder="Usuário">
				<input class="notbtn" type="password" name="senha" placeholder="Senha">
				<input class="formbtn" type="submit" name="submit_3" value="Login">
				<span class="nodisplay">|</span>
				<label><a href="cad_cliente.php"><i class="fas fa-sign-in-alt"></i> Fazer cadastro</a></label>
			</form>
		</div>
	</header>

	<section class="cont_leftborder">
		<div class="container_title">
			<h3>Faça seu cadastro!</h3>
		</div>
	</section>

	<section>
		<div>
			<form class="flex_col form_cad" name="cad_cli" action="db_insert.php" method="POST" onsubmit="return validaCadCli()">
				<h3>Informe seus dados:</h3>
				<label>Pessoa:</label>
				<div>					
					<input id="radioPF" class="inputradio" type="radio" name="tipopessoa" 
					value="Fisica" checked onchange="setDisplay()"><label>Física</label><br>	
					<input id="radioPJ" class="inputradio" type="radio" name="tipopessoa" 
					value="Juridica" onchange="setDisplay()"><label>Jurídica</label>
				</div>
				<label>Login:</label>
					<input class="inputw" type="text" name="login" placeholder="Login">
				<label class="jsSetPF">Nome:</label>
					<input class="inputw jsSetPF" type="text" name="nomeCad" placeholder="Nome Completo">
				<label class="jsSetPJ">Nome Fantasia:</label>
					<input class="inputw jsSetPJ" type="text" name="nomeFt" placeholder="Nome Fantasia">
				<label>Senha:</label>
					<input class="inputw" type="text" name="senhaCad" placeholder="Senha">
				<label>Endereço:</label>
					<input class="inputw" type="text" name="endereco" placeholder="Endereço">
				<label class="jsSetPF">CPF:</label>
					<input class="inputw jsSetPF" type="text" name="cpf" placeholder="CPF">
				<label class="jsSetPJ">CNPJ:</label>
					<input class="inputw jsSetPJ" type="text" name="cnpj" placeholder="CNPJ">
				<label class="jsSetPJ">Ramo:</label>
					<input class="inputw jsSetPJ" type="text" name="ramo" placeholder="Ramo">
				<label>Email:</label>
					<input class="inputw" type="email" name="email" placeholder="Email">
				<label>Tel:</label>
					<input class="inputw" type="tel" name="tel" placeholder="Telefone">
				<label class="jsSetPF">Sexo:</label>
				<div>
					<input id="sexoM" class="inputradio jsSetPF" type="radio" 
					name="sexo" value="Masculino" checked><label class="jsSetPF">Masculino</label>
					<input id="sexoF" class="inputradio jsSetPF" type="radio" 
					name="sexo" value="Feminino"><label class="jsSetPF">Feminino</label>
					<input id="sexoNB" class="inputradio jsSetPF" type="radio" 
					name="sexo" value="Nao-Binario"><label class="jsSetPF">Não-Binário</label>
				</div>	
				<label>Foto:</label>
					<input type="file" name="img" accept=".jpg, .png" required>
				<input class="formbtn submitbtn" type="submit" name="submitCad" value="Fazer cadastro!">
			</form>			
		</div>
	</section>

	<footer>
		<p>&copy; Otavio C. 2019</p>		
	</footer>
</body>
</html>