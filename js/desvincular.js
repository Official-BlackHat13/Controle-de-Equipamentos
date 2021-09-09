function voltar(){
	location.href="maquina_usuario.php";
}

function search(codigo){
	
	if(codigo == "" || codigo == null){
		alert('SELECIONE UM EQUIPAMENTO');
		document.getElementById('codigo').focus();
		return false;
	}
		
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);	
			document.getElementById('retorno').innerHTML = this.responseText;
			
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=search&codigo="+codigo, true);
	xhttp.send();
}

function desvicular(){
	var codigo = document.getElementById('id').value;
	
	var res = confirm("TEM CERTEZA QUE DESEJA DESVINCULAR?");
	
	if(res == true){
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
				if(this.responseText == "1"){
					alert('DESVINCULADO COM SUCESSO');
					location.reload();
				}else{
					alert('ERRO AO DESVINCULAR');
				}
				
				
			}
		};
		xhttp.open("POST", "cadastro_function.php?action=desvicular&codigo="+codigo, true);
		xhttp.send();
	}else{
		return false;
	}
}

function home(){
	location.href="index.php";
}