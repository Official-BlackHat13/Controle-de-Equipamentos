function voltar(){
	location.href="index.php";
}

function cadastrar(){
	
	var matricula = document.getElementById('matricula').value;
	var nome = document.getElementById('nome').value;
	var setor = document.getElementById('setor').value;
	var funcao = document.getElementById('funcao').value;
	var gestor = document.getElementById('gestor').value;
	var user = document.getElementById('user').value;
	
	if(matricula == "" || matricula == null){
		alert("PREENCHA UMA MATRICULA");
		document.getElementById('matricula').focus();
		return false;
	}
	
	if(nome == "" || nome == null){
		alert("PREENCHA UM NOME");
		document.getElementById('nome').focus();
		return false;
	}
	
	if(setor == "" || setor == null){
		alert("PREENCHA UM SETOR");
		document.getElementById('setor').focus();
		return false;
	}
	
	if(funcao == "" || funcao == null){
		alert("PREENCHA UMA FUNÇÃO");
		document.getElementById('funcao').focus();
		return false;
	}
	
	if(gestor == "" || gestor == null){
		alert("PREENCHA UM GESTOR(A)");
		document.getElementById('gestor').focus();
		return false;
	}
	
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);
			if(this.responseText == "1"){
				alert("CADASTRADO COM SUCESSO");
				location.reload();
			}else if(this.responseText == "2"){
				alert("USUÁRIO JÁ CADASTRADO");
			}else{
				alert("ERRO AO CADASTRAR");
			}
			
			
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=usuario&matricula="+matricula+"&nome="+nome+"&setor="+setor+"&funcao="+funcao+"&gestor="+gestor+"&user="+user, true);
	xhttp.send();
	
	
}

//Função para deixar a letra maiuscula
function maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
}