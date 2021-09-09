function voltar(){
	location.href="index.php";
}

function pesquisa(){
	
	var machine = document.getElementById('machine').value;
	var user = document.getElementById('user').value;
	
	if(machine == "" || machine == null && user == "" || user == null){
		alert("NENHUM VALOR FOI SELECIONADO");
		document.getElementById('machine').focus();
		return false;
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);	
			document.getElementById('lista').innerHTML = this.responseText;
			
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=pesquisa&busca="+busca, true);
	xhttp.send();	
}

function exportar(){
	var action = "exportar";
	var busca = document.getElementById('busca').value;
	
	if(busca == "" || busca == null){
		alert("SELECIONE UM EQUIPAMENTO");
		document.getElementById('busca').focus();
		return false;
	}
	
	location.href="cadastro_function.php?action="+action+"&busca="+busca, "_blank";	
}

function blocks(id){
	var user = document.getElementById('user').value;
	var machine = document.getElementById('machine').value;
	
	if(id == 1){
		if(machine != ""){
			document.getElementById('user').disabled = true;
		}else{
			document.getElementById('user').disabled = false;
		}
	}else{
		if(user != ""){
			document.getElementById('machine').disabled = true;
		}else{
			document.getElementById('machine').disabled = false;
		}
	}
}