function voltar(){
	location.href="index.php";
}

// Função para cadastrar o usuário
function cadastrar(){	
	var matricula = document.getElementById('matricula').value;
	var nome = document.getElementById('nome').value;
	var cpf = document.getElementById('cpf').value;
	var setor = document.getElementById('setor').value;
	var funcao = document.getElementById('funcao').value;
	var gestor = document.getElementById('gestor').value;
	var check = document.getElementById('generico').checked;
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
	
	if(check == false){
		var generic = 'N';
		if(cpf == "" || cpf == null){
			alert("PREENCHA UM CPF");
			document.getElementById('cpf').focus();
			return false;
		}
	}else{
		var generic = 'Y';
		cpf = document.getElementById('id').value;
	}
	
	alert(generic);
		
	
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
				alert("CPF JÁ CADASTRADO");
				document.getElementById('cpf').focus();
			}else{
				alert("ERRO AO CADASTRAR");
			}
			
			
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=usuario&matricula="+matricula+"&nome="+nome+"&setor="+setor+"&funcao="+funcao+"&gestor="+gestor+"&flag="+flag+"&user="+user+"&cpf="+cpf+"&generic="+generic, true);
	xhttp.send();
}

// Função para autopreencher os dados da transportadora nacional
function autoComplete(str){
		
	var nome = document.getElementById('nome');
	var cpf = document.getElementById('cpf');
	var setor = document.getElementById('setor');
	var funcao = document.getElementById('funcao');
	var gestor = document.getElementById('gestor');
	var matricula = document.getElementById('matricula');
	var terceiro = document.getElementById('terceiro');
	var generico = document.getElementById('generico');
	var busca = document.getElementById('busca').value;
		
	if(busca != ""){
		nome.value = 'Carregando...';
		cpf.value = 'Carregando...';
		setor.value = 'Carregando...';
		funcao.value = 'Carregando...';
		gestor.value = 'Carregando...';
		terceiro.value = 'Carregando...';
		generico.value = 'Carregando...';
		matricula.value = 'Carregando...';
	}
		
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);
				
			var json = JSON.parse(this.responseText);
			if(json.nome == undefined){	
				nome.value = "";
				cpf.value = "";
				setor.value = "";
				funcao.value = "";
				gestor.value = "";
				terceiro.value = "";
				generico.value = "";
				matricula.value = "";
			}else{
				nome.value = json.nome;
				cpf.value = json.cpf;
				setor.value = json.setor;
				funcao.value = json.funcao;
				gestor.value = json.gestor;
				(json.terceiro == 'Y') ? document.getElementById('terceiro').checked = true : document.getElementById('terceiro').checked = false;
				(json.generico == 'Y') ? document.getElementById('generico').checked = true : document.getElementById('generico').checked = false;
				matricula.value = json.matricula;
				document.getElementById('matricula').disabled = true;
				
				if(json.generico == 'Y'){
					document.getElementById('cult2').style.display = "block";
					document.getElementById('cult1').style.display = "none";
				}else{
					document.getElementById('cult1').style.display = "block";
					document.getElementById('cult2').style.display = "none";
				}
				//document.getElementById('cpf').disabled = true;
			}
				
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=lista&&busca="+busca+"&id="+str, true);
	xhttp.send();					
}

//valida o CPF
function verificarCPF(c){
	var i;
	s = c.replace(/[.-]/g, "");
	var c = s.substr(0,9);
	var dv = s.substr(9,2);
	var d1 = 0;
	var v = false;
 
	for (i = 0; i < 9; i++){
		d1 += c.charAt(i)*(10-i);
	}
	if (d1 == 0){
		alert("CPF INVÁLIDO")
		v = true;
		document.getElementById("cpf").value = '';
		document.getElementById("cpf").focus();
		return false;
	}
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(0) != d1){
		alert("CPF INVÁLIDO")
		v = true;
		document.getElementById("cpf").value = '';
		document.getElementById("cpf").focus();
		return false;
	}
	 
	d1 *= 2;
	for (i = 0; i < 9; i++){
		d1 += c.charAt(i)*(11-i);
	}
	d1 = 11 - (d1 % 11);
	if (d1 > 9) d1 = 0;
	if (dv.charAt(1) != d1){
		alert("CPF INVÁLIDO")
		v = true;
		document.getElementById("cpf").value = '';
		document.getElementById("cpf").focus();
		return false;
	}
	if (!v) {
		//alert(c + "nCPF Válido")
	}
}

function checar(){
	var check = document.getElementById('generico').checked;
	
	if(check == true){
		document.getElementById('cult2').style.display = "block";
		document.getElementById('cult1').style.display = "none";
	}else{
		document.getElementById('cult1').style.display = "block";
		document.getElementById('cult2').style.display = "none";
	}
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