var expanded = false;

// Função para mostrar e ocultar a lista de equipamentos
function showCheckboxes() {  
    var checkboxes = document.getElementById("checkboxes");
    if(!expanded) {
        checkboxes.style.display = "block";
        expanded = true;
    }else{
        checkboxes.style.display = "none";
        expanded = false;
    }         
}
        
// Função para obter os dados a lista de equipamentos em matriz
function getValue(p){
    var lista = [];
    let inputs = document.getElementsByClassName("lista");
	var equipamentos = document.getElementById("equipamentos");
    if(inputs[p].checked){
        inputs[p].checked = false;
    }else{
        inputs[p].checked = true;
    }
                    
    for(let i = 0; i < inputs.length; i++){
        if(inputs[i].checked){
            lista.push(inputs[i].value);
        }                
    }

    equipamentos.value = lista;
}

// Função para salvar os dados da solicitação na base
function salvarPedido(){
	var user = document.getElementById("user").value;
	var equipamentos = document.getElementById("equipamentos").value;
	var usuario = document.getElementById("usuario").value;
	var obs = document.getElementById("obs").value;
	
	if(equipamentos == "" || equipamentos == null){
		alert("SELECIONE UM EQUIPAMENTO");
		document.getElementById("listas").focus();
		return false;
	}
	
	if(usuario == "" || usuario == null){
		alert("SELECIONE UM COLABORADOR");
		document.getElementById("usuario").focus();
		return false;
	}
	
	document.getElementById("cadastrar").disabled = true;
	document.getElementById("cadastrar").value = "    Aguarde...   ";
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    alert(this.responseText);
			location.reload();
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=saveOrder&usuario="+usuario+"&equipamentos="+equipamentos+"&obs="+obs+"&user="+user, true);
	xhttp.send();
	
}


function voltar(){
	location.href="index.php";
}