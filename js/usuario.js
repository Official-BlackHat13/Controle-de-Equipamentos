function voltar(){
	location.href="index.php";
}

// Função para cadastrar o usuário
function cadastrar(){	
	var matricula = document.getElementById('matricula').value;
	var nome = document.getElementById('nome').value;
	var setor = document.getElementById('setor').value;
	var funcao = document.getElementById('funcao').value;
	var gestor = document.getElementById('gestor').value;
	var terceiro = document.getElementById('terceiro').checked;
	let flag;
	if(terceiro == true){
		flag = 'Y';
	}else{
		flag = 'N';
	}
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
	xhttp.open("POST", "cadastro_function.php?action=usuario&matricula="+matricula+"&nome="+nome+"&setor="+setor+"&funcao="+funcao+"&gestor="+gestor+"&flag="+flag+"&user="+user, true);
	xhttp.send();
}

// Função para autopreencher os dados da transportadora nacional
function autoComplete(str){
		
	var nome = document.getElementById('nome');
	var setor = document.getElementById('setor');
	var funcao = document.getElementById('funcao');
	var gestor = document.getElementById('gestor');
	var matricula = document.getElementById('matricula');
	var terceiro = document.getElementById('terceiro');
	var busca = document.getElementById('busca').value;
		
	if(busca != ""){
		nome.value = 'Carregando...';
		setor.value = 'Carregando...';
		funcao.value = 'Carregando...';
		gestor.value = 'Carregando...';
		terceiro.value = 'Carregando...';
		matricula.value = 'Carregando...';
	}
		
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);
				
			var json = JSON.parse(this.responseText);
			if(json.nome == undefined){	
				nome.value = "";
				setor.value = "";
				funcao.value = "";
				gestor.value = "";
				terceiro.value = "";
				matricula.value = "";
			}else{
				nome.value = json.nome;
				setor.value = json.setor;
				funcao.value = json.funcao;
				gestor.value = json.gestor;
				(json.terceiro == 'Y') ? document.getElementById('terceiro').checked = true : document.getElementById('terceiro').checked = false;
				matricula.value = json.matricula;
				document.getElementById('matricula').disabled = true;
			}
				
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=lista&&busca="+busca+"&id="+str, true);
	xhttp.send();					
}

// Função para redirecionar para tela de lista de usuários
function listaUsuarios(){
	location.href="lista_usuarios.php";
}

//Função para deixar a letra maiuscula
function maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
}