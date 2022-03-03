// Função para listar todos os usuários
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
	xhttp.open("POST", "cadastro_function.php?action=todos&perfil="+perfil+"&id_user="+id_user, true);
	xhttp.send();
}

// Função para baixar o relatório
function relatorio(){
	var busca = document.getElementById('filtro').value;
	var setor = document.getElementById('setor').value;
	
	location.href="cadastro_function.php?action=relatorio&busca="+busca+"&setor="+setor, "_blank";
}

function filtrar(){
	var busca = document.getElementById('filtro').value;
	var setor = document.getElementById('setor').value;
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
	xhttp.open("POST", "cadastro_function.php?action=filtrar&busca="+busca+"&setor="+setor+"&perfil="+perfil+"&id_user="+id_user, true);
	xhttp.send();
}

function excluir(id){
	var matricula = document.getElementById('matricula_'+id).value;
	
	var res = confirm("DEJESA CONFIRMAR A EXCLUSÃO?");
	
	if(res == true){
			var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				//alert(this.responseText);
				if(this.responseText == '1'){
					alert("EXCLUÍDO COM SUCESSO");
					location.reload();
				}else if(this.responseText == '2'){
					alert("USUÁRIO NÃO PODE SER EXCLUÍDO, POIS TEM  EQUIPAMENTO(S) VÍNCULADOS A ELE");
				}else{
					alert("ERRO AO EXCLUÍR");
				}
			}
		};
		xhttp.open("POST", "cadastro_function.php?action=excluir&matricula="+matricula, true);
		xhttp.send();
	}
}

function voltar(){
	location.href="cad_usuario.php";
}

function inicio(){
	location.href="index.php";
}

//Função para deixar a letra maiuscula
function maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
}
