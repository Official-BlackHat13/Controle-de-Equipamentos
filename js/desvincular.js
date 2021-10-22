function voltar(){
	location.href="index.php";
}

function search(patrimonio){
	
	if(patrimonio == "" || patrimonio == null){
		alert('SELECIONE UM EQUIPAMENTO');
		document.getElementById('patrimonio').focus();
		return false;
	}
		
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);	
			document.getElementById('retorno').innerHTML = this.responseText;
			
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=search&patrimonio="+patrimonio, true);
	xhttp.send();
}

function desvicular(id){
	var patrimonio = document.getElementById('id').value;
	var matricula = document.getElementById('rg_'+id).value;
		
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
		xhttp.open("POST", "cadastro_function.php?action=desvincular&patrimonio="+patrimonio+"&matricula="+matricula, true);
		xhttp.send();
	}else{
		return false;
	}
}

function home(){
	location.href="index.php";
}