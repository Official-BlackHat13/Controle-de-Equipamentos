function voltar(){
	location.href="index.php";
}

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
		    alert(this.responseText);	
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