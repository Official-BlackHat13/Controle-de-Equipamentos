function filtrar(busca){
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			
			
			
			if(this.responseText.length > 0){
				//alert(this.responseText);
				var json = JSON.parse(this.responseText);
				var html = '<ul class="list-group">';

					html += '<li class="list-group-item d-flex justify-content-between align-items-center"><b class="text-primary">';

					for(var i = 0; i < json.length; i++)
					{

						//alert(json[i]['nome']);
						html += '<li class="list-group-item text-muted" style="cursor:pointer"><span onclick="get_text(\''+json[i]['lista']+'\',\''+json[i]['patrimonio']+'\')">'+json[i]['lista']+' - '+json[i]['patrimonio']+'</span></li>';

					}

					html += '</ul>';
					if(busca.length == 0){
						document.getElementById('search_result').innerHTML = '';
					}else{
						document.getElementById('search_result').innerHTML = html;
					}
					
			}
		   
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=pesqList&busca="+busca, true);
	xhttp.send();
}

function get_text(nome, cracha){
	document.getElementById('hostname').value = nome;
	document.getElementById('chave').value = cracha;
	document.getElementById('search_result').innerHTML = '';
	document.getElementById('hostname').focus();
}

function sair(){
	document.getElementById('search_result').innerHTML = '';
}




