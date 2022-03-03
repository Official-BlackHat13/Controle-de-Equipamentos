// Função para listar todos os pedidos pendentes
function listar(){
	var perfil = document.getElementById('perfil').value;
	var id_user = document.getElementById('id_user').value;
	
	document.getElementById('retorno').innerHTML = "<br><center><img src='img/load.gif' /></center>";
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);
			document.getElementById('retorno').innerHTML = this.responseText;
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=listOrder", true);
	xhttp.send();
}


// Função para listar todos os pedidos nos últimos 6 meses
function listarAll(){
	var perfil = document.getElementById('perfil').value;
	var id_user = document.getElementById('id_user').value;
	
	document.getElementById('retorno').innerHTML = "<br><center><img src='img/load.gif' /></center>";
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);
			document.getElementById('retorno').innerHTML = this.responseText;
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=listOrderAll", true);
	xhttp.send();
}

function altStatus(id){
	var stat = document.getElementById("status_"+id).value;
	
	alert(stat);
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		   if(this.responseText == 1){
			   location.reload();
		   }else{
			   alert("ERRO AO ALTERAR O STATUS");
		   }
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=altStatusPed&status="+stat+"&id="+id, true);
	xhttp.send();
}

function voltar(){
	location.href="pedido_home.php";
}