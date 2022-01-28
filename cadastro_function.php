<?php 
$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];

//CARREGA A TELA DE CADASTRO APARTIR DO TIPO SELECIONADO
if($action == "carregar"){
	require_once("EquipamentosForm.php");
	$tipo = str_replace(" ","",$_REQUEST['tipo']);
	
	switch($tipo){
		case "AP/ANTENA":
		  tipoAntena($con, $tipo);
		break;
		case "CELULARES":
		  tipoCelular($con, $tipo);
		break;
		case "COLETOR":
		  tipoColetor($con, $tipo);
		break; 
		case "DESKTOP":
		case "NOTEBOOK":
		case "AIO":
		  tipoMaquinas($con, $tipo);
		break; 
		case "IMPRESSORA":
		  tipoImpressora($con, $tipo);
		break; 
		case "LINHASMOVEIS":
		  $tipo = $_REQUEST['tipo'];
		  tipoLinhasMoveis($con, $tipo);
		break;
		case "MODEM":
		  tipoModem($con, $tipo);
		break;
		case "MONITOR":
		  tipoMonitor($con, $tipo);
		break;
		case "PROJETOR":
		case "SCANNER":
		  tipoProjetor($con, $tipo);
		break;
		case "SERVIDORES":
		  tipoServidores($con, $tipo);
		break;
		case "SWITCH":
		  tipoSwitch($con, $tipo);
		break;
		case "TABLET":
		  tipoTablet($con, $tipo);
		break;
		default:
			echo "<h1>Tipo não inválido</h1>";
	}	
}

//CADASTRO DE EQUIPAMENTO
if($action == "equipamento"){
	require_once("InsertEquipamento.php");
	
	$user   = $_REQUEST['user'];
	$tipo   = str_replace(" ","",$_REQUEST['tipo']);
	
		
	switch($tipo){
		case "AP/ANTENA":
		  cadAntena(
			$con, 
			$tipo
		  );
		break;
		case "CELULARES":
		    $marca  = utf8_decode($_REQUEST['marca']);
		    $modelo = utf8_decode($_REQUEST['modelo']);
		    $patrimonio = utf8_decode($_REQUEST['patrimonio']);
			$tempoUso = $_REQUEST['tempoUso'];
			$valor = $_REQUEST['valor'];
			$stat = utf8_decode($_REQUEST['stat']);
			$numNF = utf8_decode($_REQUEST['numNF']);
			$dateNF = ($_REQUEST['dateNF'] != "") ? date_create($_REQUEST['dateNF']) : "";
			if($dateNF != ""){
				$dateNF = date_format($dateNF, "d/m/Y");
			}
			$imei = utf8_decode($_REQUEST['imei']);
			$capinha = utf8_decode($_REQUEST['capinha']);
			$obs = utf8_decode($_REQUEST['obs']);
			$flag = $_REQUEST['flag'];
			cadCelular(
			  $con, 
			  $tipo,
			  $marca,
			  $modelo,
			  $patrimonio,
			  $tempoUso,
			  $stat,
			  $numNF,
			  $dateNF,
			  $imei,
			  $capinha,
			  $valor,
			  $obs,
			  $flag,
			  $user
			);
		break;
		case "COLETOR":
		    $marca  = utf8_decode($_REQUEST['marca']);
			$modelo = utf8_decode($_REQUEST['modelo']);
			$partNumber = utf8_decode($_REQUEST['partNumber']);
			$sn = utf8_decode($_REQUEST['sn']);
			$patrimonio = utf8_decode($_REQUEST['patrimonio']);
			$tempoUso = $_REQUEST['tempoUso'];
			$valor = $_REQUEST['valor'];
			$stat = utf8_decode($_REQUEST['stat']);
			$numNF = utf8_decode($_REQUEST['numNF']);
			$dateNF = ($_REQUEST['dateNF'] != "") ? date_create($_REQUEST['dateNF']) : "";
			if($dateNF != ""){
				$dateNF = date_format($dateNF, "d/m/Y");
			}
			$obs = utf8_decode($_REQUEST['obs']);
			$flag = $_REQUEST['flag'];
			cadColetor(
				$con, 
				$tipo,
				$marca,
			    $modelo,
			    $partNumber,
			    $sn,
			    $patrimonio,
				$tempoUso,
				$stat,
				$numNF,
				$dateNF,
				$valor,
				$obs,
				$flag,
				$user
			);
		break; 
		case "DESKTOP":
		case "NOTEBOOK":
		case "AIO":
		    $marca  = utf8_decode($_REQUEST['marca']);
			$modelo = utf8_decode($_REQUEST['modelo']);
			$partNumber = utf8_decode($_REQUEST['partNumber']);
			$patrimonio = utf8_decode($_REQUEST['patrimonio']);
			$tempoUso = $_REQUEST['tempoUso'];
			$valor = $_REQUEST['valor'];
			$stat = utf8_decode($_REQUEST['stat']);
			$numNF = utf8_decode($_REQUEST['numNF']);
			$obs = utf8_decode($_REQUEST['obs']);
			$hostname = utf8_decode($_REQUEST['hostname']);
			$cpu = utf8_decode($_REQUEST['cpu']);
			$memoria = utf8_decode($_REQUEST['memoria']);
			$hd = utf8_decode($_REQUEST['hd']);
			$flag = $_REQUEST['flag'];
			$dateNF = ($_REQUEST['dateNF'] != "") ? date_create($_REQUEST['dateNF']) : "";
			if($dateNF != ""){
				$dateNF = date_format($dateNF, "d/m/Y");
			}
			cadMaquina(
				$con, 
				$tipo,
				$marca,
				$modelo,
				$partNumber,
				$patrimonio,
				$stat,
				$numNF,
				$obs,
				$dateNF,
				$hostname,
				$cpu,
				$memoria,
				$hd,
				$valor,
				$flag,
				$tempoUso,
				$user
			);
		break; 
		case "IMPRESSORA":
			$marca  = utf8_decode($_REQUEST['marca']);
			$modelo = utf8_decode($_REQUEST['modelo']);
			$patrimonio = utf8_decode($_REQUEST['patrimonio']);
			$tempoUso = $_REQUEST['tempoUso'];
			$stat = utf8_decode($_REQUEST['stat']);
			$numNF = utf8_decode($_REQUEST['numNF']);
			$valor = $_REQUEST['valor'];
			$obs = utf8_decode($_REQUEST['obs']);
			$ip = utf8_decode($_REQUEST['ip']);
			$cartucho = utf8_decode($_REQUEST['cartucho']);
			$local = utf8_decode($_REQUEST['local']);
			$flag = $_REQUEST['flag'];
			$dateNF = ($_REQUEST['dateNF'] != "") ? date_create($_REQUEST['dateNF']) : "";
			if($dateNF != ""){
				$dateNF = date_format($dateNF, "d/m/Y");
			}
			cadImpressora(
				$con, 
				$tipo,
				$marca,
				$modelo,
				$patrimonio,
				$tempoUso,
				$stat,
				$numNF,
				$obs,
				$ip,
				$cartucho,
				$flag,
				$dateNF,
				$valor,
				$local,
				$user
			);
		break; 
		case "LINHASMOVEIS":
		   $patrimonio = $_REQUEST['patrimonio'];
		   $stat = $_REQUEST['stat'];
		   $valor = $_REQUEST['valor'];
		   $plano = utf8_decode($_REQUEST['plano']);
		   $obs = $_REQUEST['obs'];
		   $flag = $_REQUEST['flag'];
		   $tipo = $_REQUEST['tipo'];
		   cadLinhasMoveis(
					$con, 
					$tipo,
					$patrimonio,
					$stat,
					$valor,
					$plano,
					$flag,
					$obs,
					$user
			);
		break;
		case "MODEM":
		  cadModem($con, $tipo);
		break;
		case "MONITOR":
		  cadMonitor($con, $tipo);
		break;
		case "PROJETOR":
		case "SCANNER":
			$marca  = utf8_decode($_REQUEST['marca']);
			$modelo = utf8_decode($_REQUEST['modelo']);
			$patrimonio = utf8_decode($_REQUEST['patrimonio']);
			$tempoUso = $_REQUEST['tempoUso'];
			$stat = utf8_decode($_REQUEST['stat']);
			$numNF = utf8_decode($_REQUEST['numNF']);
			$valor = $_REQUEST['valor'];
			$obs = utf8_decode($_REQUEST['obs']);
			$local = utf8_decode($_REQUEST['local']);
			$sn = utf8_decode($_REQUEST['sn']);
			$flag = $_REQUEST['flag'];
			$dateNF = ($_REQUEST['dateNF'] != "") ? date_create($_REQUEST['dateNF']) : "";
			if($dateNF != ""){
				$dateNF = date_format($dateNF, "d/m/Y");
			}
			cadProjetor(
				$con, 
				$tipo,
				$marca,
				$modelo,
				$patrimonio,
				$tempoUso,
				$stat,
				$numNF,
				$obs,
				$local,
				$sn,
				$valor,
				$flag,
				$dateNF,
				$user
			);
		break;
		case "SERVIDORES":
		  cadServidores($con, $tipo);
		break;
		case "SWITCH":
		  cadSwitch($con, $tipo);
		break;
		case "TABLET":
		  cadTablet($con, $tipo);
		break;
		default:
			echo "<h1>Tipo não inválido</h1>";
	}
}


// CADASTRO DE COLABORADORES
if($action == "usuario"){
	$matricula = trim($_REQUEST['matricula']);
	$nome = utf8_decode($_REQUEST['nome']);
	$cpf = utf8_decode($_REQUEST['cpf']);
	$setor = utf8_decode($_REQUEST['setor']);
	$funcao = utf8_decode($_REQUEST['funcao']);
	$gestor = utf8_decode($_REQUEST['gestor']);
	$flag = $_REQUEST['flag'];
	$generic = $_REQUEST['generic'];
	$user = $_REQUEST['user'];
	
	/*
	$sql = mysqli_query($con,"SELECT count(*) total FROM equipamentos.colaborador where cpf = '".$cpf."'")or die(mysqli_error($con));
	$resSql = mysqli_fetch_array($sql);
	if($resSql['total'] == 0 || $cpf == ""){
	*/	
		$insert = mysqli_query($con,"insert into equipamentos.colaborador 
										(
											matricula,
											nome,
											cpf,
											setor,
											funcao,
											gestor,
											terceiro,
											generico,
											user
										)
										values
										(
											'".$matricula."',
											'".$nome."',
											'".$cpf."',
											'".$setor."',
											'".$funcao."',
											'".$gestor."',
											'".$flag."',
											'".$generic."',
											'".$user."'
										) on duplicate key update
										nome = '".$nome."',
										cpf = '".$cpf."',
										setor = '".$setor."',
										funcao = '".$funcao."',
										gestor = '".$gestor."',
										terceiro = '".$flag."',
										generico = '".$generic."',
										user = '".$user."'
										")or die(mysqli_error($con));
		if($insert){
			echo '1';
		}else{
			echo '0';
		}
	/*
	}else{
		echo '2';
	}
	*/
	
	mysqli_close($con);
}

// NOTIFICAR O USUÁRIO QUE O COLABORADOR TEM VÍNCULO COM O TIPO DO ITEM
if($action == "notify"){
	$matricula = $_REQUEST['matricula'];
	$tipo = $_REQUEST['tipo'];
	
	$sql = mysqli_query($con,"SELECT 
									*
								FROM
									equipamentos.equipamentos_usuario a
									inner join
									equipamentos.equipamentos b
									on a.patrimonio = b.patrimonio
								WHERE
									a.matricula = '".$matricula."' 
									and b.tipo = '".$tipo."'")or die(mysqli_error($con));
									
	$rows = mysqli_num_rows($sql);
	echo $rows;
	
	mysqli_close($con);
	
}

// VINCULO DO EQUIPAMENTO PARA O USUÁRIO
if($action == "vinculo"){
	$patrimonio = $_REQUEST['patrimonio'];
	$matriculas = $_REQUEST['matricula'];
	
	$length = substr_count($matriculas,";");
	for($i=0; $i <= $length; $i++){
		$matricula = explode(";",$matriculas);
		//echo $matricula[$i];
		$insert = mysqli_query($con,"insert into equipamentos.equipamentos_usuario 
										(
											patrimonio, 
											matricula
										) 
										values 
										(
											'".$patrimonio."', 
											'".$matricula[$i]."'
										)")or die(mysqli_error($con));
										
		$update = mysqli_query($con,"UPDATE `equipamentos`.`equipamentos` SET `status`='Em uso' WHERE `patrimonio`='".$patrimonio."'")or die(mysqli_error($con));
	}
	
	if($insert){		
		echo "1";
	}else{
		echo "0";
	}
		
	mysqli_close($con);
	
}

// RETORNA A LISTA DE EQUIPAMENTOS E USUÁRIOS VINCULADOS
if($action == "pesquisa"){
	
	$str = $_REQUEST['str'];
	$user = $_REQUEST['user'];
	
	if($str == '1'){
		$machine = $_REQUEST['machine'];
		$hostname = $_REQUEST['hostname'];
		$id = $_REQUEST['id'];
		
		if($machine && $user && $id && $hostname){
			$where1 = "a.tipo = '".$machine."' and c.matricula = '".$user."' and a.patrimonio = '".$id."' and a.hostname = '".$hostname."'";
		}elseif(!$user && $hostname && $id && $machine){
			$where1 = "a.tipo = '".$machine."' and a.patrimonio = '".$id."' and a.hostname = '".$hostname."'";
		}elseif($user && !$id && $hostname && $machine){
			$where1 = "c.matricula = '".$user."' and a.tipo = '".$machine."' and a.hostname = '".$hostname."'";
		}elseif($user && $id && $hostname && !$machine){
			$where1 = "c.matricula = '".$user."' and a.patrimonio = '".$id."' and a.hostname = '".$hostname."'";
		}elseif($user && $id && !$hostname && $machine){
			$where1 = "c.matricula = '".$user."' and a.patrimonio = '".$id."'";
		}elseif($user && !$id && !$machine && !$hostname){
			$where1 = "c.matricula = '".$user."'";
		}elseif(!$user && $id && !$machine && !$hostname){
			$where1 = "a.patrimonio = '".$id."'";
		}elseif(!$user && !$id && !$machine && $hostname){
			$where1 = "a.hostname = '".$hostname."'";
		}else{
			$where1 = "a.tipo = '".$machine."'";	
		}
	}else{
		$where1 = "c.matricula = '".$user."'";
	}
	
	
	$sql = mysqli_query($con,"SELECT 
								  a.codigo,
								  a.tipo,
								  a.marca,
								  a.modelo,
								  a.part_number,
								  a.patrimonio,
								  a.status,
								  a.nf_compra,
								  a.data_nf,
								  
								  a.service_tag,
								  a.hostname,
								  a.cpu,
								  a.memoria,
								  a.hd,
								  a.cartucho,
								  a.ip,
								  a.local,
								  a.imei,
								  a.capinha,
								  a.local,
								  a.plano,
								  a.valor,
								  
								  c.matricula,
								  c.nome,
								  c.setor,
								  c.funcao,
								  c.gestor
							  FROM
									equipamentos.equipamentos a
										LEFT JOIN
									equipamentos.equipamentos_usuario b ON a.patrimonio = b.patrimonio
										LEFT JOIN
									equipamentos.colaborador c ON c.matricula = b.matricula
								WHERE $where1
									  ")or die(mysqli_error($con));


    $rows = mysqli_num_rows($sql);
									
	if($rows > 0){
		$linha = 0;
		while($result = mysqli_fetch_array($sql)){
		extract($result);
        $linha += 1;		
		
		echo "<tr>
				<td><b style='color: #FF4500;'>LINHA $linha</b></td>
			  </tr>";
		echo "<table class='table table-hover table-bordered table-striped text-center' >
				<thead class='thead'>
					<tr>
						<th colspan='10'>
							INFORMAÇÕES DO EQUIPAMENTO
						</th>
					</tr>
					<tr>
						<th>CÓDIGO</th>";
					if($hostname){
						echo "<th>HOSTNAME</th>";
					}		
				  echo "<th>TIPO</th>";
						if($tipo != "LINHAS MOVEIS"){
							echo "<th>MARCA</th>
							      <th>MODELO</th>";
						}
						
						if($tipo == "NOTEBOOK" || $tipo == "DESKTOP" || $tipo == "AIO"){	
							echo "<th>PN / SN / Service Tag</th>";
						}elseif($tipo == "COLETOR"){
							echo "<th>SN</th>";
							echo "<th>PN</th>";
						}elseif($tipo == "PROJETOR" || $tipo == "SCANNER"){
							echo "<th>SN</th>";
						}elseif($tipo == "IMPRESSORA"){
							echo "<th>IP</th>";
						}elseif($tipo == "CELULARES"){
							echo "<th>IMEI</th>";
						}
						
						if($tipo != "LINHAS MOVEIS"){
							echo "<th>PATRIMÔNIO</th>
								  <th>STATUS</th>
							      <th>NF COMPRA</th>
							      <th>DATA NF</th>";
						}else{
							echo "<th>NÚMERO</th>
								  <th>STATUS</th>
								  <th>VALOR</th>
								  <th>PLANO</th>";
						}
							
				echo "</tr>
				</thead>
				<tbody>
					<tr>
						<td>".$codigo."</td>";
					if($hostname){
						echo "<td>".$hostname."</td>";
					}
					echo "<td>".utf8_encode($tipo)."</td>";
				if($tipo != "LINHAS MOVEIS"){
					echo "<td>".utf8_encode($marca)."</td>
						  <td>".utf8_encode($modelo)."</td>";
				}		
				   
						
				if($tipo == "NOTEBOOK" || $tipo == "DESKTOP" || $tipo == "AIO"){	
				  echo "<td>".$part_number."</td>";
				}elseif($tipo == "COLETOR"){
					echo "<td>".$service_tag."</td>";
					echo "<td>".$part_number."</td>";
				}elseif($tipo == "PROJETOR" || $tipo == "SCANNER"){
					echo "<td>".$service_tag."</td>";
				}elseif($tipo == "IMPRESSORA"){
					echo "<td>".$ip."</td>";
				}elseif($tipo == "CELULARES"){
					echo "<td>".$imei."</td>";
				}
				
				if($tipo != "LINHAS MOVEIS"){
				    echo "<td>".$patrimonio."</td>
						<td>".utf8_encode($status)."</td>
						<td>".$nf_compra."</td>
						<td>".$data_nf."</td>";
				}else{
					echo "<td>".$patrimonio."</td>
						  <td>".utf8_encode($status)."</td>
						  <td>".$valor."</td>
						  <td>".utf8_encode($plano)."</td>";
				}
				
				echo "</tr>
				</tbody>
				</table>
				<table class='table table-hover table-bordered table-striped text-center' >
				<thead class='thead'>
					<tr>
						<th colspan='5'>
							INFORMAÇÕES DO COLABORADOR
						</th>
					</tr>
					<tr>
						<th>MATRICULA</th>
						<th>NOME</th>
						<th>SETOR</th>
						<th>FUNÇÃO</th>
						<th>GESTOR</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>".$matricula."</td>
						<td>".utf8_encode($nome)."</td>
						<td>".utf8_encode($setor)."</td>
						<td>".utf8_encode($funcao)."</td>
						<td>".utf8_encode($gestor)."</td>
					</tr>
				</tbody>
			</table><hr style='border-color: orange; border: 5px solid orange;'>
			</table>";
		}
	}else{
		echo "<center>
				<div class='alert alert-warning' role='alert'>
					<i class='fa fa-exclamation-triangle'></i> <b>NÃO HÁ INFORMAÇÕES PARA ESSA CONSULTA</b>
				</div>
			  </center>";
	}
	mysqli_close($con);								
}

// RETORNA OS DADOS EM EXCEL
if($action == "exportar"){
	
	echo "<meta charset='UTF-8' />";
	echo "<style>
			.value{
				background: #F5F5F5; 
				text-align: center;
			}
		  </style>";
		  
	$str = $_REQUEST['str'];
	$user = $_REQUEST['user'];
	
	if($str == 1){
		$machine = $_REQUEST['machine'];
		$hostname = $_REQUEST['hostname'];
		$id = $_REQUEST['id'];
		
		if($machine && $user && $id && $hostname){
			$where1 = "a.tipo = '".$machine."' and c.matricula = '".$user."' and a.patrimonio = '".$id."' and a.hostname = '".$hostname."'";
		}elseif(!$user && $hostname && $id && $machine){
			$where1 = "a.tipo = '".$machine."' and a.patrimonio = '".$id."' and a.hostname = '".$hostname."'";
		}elseif($user && !$id && $hostname && $machine){
			$where1 = "c.matricula = '".$user."' and a.tipo = '".$machine."' and a.hostname = '".$hostname."'";
		}elseif($user && $id && $hostname && !$machine){
			$where1 = "c.matricula = '".$user."' and a.patrimonio = '".$id."' and a.hostname = '".$hostname."'";
		}elseif($user && $id && !$hostname && $machine){
			$where1 = "c.matricula = '".$user."' and a.patrimonio = '".$id."'";
		}elseif($user && !$id && !$machine && !$hostname){
			$where1 = "c.matricula = '".$user."'";
		}elseif(!$user && $id && !$machine && !$hostname){
			$where1 = "a.patrimonio = '".$id."'";
		}elseif(!$user && !$id && !$machine && $hostname){
			$where1 = "a.hostname = '".$hostname."'";
		}else{
			$where1 = "a.tipo = '".$machine."'";	
		}
	}else{
		$where1 = "c.matricula = '".$user."'";
	}
	
	// Nome do Arquivo do Excel que será gerado
	$arquivo = 'RelatorioEquipamentosTI.xls';
	
	$sql = "SELECT 
								  a.codigo,
								  a.tipo,
								  a.marca,
								  a.modelo,
								  a.part_number,
								  a.patrimonio,
								  a.status,
								  a.nf_compra,
								  a.data_nf,
								  
								  a.service_tag,
								  a.hostname,
								  a.cpu,
								  a.memoria,
								  a.hd,
								  a.cartucho,
								  a.ip,
								  a.local,
								  a.imei,
								  a.capinha,
								  a.local,
								  a.plano,
								  a.valor,
								  
								  c.matricula,
								  c.nome,
								  c.setor,
								  c.funcao,
								  c.gestor
							  FROM
									equipamentos.equipamentos a
										LEFT JOIN
									equipamentos.equipamentos_usuario b ON a.patrimonio = b.patrimonio
										LEFT JOIN
									equipamentos.colaborador c ON c.matricula = b.matricula
								WHERE $where1
									  ";	
	$tabela = "<table border='1' width='100%' >";	
	$tabela .= "<tr>";
	$tabela .= '<th colspan="22" style="background: #606060; color: white; text-align: center; height: 80px;">INFORMAÇÕES DO EQUIPAMENTO</tr>';
	$tabela .= '</tr>';
	$tabela .= "<tr>";
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>CÓDIGO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>TIPO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>MARCA</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>MODELO</b></td>';
	
	$query1 = mysqli_query($con, $sql)or die(mysqli_error($con));
	$resp1 = mysqli_fetch_array($query1);
		extract($resp1);
		if($tipo == "NOTEBOOK" || $tipo == "DESKTOP" || $tipo == "AIO"){
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>HOSTNAME</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>MEMÓRIA</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>PROCESSADOR</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>HD</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>PN / SN / Service Tag</b></td>';
		}elseif($tipo == "COLETOR"){
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>SN</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>PN</b></td>';
		}elseif($tipo == "PROJETOR" || $tipo == "SCANNER"){
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>SN</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>LOCAL</b></td>';
		}elseif($tipo == "IMPRESSORA"){
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>IP</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>TONER/CARTUCHO</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>LOCAL</b></td>';
		}elseif($tipo == "CELULARES"){
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>CAPINHA</b></td>';
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>IMEI</b></td>';
		}elseif($tipo == "LINHAS MOVEIS"){
			$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>PLANO</b></td>';
		}
	
	
	
	$rows = mysqli_num_rows($query1);
	
	
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>PATRIMÔNIO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>VALOR</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>STATUS</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>NF COMPRA</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>DATA NF</b></td>';
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>MATRICULA</b></td>';
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>NOME</b></td>';
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>SETOR</b></td>';
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>FUNÇÃO</b></td>';
	$tabela .= '<td colspan="1" style="background: #606060; color: white; text-align: center;"><b>GESTOR</b></td>';
	$tabela .= "</tr>";
	
	if($rows > 0){
		$query2 = mysqli_query($con, $sql)or die(mysqli_error($con));
		while($result = mysqli_fetch_array($query2)){
			extract($result);
				
			$tabela .= '<tr>';
			$tabela .= '<td class="value">'.$codigo.'</td>';
			$tabela .= '<td class="value">'.utf8_encode($tipo).'</td>';
			$tabela .= '<td class="value">'.utf8_encode($marca).'</td>';
			$tabela .= '<td class="value">'.utf8_encode($modelo).'</td>';
		
			if($tipo == "NOTEBOOK" || $tipo == "DESKTOP" || $tipo == "AIO"){
				  $tabela .= '<td class="value">'.utf8_encode($hostname).'</td>';				
				  $tabela .= '<td class="value">'.utf8_encode($memoria).'</td>';				
				  $tabela .= '<td class="value">'.utf8_encode($cpu).'</td>';				
				  $tabela .= '<td class="value">'.utf8_encode($hd).'</td>';				
				  $tabela .= '<td class="value">'.$part_number.'</td>';
				}elseif($tipo == "COLETOR"){
					$tabela .= '<td class="value">'.$service_tag.'</td>';
					$tabela .= '<td class="value">'.$part_number.'</td>';
				}elseif($tipo == "PROJETOR" || $tipo == "SCANNER"){
					$tabela .= '<td class="value">'.$service_tag.'</td>';
					$tabela .= '<td class="value">'.$local.'</td>';
				}elseif($tipo == "IMPRESSORA"){
					$tabela .= '<td class="value">'.$ip.'</td>';
					$tabela .= '<td class="value">'.$cartucho.'</td>';
					$tabela .= '<td class="value">'.$local.'</td>';
				}elseif($tipo == "CELULARES"){
					$tabela .= '<td class="value">'.$capinha.'</td>';
					$tabela .= '<td class="value">'.$imei.'</td>';
				}elseif($tipo == "LINHAS MOVEIS"){
					$tabela .= '<td class="value">'.utf8_encode($plano).'</td></td>';
				}	
			
			$tabela .= '<td class="value">'.$patrimonio.'</td>';
			$tabela .= '<td class="value">'.$valor.'</td>';
			$tabela .= '<td class="value">'.$status.'</td>';
			$tabela .= '<td class="value">'.$nf_compra.'</td>';
			$tabela .= '<td class="value">'.$data_nf.'</td>';
			$tabela .= '<td colspan="2" class="value">'.$matricula.'</td>';
			$tabela .= '<td colspan="2" class="value">'.utf8_encode($nome).'</td>';
			$tabela .= '<td colspan="2" class="value">'.utf8_encode($setor).'</td>';
			$tabela .= '<td colspan="2" class="value">'.utf8_encode($funcao).'</td>';
			$tabela .= '<td colspan="1" class="value">'.utf8_encode($gestor).'</td>';
			$tabela .= '</tr>';
					
		}
		$tabela .= "</table>";
	}else{
		
		$tabela .= "<tr>";
		$tabela .= '<th colspan="9">NÃO HÁ INFORMAÇÕES PARA ESSA CONSULTA</tr>';
		$tabela .= '</tr>';
		$tabela .= "</table>";
		
	}
	
	
	
	 // Força o Download do Arquivo Gerado
	 header ('Cache-Control: no-cache, must-revalidate');
	 header ('Pragma: no-cache');
	 header('Content-Type: application/x-msexcel');
	 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	 echo $tabela;
}

// RETORNA OS DADOS DO COLABORADOR CADASTRADO
if($action == "lista"){
	$busca = $_REQUEST['busca'];
	$id = $_REQUEST['id'];
	
	if($id == 1){
		$arr = array();
		$sql = mysqli_query($con,"SELECT 
										tipo,
										marca,
										modelo,
										part_number,
										service_tag,
										patrimonio,
										status,
										nf_compra,
										hostname,
										cpu,
										memoria,
										hd,
										obs,
										flag,
										tempo_uso,
										imei,
										capinha,
										local,
										ip,
										cartucho,
										valor,
										plano,
										(select count(*) from equipamentos.equipamentos_usuario a where a.patrimonio = '".$busca."') vinculo,
										DATE_FORMAT(STR_TO_DATE(data_nf, '%d/%m/%Y'),'%Y-%m-%d') data_nf
									FROM
										equipamentos.equipamentos
								  where patrimonio = '".$busca."'")or die(mysqli_error($con));
		
		if(mysqli_num_rows($sql)){
			while($dados = mysqli_fetch_object($sql)){
				$arr['tipo'] = $dados->tipo; 
				$arr['marca'] = utf8_encode($dados->marca); 
				$arr['modelo'] = utf8_encode($dados->modelo); 
				$arr['partNumber'] = utf8_encode($dados->part_number); 
				$arr['serviceTag'] = utf8_encode($dados->service_tag); 
				$arr['patrimonio'] = utf8_encode($dados->patrimonio); 
				$arr['stat'] = utf8_encode($dados->status); 
				$arr['numNF'] = utf8_encode($dados->nf_compra); 
				$arr['dateNF'] = $dados->data_nf; 
				$arr['obs'] = utf8_encode($dados->obs); 
				$arr['flag'] = $dados->flag; 
				$arr['valor'] = $dados->valor; 
				$arr['tempoUso'] = $dados->tempo_uso; 
				$arr['cpu'] = utf8_encode($dados->cpu); 
				$arr['memoria'] = utf8_encode($dados->memoria); 
				$arr['hd'] = utf8_encode($dados->hd); 
				$arr['hostname'] = utf8_encode($dados->hostname); 
				$arr['imei'] = utf8_encode($dados->imei); 
				$arr['capinha'] = utf8_encode($dados->capinha); 
				$arr['local'] = utf8_encode($dados->local); 
				$arr['plano'] = utf8_encode($dados->plano); 
				$arr['ip'] = utf8_encode($dados->ip); 
				$arr['vinculo'] = utf8_encode($dados->vinculo); 
				$arr['cartucho'] = utf8_encode($dados->cartucho); 
					
			}
		}else{
			$arr[] = '';
		}
		
		echo json_encode($arr);
	}else{
		$arr = array();
		$sql = mysqli_query($con,"SELECT 
									matricula,
									cpf,
									REPLACE(nome,'ã','a') nome,
									REPLACE(REPLACE(REPLACE(REPLACE(setor, 'ç', 'c'),
											'ã',
											'a'),
										'é',
										'e'),
									'á',
									'a') setor,
							   REPLACE(REPLACE(REPLACE(REPLACE(funcao, 'Ç', 'C'),
											'Ã',
											'A'),
										'Õ',
										'O'),
									'É',
									'E') funcao,
									terceiro,
									generico,
									gestor
								  FROM equipamentos.colaborador
								  where matricula = '".$busca."'")or die(mysqli_error($con));
		
		if(mysqli_num_rows($sql)){
			while($dados = mysqli_fetch_object($sql)){
				
				$arr['matricula'] = $dados->matricula; 
				$arr['nome'] = utf8_encode($dados->nome); 
				$arr['cpf'] = utf8_encode($dados->cpf); 
				$arr['setor'] = utf8_encode($dados->setor); 
				$arr['funcao'] = utf8_encode($dados->funcao); 
				$arr['terceiro'] = $dados->terceiro; 
				$arr['generico'] = $dados->generico; 
				$arr['gestor'] = utf8_encode($dados->gestor); 
			}
		}else{
			$arr[] = '';
		}
		
		echo json_encode($arr);
	}
	
	mysqli_close($con);
}

// Puxar os dados do vinculo
if($action == "search"){
	$patrimonio = $_REQUEST['patrimonio'];
	
	$sql = mysqli_query($con,"SELECT * FROM
									equipamentos.equipamentos a inner join equipamentos.equipamentos_usuario b
									on a.patrimonio = b.patrimonio inner join
									equipamentos.colaborador c
									on c.matricula = b.matricula
									where a.patrimonio = '".$patrimonio."'")or die(mysqli_error($con));
	$rows = mysqli_num_rows($sql);

	if($rows){
		echo "<input type='hidden' id='id' value='".$patrimonio."' />";
										
		echo "<table class='table table-hover table-bordered table-striped text-center' >
				<thead class='thead'>
					<tr>
						<th colspan='12'>
							INFORMAÇÕES DO EQUIPAMENTO
						</th>
					</tr>
					<tr>
						<th>PATRIMÔNIO</th>
						<th>TIPO</th>
						<th>MARCA</th>
						<th>MODELO</th>
						<th>PN / SN / Service Tag</th>
						<th>MATRICULA</th>
						<th>NOME</th>
						<th>SETOR</th>
						<th>GESTOR</th>
						<th>STATUS</th>
						<th>AÇÃO</th>
					</tr>
				</thead>";
		$id = 0;
		while($result = mysqli_fetch_array($sql)){
			extract($result);
			$id = $id + 1;
			echo "<input type='hidden' id='rg_".$id."' value='".$matricula."' />";
			echo "<tbody>
				<tr>
					<td>".utf8_encode($patrimonio)."</td>
					<td>".$tipo."</td>
					<td>".utf8_encode($marca)."</td>
					<td>".utf8_encode($modelo)."</td>
					<td>".utf8_encode($part_number)."</td>
					<td>".$matricula."</td>
					<td>".utf8_encode($nome)."</td>
					<td>".utf8_encode($setor)."</td>
					<td>".utf8_encode($gestor)."</td>
					<td>
					    <select class='form-control' id='status_$id' style='width: 100%'>
							<option value=''>".strtoupper($status)."</option>
							<option value='PARA DOAÇÃO'>PARA DOAÇÃO</option>
							<option value='BACKUP'>BACKUP</option>
							<option value='DESCARTE'>DESCARTE</option>
						</select>
						
					</td>
					<td>
						<button class='btn btn-danger' onclick='desvicular(".$id.");'>
							<i class='fa fa-minus-circle'></i>
						</button>
					</td>
				</tr>
			</tbody>";
		}
		echo "</table>";
	}else{
		echo "<center>
				<div class='alert alert-warning' role='alert'>
					<i class='fa fa-exclamation-triangle'></i> <b>NÃO FOI ENCONTRADO VINCULO PARA ESSE EQUIPAMENTO</b>
				</div>
			  </center>";
	}	
	mysqli_close($con);
}

// Aqui filtro os itens vinculados pelo tipo de equipamento
if($action == "listDesviculo"){
	
	$buscar = $_REQUEST['busca'];
	
	$arr = array();
	$sqlEq = mysqli_query($con,"SELECT 
													a.codigo,
													a.patrimonio,
													a.tipo
												FROM
													equipamentos.equipamentos a inner join equipamentos.equipamentos_usuario b
													on a.patrimonio = b.patrimonio inner join
													equipamentos.colaborador c
													on c.matricula = b.matricula
													where a.tipo = '".$buscar."'
													group by patrimonio
													order by a.tipo asc")or die(mysqli_error($con));
					while($resEq = mysqli_fetch_array($sqlEq)){
						
						$arr[] = $resEq;
						//echo "<option value='".$resEq['patrimonio']."'>".$resEq['patrimonio']." - ".$resEq['tipo']."</option>";
					}
					
					echo json_encode($arr);
}

// Aqui desvinculo o Equipamento do usuário
if($action == "desvincular"){
	$patrimonio = $_REQUEST['patrimonio'];
	$matricula = $_REQUEST['matricula'];
	$status = $_REQUEST['status'];
	
	$delete = mysqli_query($con,"DELETE FROM `equipamentos`.`equipamentos_usuario` WHERE `patrimonio`='".$patrimonio."' and matricula = '".$matricula."'")or die(mysqli_error($con));
	
	if($delete){
		
		$select = mysqli_query($con,"select count(*) linhas from equipamentos.equipamentos_usuario where patrimonio = '".$patrimonio."'")or die(mysqli_error($con));
		$result = mysqli_fetch_array($select);
		extract($result);
		if($linhas == 0){
			$update = mysqli_query($con,"update equipamentos.equipamentos 
											set status = '".$status."'
											where patrimonio = '".$patrimonio."'")or die(mysqli_error($con));
		}
		echo "1";
	}else{
		echo "0";
	}
}

// Aqui lista todos os usuários
if($action == "todos"){
	$perfil = $_REQUEST['perfil'];
	$id_user = $_REQUEST['id_user'];
	
	$sql = mysqli_query($con,"select * from equipamentos.colaborador")or die(mysqli_error($con));
	
	$linhas = mysqli_num_rows($sql);
	echo "<center><button class='total'>Total de Funcionários: ".$linhas."</button></center>";
	
	echo "<table id='tb_listagem' class='table table-striped table-hover'>";
	echo "<thead class='th'>
			<tr>
				<th>MATRICULA</th>
				<th>NOME</th>
				<th>CPF</th>
				<th>SETOR</th>
				<th>FUNÇÃO</th>
				<th>GESTOR</th>
				<th>TERCEIRO</th>";
				if($perfil == 'TI' && $id_user != 158058){
					echo "<th>REMOVER</th>";
				}
		echo "</tr>
		  </thead>";
	$id = 0;
	while($result = mysqli_fetch_array($sql)){
		extract($result);
		$id += 1;
		
		echo "<input type='hidden' id='matricula_".$id."' value='".$matricula."' />";
		echo "<tbody class='td'>
			<tr>
				<td>".$matricula."</td>
				<td>".utf8_encode($nome)."</td>
				<td>".utf8_encode($cpf)."</td>
				<td>".utf8_encode($setor)."</td>
				<td>".utf8_encode($funcao)."</td>
				<td>".utf8_encode($gestor)."</td>";
		if($terceiro == 'Y'){
			echo "<td>SIM</td>";
		}else{
			echo "<td>NÃO</td>";
		}
		if($perfil == 'TI' && $id_user != 158058){		
			    echo "<td>
						<button class='btn btn-danger' onclick='excluir(".$id.");'>
							<i class='fa fa-trash' aria-hidden='true'></i>
						</button>
					  </td>";
		}
		echo "</tr>
		  </tbody>";	
	}
	
	echo "</table>";
	
	mysqli_close($con);
}

// Aqui lista os usuários filtrados
if($action == "filtrar"){
	$busca = $_REQUEST['busca'];
	$perfil = $_REQUEST['perfil'];
	$id_user = $_REQUEST['id_user'];
	$setores = utf8_decode($_REQUEST['setor']);
	if($setores){
	   $where = "and setor = '$setores'";
	}else{
		$where = "";
	}
	
	$sql = mysqli_query($con,"select * from equipamentos.colaborador where (matricula like '%$busca%' or nome like '%$busca%' or funcao like '%$busca%' or gestor like '%$busca%' or cpf like '%$busca%') $where")or die(mysqli_error($con));
	
	$linhas = mysqli_num_rows($sql);
	echo "<center><button class='total'>Total de Funcionários: ".$linhas."</button></center>";
	
	echo "<table id='tb_listagem' class='table table-striped table-hover'>";
	echo "<thead class='th'>
			<tr>
				<th>MATRICULA</th>
				<th>NOME</th>
				<th>CPF</th>
				<th>SETOR</th>
				<th>FUNÇÃO</th>
				<th>GESTOR</th>
				<th>TERCEIRO</th>";
				if($perfil == "TI" && $id_user != 158058){
					echo "<th>REMOVER</th>";
				}
		echo "</tr>
		  </thead>";	
	$id = 0;
	while($result = mysqli_fetch_array($sql)){
		extract($result);
		$id += 1;
		
		echo "<input type='hidden' id='matricula_".$id."' value='".$matricula."' />";
		echo "<tbody class='td'>
			<tr>
				<td>".$matricula."</td>
				<td>".utf8_encode($nome)."</td>
				<td>".utf8_encode($cpf)."</td>
				<td>".utf8_encode($setor)."</td>
				<td>".utf8_encode($funcao)."</td>
				<td>".utf8_encode($gestor)."</td>";
		if($terceiro == 'Y'){
			echo "<td>SIM</td>";
		}else{
			echo "<td>NÃO</td>";
		}	
		if($perfil == "TI" && $id_user != 158058){
			 echo "<td>
						<button class='btn btn-danger' onclick='excluir(".$id.");'>
							<i class='fa fa-trash' aria-hidden='true'></i>
						</button>
					  </td>";
		}
		echo "</tr>
		  </tbody>";	
	}
	
	echo "</table>";
	
	mysqli_close($con);
}

// Aqui exporto o relatório dos usuários cadastrado
if($action == "relatorio"){
	$busca = $_REQUEST['busca'];
	$setores = utf8_decode($_REQUEST['setor']);
	if($setores){
	   $where = "and setor = '$setores'";
	}else{
		$where = "";
	}
	
	// Nome do Arquivo do Excel que será gerado
	$arquivo = 'ListaDeUsuarios.xls';
	
	$sql = mysqli_query($con,"select * from equipamentos.colaborador where (matricula like '%$busca%' or nome like '%$busca%' or funcao like '%$busca%' or gestor like '%$busca%') $where")or die(mysqli_error($con));
	
	$tabela = "<table border='1' width='100%'>";
	$tabela .= "<tr>
				<th style='background: green; color: white; text-align: center; height: 50px;'><b>MATRICULA</b></th>
				<th style='background: green; color: white; text-align: center; height: 50px;'><b>NOME</b></th>
				<th style='background: green; color: white; text-align: center; height: 50px;'><b>SETOR</b></th>
				<th style='background: green; color: white; text-align: center; height: 50px;'><b>FUNÇÃO</b></th>
				<th style='background: green; color: white; text-align: center; height: 50px;'><b>GERTOR</b></th>
				<th style='background: green; color: white; text-align: center; height: 50px;'><b>TERCEIRO</b></th>
			</tr>";
	
	while($result = mysqli_fetch_array($sql)){
		extract($result);
		$tabela .= "<tr class='td'>
						<td style='background: #F5F5F5; 
	text-align: center;'>".$matricula."</td>
						<td style='background: #F5F5F5; 
	text-align: center;'>".utf8_encode($nome)."</td>
						<td style='background: #F5F5F5; 
	text-align: center;'>".utf8_encode($setor)."</td>
						<td style='background: #F5F5F5; 
	text-align: center;'>".utf8_encode($funcao)."</td>
						<td style='background: #F5F5F5; 
	text-align: center;''>".utf8_encode($gestor)."</td>";
		if($terceiro == 'Y'){
			$tabela .= "<td>SIM</td>";
		}else{
			$tabela .= "<td>NÃO</td>";
		}	
		
		$tabela .= "</tr>";	
	}
	
	$tabela .= "</table>";
	
	// Força o Download do Arquivo Gerado
	 header ('Cache-Control: no-cache, must-revalidate');
	 header ('Pragma: no-cache');
	 header('Content-Type: application/x-msexcel');
	 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	 echo $tabela;
	
	mysqli_close($con);
}

// Excluir usuário cadastrado
if($action == "excluir"){
	$matricula = $_REQUEST['matricula'];
	$verify = mysqli_query($con,"select count(*) linhas from equipamentos.equipamentos_usuario where matricula = '".$matricula."'")or die(mysqli_error($con));
	$result = mysqli_fetch_array($verify);
	extract($result);
		
	if($linhas == 0){
		$delete = mysqli_query($con,"DELETE FROM `equipamentos`.`colaborador` WHERE `matricula`='".$matricula."'")or die(mysqli_error($con));
		
		if($delete){
			echo "1";
		}else{
			echo "0";
		}
	}else{
		echo "2";
	}
		
}

if($action == "selectionTipo"){
	$valor = $_REQUEST['valor'];
	$arr = array();
	
	$equipamentos = mysqli_query($con,"SELECT 
												a.codigo,
												a.patrimonio,
												a.tipo
											FROM
												equipamentos.equipamentos a left join
												equipamentos.equipamentos_usuario b
												on a.patrimonio = b.patrimonio
											where b.patrimonio is null
											and a.tipo = '".$valor."'
											order by tipo asc")or die(mysqli_error($con));
	while($result = mysqli_fetch_array($equipamentos)){
		$arr[] = $result;
	}					

	echo json_encode($arr);
	
}

if($action == "selection"){
	$valor = $_REQUEST['valor'];
	
	$flag = mysqli_query($con,"select flag from equipamentos.equipamentos where patrimonio = '".$valor."'")or die(mysqli_error($con));
	
	$result = mysqli_fetch_array($flag);
	echo $result['flag'];
}

?>