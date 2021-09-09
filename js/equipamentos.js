function voltar(){
	location.href="index.php";
}

function cadastrar(){
	
	
	var tipo = document.getElementById('tipo').value;
	var marca = document.getElementById('marca').value;
	var modelo = document.getElementById('modelo').value;
	var partNumber = document.getElementById('partNumber').value;
	var serviceTag = document.getElementById('serviceTag').value;
	var patrimonio = document.getElementById('patrimonio').value;
	var stat = document.getElementById('status').value;
	var numNF = document.getElementById('numNF').value;
	var dateNF = document.getElementById('dateNF').value;
	var user = document.getElementById('user').value;
	
	if(tipo == "" || tipo == null){
		alert("PREENCHA UM TIPO");
		document.getElementById('tipo').focus();
		return false;
	}
	
	if(marca == "" || marca == null){
		alert("PREENCHA UMA MARCA");
		document.getElementById('marca').focus();
		return false;
	}
	
	if(modelo == "" || modelo == null){
		alert("PREENCHA UM MODELO");
		document.getElementById('modelo').focus();
		return false;
	}
	
	if(partNumber == "" || partNumber == null){
		alert("PREENCHA UM PART NUMBER OU SERIAL NUMBER");
		document.getElementById('partNumber').focus();
		return false;
	}
	
	if(patrimonio == "" || patrimonio == null){
		alert("PREENCHA O NÚMERO DO PATRIMÔNIO");
		document.getElementById('patrimonio').focus();
		return false;
	}
	
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);
			if(this.responseText == "1"){
				alert("CADASTRADO COM SUCESSO");
				location.reload();
			}else{
				alert("ERRO AO CADASTRAR");
			}
			
			
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=equipamento&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&partNumber="+partNumber+"&serviceTag="+serviceTag+"&patrimonio="+patrimonio+"&stat="+stat+"&numNF="+numNF+"&dateNF="+dateNF+"&user="+user, true);
	xhttp.send();
	
	
}

//Função para deixar a letra maiuscula
function maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
}