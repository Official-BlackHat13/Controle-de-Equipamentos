<?php 
function cadAntena($con, $tipo){

}

function cadCelular($con, $tipo){

}


/*
***************************************************************
*                           COLETORES
***************************************************************			
*/
function cadColetor($con, $tipo, $marca, $modelo, $partNumber, $patrimonio, $tempoUso, $stat, $numNF, $dateNF, $obs, $flag, $user){
	$sql = mysqli_query($con,"SELECT case when count(*) = 0 then 1 else count(*) + 1 end qtd FROM equipamentos.equipamentos where tipo = '".$tipo."'")or die(mysqli_error($con));
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
										flag = '".$flag."',
										tempo_uso = '".$tempoUso."',
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
function cadMaquina($con, $tipo, $marca, $modelo, $partNumber, $sn, $patrimonio, $stat, $numNF, $obs, $dateNF, $hostname, $cpu, $memoria, $hd, $flag, $tempoUso, $user){
	$sql = mysqli_query($con,"SELECT case when count(*) = 0 then 1 else count(*) + 1 end qtd FROM equipamentos.equipamentos where tipo = '".$tipo."'")or die(mysqli_error($con));
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
										hd = '".$hd."',
										flag = '".$flag."',
										tempo_uso = '".$tempoUso."',
										user = '".$user."'")or die(mysqli_error($con));
										
	if($insert){
		echo '1';
	}else{
		echo '0';
	}	
	
	mysqli_close($con);
}

function cadImpressora($con, $tipo){

}

function cadLinhasMoveis($con, $tipo){

}

function cadModem($con, $tipo){

}

function cadMonitor($con, $tipo){

}


function cadProjetor($con, $tipo){

}

function cadScanner($con, $tipo){

}

function cadServidores($con, $tipo){

}

function cadSwitch($con, $tipo){

}

function cadTablet($con, $tipo){

}

?>