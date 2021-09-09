function voltar(){
	location.href="index.php";
}

function pesquisa(){
	
	var busca = document.getElementById('busca').value;
	
	if(busca == "" || busca == null){
		alert("SELECIONE UM EQUIPAMENTO");
		document.getElementById('busca').focus();
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