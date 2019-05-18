

function changeBackground(x){
	//console.log(x.value);

	let body = document.getElementById('body');
	body.style.backgroundColor = x.value;
}

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
	}else{
		for (let i = 0; i < classPJ.length; i++) {
			classPJ[i].style.display = "block";
		}

		for (let i = 0; i < classPF.length; i++) {
			classPF[i].style.display = "none";
		}
	}
}

function validateCadCli(){
	let firstName = 
	document.forms["myForm"]["firstName"].value;

	if (firstName == null || firstName == ""){
		alert("First name is required!");
		return false;
	}

	if (firstName.length < 3){
		alert("First name must be at least 3 characters!");
		return false;
	}
}