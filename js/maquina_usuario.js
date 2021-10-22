// volta para tela anterior
function voltar(){
	location.href="index.php";
}

function home(){
	location.href="index.php";
}

// Função para vincular os equipamento com o usuário
function vincular(){
	var patrimonio = document.getElementById('patrimonio').value;
	var matricula = document.getElementById('matricula').value;
	var stat = document.getElementById('status').value;
	var lista = [];
	var grupo = [];

	if(stat == 'Y'){
		var users = document.getElementById('select2');
		var generics = ["OPR","DESP","RFB"];	
			
		for(var i = 0; i < users.options.length; i++){
		   lista[i] = users.options[i].value;
		   grupo = lista.join(";");
		   
		}
		
		if(!generics.includes(users.value)){
			if(users.options.length <= 1){
				alert("SELECIONE MAIS DE UM COLABORADOR NA LISTA");
				document.getElementById('select1').focus();
				return false;
			}
		}
		
		if(generics.includes(users.value)){
			if(users.options.length > 1){
				alert("PARA AS OPÇÕES EQUIPE OPERACIONAL, DESPACHANTES E RFB APENAS SELECIONE UMA OPÇÃO");
				document.getElementById('select1').focus();
				return false;
			}
		}
		
		matricula = grupo;
	}
		
	if(patrimonio == "" || patrimonio == null){
		alert("SELECIONE UM EQUIPAMENTO");
		document.getElementById('patrimonio').focus();
		return false;
	}
	
	if(matricula == "" || matricula == null){
		alert("SELECIONE UM COLABORADOR");
		document.getElementById('matricula').focus();
		return false;
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);	
			
			if(this.responseText == "1"){
				alert("VINCULADO COM SUCESSO");
				location.reload();
			}else{
				alert("ERRO AO VINCULAR");
			}
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=vinculo&matricula="+matricula+"&patrimonio="+patrimonio, true);
	xhttp.send();
}

// Função para verificar se o equipamento é compartilhado
function selection(valor){
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);
			document.getElementById('status').value = this.responseText;
			if(this.responseText == 'Y'){
				document.getElementById('generic').style.display = "block";
				document.getElementById('colab').style.display = "none";
				document.getElementById('cadastrar').disabled = false;
			}else{
				document.getElementById('colab').style.display = "block";
				document.getElementById('generic').style.display = "none";
				document.getElementById('cadastrar').disabled = false;
			}
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=selection&valor="+valor, true);
	xhttp.send();
}

function mover(fonte, destino) {
	var selecionados = fonte.querySelectorAll("option:checked");
	for ( var i = 0 ; i < selecionados.length ; i++ ) {
	  fonte.removeChild(selecionados[i]);
	  destino.appendChild(selecionados[i]);
	}
}

function adicionar(){
	mover(document.querySelector("select.esqect"),
		  document.querySelector("select.direct"));
}

function remover() {
	mover(document.querySelector("select.direct"),
		  document.querySelector("select.esqect"));
	var options = document.querySelector("select.direct");  
	for ( var i = 0 ; i < options.length ; i++ ) {
	  options[i].selected = true;
	}
}





