function voltar(){
	location.href="index.php";
}

function pesquisa(str){
	
	if(str == 1){
		var user = document.getElementById('user').value;
		var hostname = document.getElementById('hostname').value;
		var machine = document.getElementById('machine').value;
		var id = document.getElementById('id').value;
		
		if(machine == ""  && user == "" && id == "" && hostname == ""){
			alert("NENHUM VALOR FOI SELECIONADO");
			document.getElementById('id').focus();
			return false;
		}
		
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);	
				document.getElementById('lista').innerHTML = this.responseText;
				
			}
		};
		xhttp.open("POST", "cadastro_function.php?action=pesquisa&machine="+machine+"&hostname="+hostname+"&user="+user+"&id="+id+"&str="+str, true);
		xhttp.send();
	}else{
		var user = document.getElementById('user').value;
		
		if(user == ""){
			alert("NENHUM VALOR FOI SELECIONADO");
			document.getElementById('user').focus();
			return false;
		}
		
		
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);	
				document.getElementById('lista').innerHTML = this.responseText;
				
			}
		};
		xhttp.open("POST", "cadastro_function.php?action=pesquisa&user="+user+"&str="+str, true);
		xhttp.send();
	}
		
	
		
}

function exportar(str){
	var action = "exportar";
	
	if(str == 1){
		var machine = document.getElementById('machine').value;
		var hostname = document.getElementById('hostname').value;
		var user = document.getElementById('user').value;
		var id = document.getElementById('id').value;
		
		if(machine == ""  && user == "" && id == "" && hostname == ""){
			alert("NENHUM VALOR FOI SELECIONADO");
			document.getElementById('id').focus();
			return false;
		}
		
		location.href="cadastro_function.php?action="+action+"&hostname="+hostname+"&machine="+machine+"&user="+user+"&id="+id+"&str="+str, "_blank";	
	}else{
		var user = document.getElementById('user').value;
		
		if(user == ""){
			alert("NENHUM VALOR FOI SELECIONADO");
			document.getElementById('user').focus();
			return false;
		}
		
		location.href="cadastro_function.php?action="+action+"&user="+user+"&str="+str, "_blank";	
	}
		
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