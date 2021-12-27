function voltar(){
	location.href="index.php";
}

function tempoUso(){
	//Alterar o - pela / para fazer o calculo
	var dtNf = document.getElementById('dateNF').value;
	dtNf = dtNf.replaceAll("-","/");
	var date1 = new Date();
	var date2 = new Date(dtNf);
	var timeDiff = Math.abs(date1.getTime() - date2.getTime());
	var diffDays = (timeDiff / (1000 * 3600 * 24)); 
	var diffDays = (diffDays / 365); 
	document.getElementById('tempoUso').value = diffDays.toFixed(2);
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
	
	//alert(tipo);
	
	if(!tipo){
		alert('SELECIONE UM TIPO');
		document.getElementById('tipo').focus();
		return false;
	}
		
	switch(tipo){
	/*	
		case "AP/ANTENA":
			cadAntena(tipo);
		break;
	*/
		case "CELULARES":
			cadCelular(tipo);
		break;
		case "COLETOR":
			cadColetor(tipo);
		break;
		case "DESKTOP":
		case "NOTEBOOK":
		case "AIO":
			cadMaquina(tipo);
		break;
		case "IMPRESSORA":
			cadImpressora(tipo);
		break;
		case "PROJETOR":
		case "SCANNER":
			cadProjetor(tipo);
		break;
		case "LINHAS MOVEIS":
			cadMoveis(tipo);
		break;
    /*
		case "MODEM":
			cadModem(tipo);
		break;
		case "MONITOR":
			cadMonitor(tipo);
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

function cadMoveis(tipo){
	var patrimonio = document.getElementById('patrimonio').value;
	var valor = document.getElementById('valor').value;
	var stat = document.getElementById('status').value;
	var obs = document.getElementById('obs').value;
	var plano = document.getElementById('plano').value;
	var user = document.getElementById('user').value;
	var pattern = /^[0-9]*\.?[0-9]*$/;
	var validVal = pattern.test(valor);
	var value = document.getElementById('flag').checked;
	let flag;
	if(value == true){
		flag = 'Y';
	}else{
		flag = 'N';
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
	
	if(plano == "" || plano == null){
		alert("PREENCHA O CAMPO PLANO");
		document.getElementById('plano').focus();
		return false;
	}
	
	if(validVal == false){
		alert("PREENCHA O CAMPO VALOR APENAS COM NÚMEROS E PONTO");
		document.getElementById('valor').focus();
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
	xhttp.open("POST", "cadastro_function.php?action=equipamento&tipo="+tipo+"&patrimonio="+patrimonio+"&stat="+stat+"&obs="+obs+"&valor="+valor+"&flag="+flag+"&plano="+plano+"&user="+user, true);
	xhttp.send();
	
	
}


// CADASTRA DESKTOP, NOTEBOOK E AIO
function cadMaquina(tipo){
	var tempoUso = document.getElementById('tempoUso').value;		
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
	var valor = document.getElementById('valor').value;
	//Configurações
	var cpu = document.getElementById('cpu').value;
	var memoria = document.getElementById('memoria').value;
	var hd = document.getElementById('hd').value;
	var value = document.getElementById('flag').checked;
	let flag;
	var pattern = /^[0-9]*\.?[0-9]*$/;
	var validVal = pattern.test(valor);
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
	
	if(validVal == false){
		alert("PREENCHA O CAMPO VALOR APENAS COM NÚMEROS E PONTO");
		document.getElementById('valor').focus();
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
	xhttp.open("POST", "cadastro_function.php?action=equipamento&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&partNumber="+partNumber+"&patrimonio="+patrimonio+"&stat="+stat+"&numNF="+numNF+"&dateNF="+dateNF+"&flag="+flag+"&obs="+obs+"&hostname="+hostname+"&cpu="+cpu+"&memoria="+memoria+"&hd="+hd+"&tempoUso="+tempoUso+"&valor="+valor+"&user="+user, true);
	xhttp.send();
	
}

// Cadastro de Coletores
function cadColetor(tipo){
	var patrimonio = document.getElementById('patrimonio').value;
	var marca = document.getElementById('marca').value;
	var modelo = document.getElementById('modelo').value;
	var partNumber = document.getElementById('partNumber').value;
	var sn = document.getElementById('sn').value;
	var stat = document.getElementById('status').value;
	var obs = document.getElementById('obs').value;
	var numNF = document.getElementById('numNF').value;
	var dateNF = document.getElementById('dateNF').value;
	var tempoUso = document.getElementById('tempoUso').value;
	var valor = document.getElementById('valor').value;	
	var user = document.getElementById('user').value;
	var value = document.getElementById('flag').checked;
	var pattern = /^[0-9]*\.?[0-9]*$/;
	var validVal = pattern.test(valor);
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
		alert("PREENCHA O PN");
		document.getElementById('partNumber').focus();
		return false;
	}
	
	if(sn == "" || sn == null){
		alert("PREENCHA O SN");
		document.getElementById('sn').focus();
		return false;
	}
	
	if(stat == "" || stat == null){
		alert("SELECIONE UM STATUS");
		document.getElementById('status').focus();
		return false;
	}
			
	if(patrimonio == "" || patrimonio == null){
		alert("PREENCHA O NÚMERO DO PATRIMÔNIO");
		document.getElementById('patrimonio').focus();
		return false;
	}
	
	if(validVal == false){
		alert("PREENCHA O CAMPO VALOR APENAS COM NÚMEROS E PONTO");
		document.getElementById('valor').focus();
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
	xhttp.open("POST", "cadastro_function.php?action=equipamento&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&partNumber="+partNumber+"&patrimonio="+patrimonio+"&stat="+stat+"&obs="+obs+"&flag="+flag+"&numNF="+numNF+"&dateNF="+dateNF+"&sn="+sn+"&tempoUso="+tempoUso+"&valor="+valor+"&user="+user, true);
	xhttp.send();
}

// Cadastro de Celulares
function cadCelular(tipo){
	var patrimonio = document.getElementById('patrimonio').value;
	var marca = document.getElementById('marca').value;
	var modelo = document.getElementById('modelo').value;
	var capinha = document.getElementById('capinha').value;
	var imei = document.getElementById('imei').value;
	var stat = document.getElementById('status').value;
	var valor = document.getElementById('valor').value;
	var obs = document.getElementById('obs').value;
	var numNF = document.getElementById('numNF').value;
	var dateNF = document.getElementById('dateNF').value;
	var tempoUso = document.getElementById('tempoUso').value;	
	var user = document.getElementById('user').value;
	var value = document.getElementById('flag').checked;
	let flag;
	var pattern = /^[0-9]*\.?[0-9]*$/;
	var validVal = pattern.test(valor);
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
	
				
	if(capinha == "" || capinha == null){
		alert("SELECIONE UMA OPÇÃO");
		document.getElementById('capinha').focus();
		return false;
	}
	
	if(imei == "" || imei == null){
		alert("PREENCHA O NÚMERO DO IMEI");
		document.getElementById('imei').focus();
		return false;
	}
	
	if(stat == "" || stat == null){
		alert("SELECIONE UM STATUS");
		document.getElementById('status').focus();
		return false;
	}
			
	if(patrimonio == "" || patrimonio == null){
		alert("PREENCHA O NÚMERO DO PATRIMÔNIO");
		document.getElementById('patrimonio').focus();
		return false;
	}
	
	if(validVal == false){
		alert("PREENCHA O CAMPO VALOR APENAS COM NÚMEROS E PONTO");
		document.getElementById('valor').focus();
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
	xhttp.open("POST", "cadastro_function.php?action=equipamento&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&capinha="+capinha+"&patrimonio="+patrimonio+"&stat="+stat+"&obs="+obs+"&flag="+flag+"&numNF="+numNF+"&dateNF="+dateNF+"&imei="+imei+"&tempoUso="+tempoUso+"&valor="+valor+"&user="+user, true);
	xhttp.send();
}

// Cadastro de Impressora
function cadImpressora(tipo){
	var patrimonio = document.getElementById('patrimonio').value;
	var marca = document.getElementById('marca').value;
	var modelo = document.getElementById('modelo').value;
	var cartucho = document.getElementById('cartucho').value;
	var ip = document.getElementById('ip').value;
	var valor = document.getElementById('valor').value;
	var local = document.getElementById('local').value;
	var stat = document.getElementById('status').value;
	var obs = document.getElementById('obs').value;
	var numNF = document.getElementById('numNF').value;
	var dateNF = document.getElementById('dateNF').value;
	var tempoUso = document.getElementById('tempoUso').value;	
	var user = document.getElementById('user').value;
	var value = document.getElementById('flag').checked;
	let flag;
	var pattern = /^[0-9]*\.?[0-9]*$/;
	var validVal = pattern.test(valor);
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
				
	if(cartucho == "" || cartucho == null){
		alert("PREENCHA UM INFORMAÇÃO DO ITEM");
		document.getElementById('cartucho').focus();
		return false;
	}
	
	if(ip == "" || ip == null){
		alert("PREENCHA O NÚMERO DO IP");
		document.getElementById('ip').focus();
		return false;
	}
	
	if(stat == "" || stat == null){
		alert("SELECIONE UM STATUS");
		document.getElementById('status').focus();
		return false;
	}
			
	if(patrimonio == "" || patrimonio == null){
		alert("PREENCHA O NÚMERO DO PATRIMÔNIO");
		document.getElementById('patrimonio').focus();
		return false;
	}
	
	if(local == "" || local == null){
		alert("PREENCHA O LOCAL");
		document.getElementById('local').focus();
		return false;
	}
	
	if(validVal == false){
		alert("PREENCHA O CAMPO VALOR APENAS COM NÚMEROS E PONTO");
		document.getElementById('valor').focus();
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
	xhttp.open("POST", "cadastro_function.php?action=equipamento&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&cartucho="+cartucho+"&patrimonio="+patrimonio+"&stat="+stat+"&obs="+obs+"&flag="+flag+"&numNF="+numNF+"&dateNF="+dateNF+"&ip="+ip+"&local="+local+"&tempoUso="+tempoUso+"&valor="+valor+"&user="+user, true);
	xhttp.send();
}

// Cadastro de Projetores e Scanners
function cadProjetor(tipo){
	var patrimonio = document.getElementById('patrimonio').value;
	var marca = document.getElementById('marca').value;
	var modelo = document.getElementById('modelo').value;
	var sn = document.getElementById('sn').value;
	var local = document.getElementById('local').value;
	var stat = document.getElementById('status').value;
	var obs = document.getElementById('obs').value;
	var valor = document.getElementById('valor').value;
	var numNF = document.getElementById('numNF').value;
	var dateNF = document.getElementById('dateNF').value;
	var tempoUso = document.getElementById('tempoUso').value;	
	var user = document.getElementById('user').value;
	var value = document.getElementById('flag').checked;
	let flag;
	var pattern = /^[0-9]*\.?[0-9]*$/;
	var validVal = pattern.test(valor);
	if(value == true){
		flag = 'Y';
	}else{
		flag = 'N';
	}
	
	if(patrimonio == "" || patrimonio == null){
		alert("PREENCHA O NÚMERO DO PATRIMÔNIO");
		document.getElementById('patrimonio').focus();
		return false;
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
	
	if(sn == "" || sn == null){
		alert("PREENCHA O SN");
		document.getElementById('sn').focus();
		return false;
	}
	
	if(local == "" || local == null){
		alert("PREENCHA O LOCAL");
		document.getElementById('local').focus();
		return false;
	}
	
	if(stat == "" || stat == null){
		alert("SELECIONE UM STATUS");
		document.getElementById('status').focus();
		return false;
	}
	
	if(validVal == false){
		alert("PREENCHA O CAMPO VALOR APENAS COM NÚMEROS E PONTO");
		document.getElementById('valor').focus();
		return false;
	}
		
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert(this.responseText);
			if(this.responseText == "1"){
				alert("CADASTRADO COM SUCESSO");
				location.reload();
			}else{
				alert("ERRO AO CADASTRAR");
			}					
		}
    };
	xhttp.open("POST", "cadastro_function.php?action=equipamento&tipo="+tipo+"&marca="+marca+"&modelo="+modelo+"&sn="+sn+"&patrimonio="+patrimonio+"&stat="+stat+"&obs="+obs+"&flag="+flag+"&numNF="+numNF+"&dateNF="+dateNF+"&local="+local+"&tempoUso="+tempoUso+"&valor="+valor+"&user="+user, true);
	xhttp.send();
}


// Função para autopreencher os dados da transportadora nacional
function autoComplete(str){
	
	var tipo = document.getElementById('tipo').value;
	var patrimonio = document.getElementById('patrimonio');
	var stat = document.getElementById('status');
	var valor = document.getElementById('valor');
	var obs = document.getElementById('obs');
	if(tipo != "LINHAS MOVEIS"){
		var tempoUso = document.getElementById('tempoUso');
		var marca = document.getElementById('marca');
		var modelo = document.getElementById('modelo');
		var numNF = document.getElementById('numNF');
		var dateNF = document.getElementById('dateNF');
	}else{
		var plano = document.getElementById('plano');
	}
			
	if(tipo == "DESKTOP" || tipo == "AIO" || tipo == "NOTEBOOK"){
		var hostname = document.getElementById('hostname');
		var cpu = document.getElementById('cpu');
		var memoria = document.getElementById('memoria');
		var hd = document.getElementById('hd');
		var partNumber = document.getElementById('partNumber');
	}
	
	if(tipo == "COLETOR"){
		var sn = document.getElementById('sn');
		var partNumber = document.getElementById('partNumber');
	}
	
	if(tipo == "CELULARES"){
		var imei = document.getElementById('imei');	
		var capinha = document.getElementById('capinha');	
	}
	
	if(tipo == "IMPRESSORA"){
		var ip = document.getElementById('ip');	
		var cartucho = document.getElementById('cartucho');	
		var local = document.getElementById('local');	
	}
	
	if(tipo == "PROJETOR"){
		var sn = document.getElementById('sn');	
		var local = document.getElementById('local');	
	}
	
	
	var busca = document.getElementById('busca').value;
			
	if(busca != ""){
		patrimonio.value = 'Carregando...';
		stat.value = 'Carregando...';
		obs.value = 'Carregando...';
		valor.value = 'Carregando...';
		
		if(tipo != "LINHAS MOVEIS"){
			marca.value = 'Carregando...';
			modelo.value = 'Carregando...';
			numNF.value = 'Carregando...';
			dateNF.value = 'Carregando...';
			tempoUso.value = 'Carregando...';
		}else{
			plano.value = 'Carregando...';
		}
			
		
		if(tipo == "DESKTOP" || tipo == "AIO" || tipo == "NOTEBOOK"){
			hostname.value = 'Carregando...';
			cpu.value = 'Carregando...';
			memoria.value = 'Carregando...';
			hd.value = 'Carregando...';
			partNumber.value = 'Carregando...';
		}
		
		if(tipo == "COLETOR"){
			sn.value = 'Carregando...';
			partNumber.value = 'Carregando...';
		}
		
		if(tipo == "CELULARES"){
			imei.value = 'Carregando...';
			capinha.value = 'Carregando...';
		}
		
		if(tipo == "IMPRESSORA"){
			ip.value = 'Carregando...';
			cartucho.value = 'Carregando...';
			local.value = 'Carregando...';
		}
		
		if(tipo == "PROJETOR"){
			sn.value = 'Carregando...';	
			local.value = 'Carregando...';		
		}
	}
		
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	if (this.readyState == 4 && this.status == 200) {
			//alert(this.responseText);		
			var json = JSON.parse(this.responseText);
			if(json.tipo == undefined){
				patrimonio.value = "";
				stat.value = "";
				obs.value = "";
				valor.value = "";
				
				if(tipo != "LINHAS MOVEIS"){
					marca.value = "";
					modelo.value = "";
					numNF.value = "";
					dateNF.value = "";
					tempoUso.value = "";
				}else{
					plano.value = "";
				}
		
				if(tipo == "DESKTOP" || tipo == "AIO" || tipo == "NOTEBOOK"){
					hostname.value = "";
					cpu.value = "";
					memoria.value = "";
					hd.value = "";
					partNumber.value = "";
				}

				if(tipo == "COLETOR"){
					sn.value = "";
					partNumber.value = "";
				}
				
				if(tipo == "CELULARES"){
					imei.value = "";
					capinha.value = "";
				}
				
				if(tipo == "IMPRESSORA"){
					ip.value = "";
					cartucho.value = "";
					local.value = "";
				}
				
				if(tipo == "PROJETOR"){
					sn.value = "";
					local.value = "";	
				}
			}else{
				
				
				patrimonio.value = json.patrimonio;
				document.getElementById(json.stat.toUpperCase()).selected = true;
				obs.value = json.obs;
				valor.value = json.valor;

				if(tipo != "LINHAS MOVEIS"){
					marca.value = json.marca;
					modelo.value = json.modelo;
					numNF.value = json.numNF;
					dateNF.value = json.dateNF;
					tempoUso.value = json.tempoUso;
				}else{
					plano.value = json.plano;
				}
				
				if(tipo == "DESKTOP" || tipo == "AIO" || tipo == "NOTEBOOK"){
					hostname.value = json.hostname;
					cpu.value = json.cpu;
					memoria.value = json.memoria;
					hd.value = json.hd;
					partNumber.value = json.partNumber;
				}
				
				if(tipo == "COLETOR"){
					sn.value = json.serviceTag;
					partNumber.value = json.partNumber;
				}
				
				if(tipo == "CELULARES"){
					imei.value = json.imei;
					document.getElementById(json.capinha.toUpperCase()).selected = true;
				}
				
				if(tipo == "IMPRESSORA"){
					ip.value = json.ip;
					cartucho.value = json.cartucho;
					local.value = json.local;
				}
				
				if(tipo == "PROJETOR" || tipo == "SCANNER"){
					sn.value = json.serviceTag;
					local.value = json.local;
				}
			
			
				if(json.vinculo != 0){
					document.getElementById('status').disabled = true;
				}else{
					document.getElementById('status').disabled = false;
				}
			
				
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