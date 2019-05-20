function setDisplay(){ //faz a troca entre inputs para Pessoa Física ou Jurídica
	let tipoPessoaF = document.getElementById("radioPF").checked;

	let classPF = document.getElementsByClassName("jsSetPF");
	let classPJ = document.getElementsByClassName("jsSetPJ");

	if (tipoPessoaF) {
		for (let i = 0; i < classPJ.length; i++) {
			classPJ[i].style.display = "none";
		}

		for (let i = 0; i < classPF.length; i++) {
			classPF[i].style.display = "block";
		}
	} else {
		for (let i = 0; i < classPJ.length; i++) {
			classPJ[i].style.display = "block";
		}

		for (let i = 0; i < classPF.length; i++) {
			classPF[i].style.display = "none";
		}
	}
}

function validaCadCli(){ //validação de cadastro de cliente
	let tipoPessoaF = document.getElementById("radioPF").checked;

	let login = document.forms["cad_cli"]["login"].value;
	let senhaCad = document.forms["cad_cli"]["senhaCad"].value;
	let email = document.forms["cad_cli"]["email"].value;
	let tel = document.forms["cad_cli"]["tel"].value;

	if (login == null || login == ""){
		alert("Um login válido é necessário!");
		return false;
	}else if (login.length > 40){
		alert("O login não pode possuir mais que 40 caracteres!");
		return false;
	}

	if (senhaCad == null || senhaCad == ""){
		alert("Uma senha válida é necessária!");
		return false;
	}

	if (senhaCad.length < 6){
		alert("Sua senha deve ter pelo menos 6 caracteres!");
		return false;
	}else if (senhaCad.length > 20){
		alert("A senha não pode possuir mais que 20 caracteres!");
		return false;
	}

	if (email == null || email == ""){
		alert("Um email válido é necessário!");
		return false;
	}else if (email.length > 50){
		alert("O email não pode possuir mais que 50 caracteres!");
		return false;
	}

	if (tel == null || tel == ""){
		alert("Um telefone válido é necessário!");
		return false;
	}else if (tel.length > 30){
		alert("O telefone não pode possuir mais que 30 caracteres!");
		return false;
	}

	if (tipoPessoaF) {		
		let nomeCad = document.forms["cad_cli"]["nomeCad"].value;	
		let cpf = document.forms["cad_cli"]["cpf"].value;

		if (nomeCad == null || nomeCad == ""){
			alert("Um nome válido é necessário!");
			return false;
		}else if (nomeCad.length > 50){
			alert("O nome não pode possuir mais que 50 caracteres!");
			return false;
		}		

		if (!TestaCPF(cpf)){
			alert("Um CPF válido é necessário!");
			return false;
		}
		
	}else{		
		let nomeFt = document.forms["cad_cli"]["nomeFt"].value;		
		let cnpj = document.forms["cad_cli"]["cnpj"].value;
		let ramo = document.forms["cad_cli"]["ramo"].value;

		if (nomeFt == null || nomeFt == ""){
			alert("Um nome fantasia válido é necessário!");
			return false;
		}else if (nomeFt.length > 80){
			alert("O nome fantasia não pode possuir mais que 80 caracteres");
			return false;
		}

		if (cnpj.length != 14){
			alert("O CNPJ deve ter 14 caracteres!");
			return false;
		}
	}
}

function validaCadImovel(){
	let endereco = document.forms["cad_imovel"]["endereco"].value;
	let qquartos = document.forms["cad_imovel"]["qquartos"].value;
	let qgaragens = document.forms["cad_imovel"]["qgaragens"].value;
	let qsuites = document.forms["cad_imovel"]["qsuites"].value;
	let qbanheiros = document.forms["cad_imovel"]["qbanheiros"].value;
	let area = document.forms["cad_imovel"]["area"].value;

	if (endereco == null || endereco == ""){
		alert("Um endereco válido é necessário!");
		return false;
	}else if (endereco.length > 100){
		alert("O endereco não pode possuir mais que 100 caracteres");
		return false;
	}

	if (qquartos < 0){
		alert("O numero de quartos não pode ser negativo!");
		return false;
	}

	if (qgaragens < 0){
		alert("O numero de garagens não pode ser negativo!");
		return false;
	}

	if (qsuites < 0){
		alert("O numero de suites não pode ser negativo!");
		return false;
	}

	if (qbanheiros < 0){
		alert("O numero de banheiros não pode ser negativo!");
		return false;
	}

	if (area < 0){
		alert("A area não pode ser negativa!");
		return false;
	}
}

function validaLogin(){
	let login = document.forms["login_form"]["login"].value;
	let senha = document.forms["login_form"]["senha"].value;

	if (login == null || login == ""){
		alert("Um login válido é necessário!");
		return false;
	}else if (login.length > 40){
		alert("O login não pode possuir mais que 40 caracteres");
		return false;
	}

	if (senha.length < 6){
		alert("A senha tem pelo menos 6 caracteres!");
		return false;
	}else if (senha.length > 20){
		alert("A senha não pode possuir mais que 20 caracteres!");
		return false;
	}
}

function TestaCPF(strCPF) {
    let Soma;
    let Resto;
    Soma = 0;
  	
  	if (strCPF == "00000000000") return false;
     
  	for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  	Resto = (Soma * 10) % 11;
   
    	if ((Resto == 10) || (Resto == 11))  Resto = 0;
    	if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
   
  	Soma = 0;
    	for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    	Resto = (Soma * 10) % 11;
   
    	if ((Resto == 10) || (Resto == 11))  Resto = 0;
    	if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    	return true;
}