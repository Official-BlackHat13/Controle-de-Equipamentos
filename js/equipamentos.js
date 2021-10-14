function voltar(){
	location.href="index.php";
}

function carregar(tipo){
	
	if(tipo == "" || tipo == null){
		alert("SELECIONE UM TIPO");
		document.getElementById('tipo').focus();
		return false;
	}
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		    //alert(this.responseText);
			document.getElementById('retorno').innerHTML = 	this.responseText;
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=carregar&tipo="+tipo, true);
	xhttp.send();	
}

function cadastrar(){
	
	var tipo = document.getElementById('tipo').value;
	
	switch(tipo){
	/*	
		case "AP/ANTENA":
			cadAntena(tipo);
		break;
		case "CELULARES":
			cadCelular(tipo);
		break;
		case "COLETOR":
			cadColetor(tipo);
		break;
	*/
		case "COMPUTADOR":
		case "NOTEBOOK":
			cadMaquina(tipo);
		break;
	/*	
		case "IMPRESSORA":
			cadImpressora(tipo);
		break;
		case "LINHAS MOVEIS":
			cadMoveis(tipo);
		break;
		case "MODEM":
			cadModem(tipo);
		break;
		case "MONITOR":
			cadMonitor(tipo);
		break;
		case "PROJETOR":
			cadProjetor(tipo);
		break;
		case "SCANNER":
			cadScanner(tipo);
		break;
		case "SERVIDORES":
			cadServidores(tipo);
		break;
		case "SWITCH":
			cadSwitch(tipo);
		break;
		case "TABLET":
			cadTablet(tipo);
		break;
	*/
	}
	
}


// CADASTRA DESKTOP E NOTEBOOK
function cadMaquina(tipo){
		
	var marca = document.getElementById('marca').value;
	var modelo = document.getElementById('modelo').value;
	var partNumber = document.getElementById('partNumber').value;
	var patrimonio = document.getElementById('patrimonio').value;
	var stat = document.getElementById('status').value;
	var numNF = document.getElementById('numNF').value;
	var dateNF = document.getElementById('dateNF').value;
	var user = document.getElementById('user').value;
	var obs = document.getElementById('obs').value;
	var hostname = document.getElementById('hostname').value;
	//Configurações
	var cpu = document.getElementById('cpu').value;
	var memoria = document.getElementById('memoria').value;
	var hd = document.getElementById('hd').value;
	var value = document.getElementById('flag').checked;
	let flag;
	if(value == true){
		flag = 'Y';
	}else{
		flag = 'N';
	}
			
	if(marca == "" || marca == null){
		alert("PREENCHA UMA MARCA");
		document.getElementById('marca').focus();
		return false;
	}
			
	if(modelo == "" || modelo == null){
		alert("PREENCHA UM MODELO");
		document.getElementById('modelo').focus();
		return false;
	}
			
	if(partNumber == "" || partNumber == null){
		alert("PREENCHA UM PART NUMBER OU SERIAL NUMBER");
		document.getElementById('partNumber').focus();
		return false;
	}
			
	if(patrimonio == "" || patrimonio == null){
		alert("PREENCHA O NÚMERO DO PATRIMÔNIO");
		document.getElementById('patrimonio').focus();
		return false;
	}
	
	if(stat == "" || stat == null){
		alert("SELECIONE UM STATUS");
		document.getElementById('status').focus();
		return false;
	}
	
	if(hostname == "" || hostname == null){
		alert("PREENCHA O HOSTNAME");
		document.getElementById('hostname').focus();
		return false;
	}
	
	if(cpu == "" || cpu == null){
		alert("PREENCHA AS CONFIGURAÇÕES DO PROCESSADOR");
		document.getElementById('cpu').focus();
		return false;
	}
	
	if(memoria == "" || memoria == null){
		alert("PREENCHA AS CONFIGURAÇÕES DA MEMÓRIA");
		document.getElementById('memoria').focus();
		return false;
	}
	
	if(hd == "" || hd == null){
		alert("PREENCHA AS CONFIGURAÇÕES DO HD");
		document.getElementById('hd').focus();
		return false;
	}
	
			
			
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);
			if(this.responseText == "1"){
				alert("CADASTRADO COM SUCESSO");
				location.reload();
			}else{
				alert("ERRO AO CADASTRAR");
			}					
		}
    };
	xhttp.open("POST", "cadastro_function.php?action=equipamento&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&partNumber="+partNumber+"&patrimonio="+patrimonio+"&stat="+stat+"&numNF="+numNF+"&dateNF="+dateNF+"&flag="+flag+"&obs="+obs+"&hostname="+hostname+"&cpu="+cpu+"&memoria="+memoria+"&hd="+hd+"&user="+user, true);
	xhttp.send();
	
}


// Função para autopreencher os dados da transportadora nacional
function autoComplete(str){
	
	var tipo = document.getElementById('tipo').value;
	
	var marca = document.getElementById('marca');
	var modelo = document.getElementById('modelo');
	var partNumber = document.getElementById('partNumber');
	var patrimonio = document.getElementById('patrimonio');
	var stat = document.getElementById('status');
	var numNF = document.getElementById('numNF');
	var dateNF = document.getElementById('dateNF');
	var obs = document.getElementById('obs');
	
	var hostname = document.getElementById('hostname');
	var cpu = document.getElementById('cpu');
	var memoria = document.getElementById('memoria');
	var hd = document.getElementById('hd');
	
	
	var busca = document.getElementById('busca').value;
		
	if(busca != ""){
		marca.value = 'Carregando...';
		modelo.value = 'Carregando...';
		partNumber.value = 'Carregando...';
		patrimonio.value = 'Carregando...';
		stat.value = 'Carregando...';
		numNF.value = 'Carregando...';
		dateNF.value = 'Carregando...';
		obs.value = 'Carregando...';
		hostname.value = 'Carregando...';
		cpu.value = 'Carregando...';
		memoria.value = 'Carregando...';
		hd.value = 'Carregando...';
		
	}
		
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);		
			var json = JSON.parse(this.responseText);
			if(json.tipo == undefined){
				marca.value = "";
				modelo.value = "";
				partNumber.value = "";
				patrimonio.value = "";
				stat.value = "";
				numNF.value = "";
				dateNF.value = "";
				obs.value = "";
				hostname.value = "";
				cpu.value = "";
				memoria.value = "";
				hd.value = "";
				
			}else{
				marca.value = json.marca;
				modelo.value = json.modelo;
				partNumber.value = json.partNumber;
				patrimonio.value = json.patrimonio;
				stat.value = json.stat;
				numNF.value = json.numNF;
				dateNF.value = json.dateNF;
				obs.value = json.obs;
				hostname.value = json.hostname;
				cpu.value = json.cpu;
				memoria.value = json.memoria;
				hd.value = json.hd;
				
				(json.flag == 'Y') ? document.getElementById('flag').checked = true : document.getElementById('flag').checked = false;
				document.getElementById('patrimonio').disabled = true;
			}	
				
		}
	};
	xhttp.open("POST", "cadastro_function.php?action=lista&&busca="+busca+"&id="+str, true);
	xhttp.send();
						
}

//Função para deixar a letra maiuscula
function maiuscula(z){
    v = z.value.toUpperCase();
    z.value = v;
}