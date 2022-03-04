function voltar(){
	location.href="index.php";
}

function search(patrimonio){
	var tipo = document.getElementById('tipo').value;
	
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
	xhttp.open("POST", "cadastro_function.php?action=search&patrimonio="+patrimonio+"&tipo="+tipo, true);
	xhttp.send();
}

function desvicular(id){
	var patrimonio = document.getElementById('id').value;
	var matricula = document.getElementById('rg_'+id).value;
	var stat = document.getElementById('status_'+id).value;
	
	if(stat == "" || stat == null){
		alert('SELECIONE OUTRA OPÇÃO DE STATUS');
		document.getElementById('status_'+id).focus();
		return false;
	}
		
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
		xhttp.open("POST", "cadastro_function.php?action=desvincular&patrimonio="+patrimonio+"&matricula="+matricula+"&status="+stat, true);
		xhttp.send();
	}else{
		return false;
	}
}

function selection(valor){
	document.getElementById('retorno').innerHTML = "";
	
	if(valor == ""){
		document.getElementById('patr2').style.display = "none";
		return false;
	}
	
	document.getElementById("patrimonio").disabled = true;
	var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				
				if(this.responseText != "[]"){
					document.getElementById('patrimonio').options.length = 0;
					var json = JSON.parse(this.responseText);
					
					document.getElementById('patrimonio').options.add(new Option(' -- Selecione um Equipamento -- '));
					
					for (var i=0; i < json.length; ++i) {					
						if(json[i].imei == null){
							if(json[i].hostname == null){
								document.getElementById('patrimonio').options.add(new Option(json[i].patrimonio+' - '+json[i].tipo, json[i].patrimonio));
							}else{
								document.getElementById('patrimonio').options.add(new Option(json[i].patrimonio+' - '+json[i].hostname, json[i].patrimonio));
							}
						}else{
							document.getElementById('patrimonio').options.add(new Option(json[i].patrimonio+' - '+json[i].imei, json[i].patrimonio));
						}
					}
					
					document.getElementById("patrimonio").disabled = false;
					document.getElementById('patr2').style.display = "block";
					
				}else{
					alert("NÃO HÁ EQUIPAMENTO DESSE TIPO PARA VINCULAR");
					document.getElementById('patr2').style.display = "none";
				}
				
			}
		};
		xhttp.open("POST", "cadastro_function.php?action=listDesviculo&busca="+valor, true);
		xhttp.send();
}

function home(){
	location.href="index.php";
}