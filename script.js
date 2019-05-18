function setDisplay(){
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

function validaCadCli(){
	let tipoPessoaF = document.getElementById("radioPF").checked;

	if (tipoPessoaF) {
		let nomeCad = document.forms["cad_cli"]["nomeCad"].value;
		let senhaCad = document.forms["cad_cli"]["senhaCad"].value;
		let cpf = document.forms["cad_cli"]["cpf"].value;
		let email = document.forms["cad_cli"]["email"].value;		

		if (nomeCad == null || nomeCad == ""){
			alert("Um nome válido é necessário!");
			return false;
		}

		if (senhaCad == null || senhaCad == ""){
			alert("Uma senha válida é necessária!");
			return false;
		}

		if (senhaCad.length < 6){
			alert("Sua senha deve ter pelo menos 6 caracteres!");
			return false;
		}

		if (!TestaCPF(cpf)){
			alert("Um CPF válido é necessário!");
			return false;
		}

		if (email == null || email == ""){
			alert("Um email válido é necessário!");
			return false;
		}
	} else {
		let nomeFt = document.forms["cad_cli"]["nomeFt"].value;
		let senhaCad = document.forms["cad_cli"]["senhaCad"].value;
		let cnpj = document.forms["cad_cli"]["cnpj"].value;
		let ramo = document.forms["cad_cli"]["ramo"].value;
		let email = document.forms["cad_cli"]["email"].value;
		let tel = document.forms["cad_cli"]["tel"].value;

		if (nomeFt == null || nomeFt == ""){
			alert("Um nome válido é necessário!");
			return false;
		}

		if (senhaCad == null || senhaCad == ""){
			alert("Uma senha válida é necessária!");
			return false;
		}

		if (senhaCad.length < 6){
			alert("A senha deve ter pelo menos 6 caracteres!");
			return false;
		}

		if (cnpj.length < 15){
			alert("O CNPJ deve ter pelo menos 14 caracteres!");
			return false;
		}

		if (email == null || email == ""){
			alert("Um email válido é necessário!");
			return false;
		}
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