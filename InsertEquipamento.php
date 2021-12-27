<?php 
function cadAntena($con, $tipo){

}


/*
***************************************************************
*                           CELULARES
***************************************************************			
*/
function cadCelular($con, $tipo, $marca, $modelo, $patrimonio, $tempoUso, $stat, $numNF, $dateNF, $imei, $capinha, $valor, $obs, $flag, $user){
	$sql = mysqli_query($con,"SELECT  
									CASE
										WHEN (select count(*) from equipamentos.equipamentos where patrimonio = '".$patrimonio."') = 1 then 
										(select MID(codigo,9) from equipamentos.equipamentos where patrimonio = '".$patrimonio."')
										WHEN COUNT(*) = 0 THEN  1 
										ELSE count(*) + 1 
									END qtd
								FROM
									equipamentos.equipamentos
								WHERE
									tipo = '".$tipo."'")or die(mysqli_error($con));
	$resSql = mysqli_fetch_array($sql);
	$id = $resSql['qtd'];
	$codigo = substr($tipo, 0, 8).$id;
	
	
	$insert = mysqli_query($con,"insert into equipamentos.equipamentos 
										(
											codigo,
											tipo,
											marca,
											modelo,
											capinha,
											imei,
											patrimonio,
											status,
											nf_compra,
											data_nf,
											obs,
											flag,
											tempo_uso,
											valor,
											user
										)
										values 
										(
											'".$codigo."',
											'".$tipo."',
											'".$marca."',
											'".$modelo."',
											'".$capinha."',
											'".$imei."',
											'".$patrimonio."',
											'".$stat."',
											'".$numNF."',
											'".$dateNF."',
											'".$obs."',
											'".$flag."',
											'".$tempoUso."',
											'".$valor."',
											'".$user."'
										) on duplicate key update
										codigo = '".$codigo."',
										tipo = '".$tipo."',
										marca = '".$marca."',
										modelo = '".$modelo."',
										capinha = '".$capinha."',
										imei = '".$imei."',
										status = '".$stat."',
										nf_compra = '".$numNF."',
										data_nf = '".$dateNF."',
										obs = '".$obs."',
										flag = '".$flag."',
										tempo_uso = '".$tempoUso."',
										valor = '".$valor."',
										cartucho = null,
										ip = null,
										local = null,
										service_tag = null,
										hostname = null,
										cpu = null,
										memoria = null,
										hd = null,
										user = '".$user."'")or die(mysqli_error($con));
										
	if($insert){
		echo '1';
	}else{
		echo mysqli_error($con);
	}	
	
	mysqli_close($con);	
}


/*
***************************************************************
*                           COLETORES
***************************************************************			
*/
function cadColetor($con, $tipo, $marca, $modelo, $partNumber, $sn, $patrimonio, $tempoUso, $stat, $numNF, $dateNF, $valor, $obs, $flag, $user){
	$sql = mysqli_query($con,"SELECT  
									CASE
										WHEN (select count(*) from equipamentos.equipamentos where patrimonio = '".$patrimonio."') = 1 then 
										(select MID(codigo,9) from equipamentos.equipamentos where patrimonio = '".$patrimonio."')
										WHEN COUNT(*) = 0 THEN  1 
										ELSE count(*) + 1 
									END qtd
								FROM
									equipamentos.equipamentos
								WHERE
									tipo = '".$tipo."'")or die(mysqli_error($con));
	$resSql = mysqli_fetch_array($sql);
	$id = $resSql['qtd'];
	$codigo = substr($tipo, 0, 8).$id;
	
	
	$insert = mysqli_query($con,"insert into equipamentos.equipamentos 
										(
											codigo,
											tipo,
											marca,
											modelo,
											part_number,
											service_tag,
											patrimonio,
											status,
											nf_compra,
											data_nf,
											valor,
											obs,
											flag,
											tempo_uso,
											user
										)
										values 
										(
											'".$codigo."',
											'".$tipo."',
											'".$marca."',
											'".$modelo."',
											'".$partNumber."',
											'".$sn."',
											'".$patrimonio."',
											'".$stat."',
											'".$numNF."',
											'".$dateNF."',
											'".$valor."',
											'".$obs."',
											'".$flag."',
											'".$tempoUso."',
											'".$user."'
										) on duplicate key update
										codigo = '".$codigo."',
										tipo = '".$tipo."',
										marca = '".$marca."',
										modelo = '".$modelo."',
										part_number = '".$partNumber."',
										service_tag = '".$sn."',
										status = '".$stat."',
										nf_compra = '".$numNF."',
										valor = '".$valor."',
										data_nf = '".$dateNF."',
										obs = '".$obs."',
										flag = '".$flag."',
										tempo_uso = '".$tempoUso."',
										cartucho = null,
										ip = null,
										imei = null,
										capinha = null,
										local = null,
										hostname = null,
										cpu = null,
										memoria = null,
										hd = null,
										user = '".$user."'")or die(mysqli_error($con));
										
	if($insert){
		echo '1';
	}else{
		echo mysqli_error($con);
	}	
	
	mysqli_close($con);	
	
}


/*
***************************************************************
*                         NOTEBOOK E DESKTOP
***************************************************************			
*/
function cadMaquina($con, $tipo, $marca, $modelo, $partNumber, $patrimonio, $stat, $numNF, $obs, $dateNF, $hostname, $cpu, $memoria, $hd, $valor, $flag, $tempoUso, $user){
	$sql = mysqli_query($con,"SELECT  
									CASE
										WHEN (select count(*) from equipamentos.equipamentos where patrimonio = '".$patrimonio."') = 1 then 
										(select MID(codigo,9) from equipamentos.equipamentos where patrimonio = '".$patrimonio."')
										WHEN COUNT(*) = 0 THEN  1 
										ELSE count(*) + 1 
									END qtd
								FROM
									equipamentos.equipamentos
								WHERE
									tipo = '".$tipo."'")or die(mysqli_error($con));
	
	
	$resSql = mysqli_fetch_array($sql);
	$id = $resSql['qtd'];
	$codigo = substr($tipo, 0, 8).$id;
	
	$insert = mysqli_query($con,"insert into equipamentos.equipamentos 
										(
											codigo,
											tipo,
											marca,
											modelo,
											part_number,
											patrimonio,
											status,
											nf_compra,
											data_nf,
											obs,
											hostname,
											cpu,
											memoria,
											hd,
											valor,
											flag,
											tempo_uso,
											user
										)
										values 
										(
											'".$codigo."',
											'".$tipo."',
											'".$marca."',
											'".$modelo."',
											'".$partNumber."',
											'".$patrimonio."',
											'".$stat."',
											'".$numNF."',
											'".$dateNF."',
											'".$obs."',
											'".$hostname."',
											'".$cpu."',
											'".$memoria."',
											'".$hd."',
											'".$valor."',
											'".$flag."',
											'".$tempoUso."',
											'".$user."'
										) on duplicate key update
										tipo = '".$tipo."',
										marca = '".$marca."',
										modelo = '".$modelo."',
										part_number = '".$partNumber."',
										status = '".$stat."',
										nf_compra = '".$numNF."',
										data_nf = '".$dateNF."',
										obs = '".$obs."',
										hostname = '".$hostname."',
										cpu = '".$cpu."',
										memoria = '".$memoria."',
										valor = '".$valor."',
										hd = '".$hd."',
										flag = '".$flag."',
										tempo_uso = '".$tempoUso."',
										cartucho = null,
										ip = null,
										imei = null,
										capinha = null,
										local = null,
										service_tag = null,
										user = '".$user."'")or die(mysqli_error($con));
										
	if($insert){
		echo '1';
	}else{
		echo mysqli_error($con);
	}	
	
	mysqli_close($con);
}


/*
***************************************************************
*                        IMPRESSORA
***************************************************************			
*/
function cadImpressora($con, $tipo, $marca, $modelo, $patrimonio, $tempoUso, $stat, $numNF, $obs, $ip, $cartucho, $flag, $dateNF, $valor, $local, $user){
	$sql = mysqli_query($con,"SELECT  
									CASE
										WHEN (select count(*) from equipamentos.equipamentos where patrimonio = '".$patrimonio."') = 1 then 
										(select MID(codigo,9) from equipamentos.equipamentos where patrimonio = '".$patrimonio."')
										WHEN COUNT(*) = 0 THEN  1 
										ELSE count(*) + 1 
									END qtd
								FROM
									equipamentos.equipamentos
								WHERE
									tipo = '".$tipo."'")or die(mysqli_error($con));
	$resSql = mysqli_fetch_array($sql);
	$id = $resSql['qtd'];
	$codigo = substr($tipo, 0, 8).$id;
	
	$insert = mysqli_query($con,"insert into equipamentos.equipamentos 
										(
											codigo,
											tipo,
											marca,
											modelo,
											patrimonio,
											status,
											nf_compra,
											data_nf,
											obs,
											flag,
											tempo_uso,
											ip,
											cartucho,
											local,
											valor,
											user
										)
										values 
										(
											'".$codigo."',
											'".$tipo."',
											'".$marca."',
											'".$modelo."',
											'".$patrimonio."',
											'".$stat."',
											'".$numNF."',
											'".$dateNF."',
											'".$obs."',
											'".$flag."',
											'".$tempoUso."',
											'".$ip."',
											'".$cartucho."',
											'".$local."',
											'".$valor."',
											'".$user."'
										) on duplicate key update
										codigo = '".$codigo."',
										tipo = '".$tipo."',
										marca = '".$marca."',
										modelo = '".$modelo."',
										status = '".$stat."',
										nf_compra = '".$numNF."',
										data_nf = '".$dateNF."',
										obs = '".$obs."',
										flag = '".$flag."',
										tempo_uso = '".$tempoUso."',
										cartucho = '".$cartucho."',
										valor = '".$valor."',
										ip = '".$ip."',
										local = '".$local."',
										imei = null,
										capinha = null,
										service_tag = null,
										hostname = null,
										cpu = null,
										memoria = null,
										part_number = null,
										hd = null,
										user = '".$user."'")or die(mysqli_error($con));
										
	if($insert){
		echo '1';
	}else{
		echo '0';
	}	
	
	mysqli_close($con);
}

function cadLinhasMoveis($con, $tipo, $patrimonio, $stat, $valor, $plano, $flag, $obs, $user){

	$sql = mysqli_query($con,"SELECT  
									CASE
										WHEN (select count(*) from equipamentos.equipamentos where patrimonio = '".$patrimonio."') = 1 then 
										(select MID(codigo,9) from equipamentos.equipamentos where patrimonio = '".$patrimonio."')
										WHEN COUNT(*) = 0 THEN  1 
										ELSE count(*) + 1 
									END qtd
								FROM
									equipamentos.equipamentos
								WHERE
									tipo = '".$tipo."'")or die(mysqli_error($con));
	$resSql = mysqli_fetch_array($sql);
	$id = $resSql['qtd'];
	$codigo = substr($tipo, 0, 8).$id;
	
	$insert = mysqli_query($con,"insert into equipamentos.equipamentos 
										(
											codigo,
											tipo,
											marca,
											modelo,
											patrimonio,
											status,
											nf_compra,
											data_nf,
											obs,
											flag,
											tempo_uso,
											ip,
											cartucho,
											local,
											valor,
											plano,
											user
										)
										values 
										(
											'".$codigo."',
											'".$tipo."',
											'--',
											'--',
											'".$patrimonio."',
											'".$stat."',
											'--',
											'--',
											'".$obs."',
											'".$flag."',
											'--',
											'--',
											'--',
											'--',
											'".$valor."',
											'".$plano."',
											'".$user."'
										) on duplicate key update
										codigo = '".$codigo."',
										tipo = '".$tipo."',
										status = '".$stat."',
										obs = '".$obs."',
										valor = '".$valor."',
										flag = '".$flag."',
										plano = '".$plano."',
										imei = null,
										capinha = null,
										service_tag = null,
										hostname = null,
										cpu = null,
										memoria = null,
										part_number = null,
										hd = null,
										user = '".$user."'")or die(mysqli_error($con));
										
	if($insert){
		echo '1';
	}else{
		echo '0';
	}	
	
	mysqli_close($con);

}

function cadModem($con, $tipo){

}

function cadMonitor($con, $tipo){

}


/*
***************************************************************
*                        PROJETOR
***************************************************************			
*/
function cadProjetor($con, $tipo, $marca, $modelo, $patrimonio, $tempoUso, $stat, $numNF, $obs, $local, $sn, $valor, $flag, $dateNF, $user){	
	$sql = mysqli_query($con,"SELECT  
									CASE
										WHEN (select count(*) from equipamentos.equipamentos where patrimonio = '".$patrimonio."') = 1 then 
										(select MID(codigo,9) from equipamentos.equipamentos where patrimonio = '".$patrimonio."')
										WHEN COUNT(*) = 0 THEN  1 
										ELSE count(*) + 1 
									END qtd
								FROM
									equipamentos.equipamentos
								WHERE
									tipo = '".$tipo."'")or die(mysqli_error($con));
	$resSql = mysqli_fetch_array($sql);
	$id = $resSql['qtd'];
	$codigo = substr($tipo, 0, 8).$id;
	
	$insert = mysqli_query($con,"insert into equipamentos.equipamentos 
										(
											codigo,
											tipo,
											marca,
											modelo,
											patrimonio,
											status,
											nf_compra,
											data_nf,
											obs,
											flag,
											tempo_uso,
											service_tag,
											local,
											valor,
											user
										)
										values 
										(
											'".$codigo."',
											'".$tipo."',
											'".$marca."',
											'".$modelo."',
											'".$patrimonio."',
											'".$stat."',
											'".$numNF."',
											'".$dateNF."',
											'".$obs."',
											'".$flag."',
											'".$tempoUso."',
											'".$sn."',
											'".$local."',
											'".$valor."',
											'".$user."'
										) on duplicate key update
										codigo = '".$codigo."',
										tipo = '".$tipo."',
										marca = '".$marca."',
										modelo = '".$modelo."',
										status = '".$stat."',
										nf_compra = '".$numNF."',
										data_nf = '".$dateNF."',
										obs = '".$obs."',
										flag = '".$flag."',
										tempo_uso = '".$tempoUso."',
										service_tag = '".$sn."',
										local = '".$local."',
										valor = '".$valor."',
										imei = null,
										capinha = null,
										ip = null,
										hostname = null,
										cpu = null,
										memoria = null,
										part_number = null,
										hd = null,
										user = '".$user."'")or die(mysqli_error($con));
										
	if($insert){
		echo '1';
	}else{
		echo '0';
	}	
	
	mysqli_close($con);
}


function cadServidores($con, $tipo){

}

function cadSwitch($con, $tipo){

}

function cadTablet($con, $tipo){

}

?>