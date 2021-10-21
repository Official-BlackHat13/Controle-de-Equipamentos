// volta para tela anterior
function voltar(){
	location.href="index.php";
}

function home(){
	location.href="index.php";
}

// Função para vincular os equipamento com o usuário
function vincular(){
	var codigo = document.getElementById('codigo').value;
	var matricula = document.getElementById('matricula').value;
	
	if(codigo == "" || codigo == null){
		alert("SELECIONE UM EQUIPAMENTO");
		document.getElementById('codigo').focus();
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
	xhttp.open("POST", "cadastro_function.php?action=vinculo&matricula="+matricula+"&codigo="+codigo, true);
	xhttp.send();
}

// Função para verificar se o equipamento é compartilhado
function selection(valor){
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);
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
}

function teste(){
	
	var users = document.getElementById('select2');
	var lista = [];
	var grupo = [];
	

	if(users.options.length <= 1){
		alert("SELECIONE MAIS DE UM COLABORADOR NA LISTA");
		document.getElementById('select1').focus();
		return false;
	}

	alert(users.options.length);
	for(var i = 0; i < users.options.length; i++){
	   lista[i] = users.options[i].text;
	   grupo = lista.join(";");
	   
	}
	
	alert(grupo);
	
}




