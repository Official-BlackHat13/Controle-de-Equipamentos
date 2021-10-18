<?php 
$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];

//CARREGA A TELA DE CADASTRO APARTIR DO TIPO SELECIONADO
if($action == "carregar"){
	require_once("EquipamentosForm.php");
	$tipo = $_REQUEST['tipo'];
	
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
		case "LINHAS MOVEIS":
		  tipoLinhasMoveis($con, $tipo);
		break;
		case "MODEM":
		  tipoModem($con, $tipo);
		break;
		case "MONITOR":
		  tipoMonitor($con, $tipo);
		break;
		
		case "PROJETOR":
		  tipoProjetor($con, $tipo);
		break;
		case "SCANNER":
		  tipoScanner($con, $tipo);
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
		  cadCelular(
			$con, 
			$tipo
		  );
		break;
		case "COLETOR":
		  cadColetor(
			$con, 
			$tipo
		  );
		break; 
		case "DESKTOP":
		case "NOTEBOOK":
		case "AIO":
		    $marca  = $_REQUEST['marca'];
			$modelo = $_REQUEST['modelo'];
			$partNumber = $_REQUEST['partNumber'];
			$patrimonio = $_REQUEST['patrimonio'];
			$stat = $_REQUEST['stat'];
			$numNF = $_REQUEST['numNF'];
			$obs = $_REQUEST['obs'];
			$hostname = $_REQUEST['hostname'];
			$cpu = $_REQUEST['cpu'];
			$memoria = $_REQUEST['memoria'];
			$hd = $_REQUEST['hd'];
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
				$flag,
				$user
			);
		break; 
		case "IMPRESSORA":
		  cadImpressora($con, $tipo);
		break; 
		case "LINHAS MOVEIS":
		  cadLinhasMoveis($con, $tipo);
		break;
		case "MODEM":
		  cadModem($con, $tipo);
		break;
		case "MONITOR":
		  cadMonitor($con, $tipo);
		break;
		case "PROJETOR":
		  cadProjetor($con, $tipo);
		break;
		case "SCANNER":
		  cadScanner($con, $tipo);
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
	$nome = $_REQUEST['nome'];
	$setor = $_REQUEST['setor'];
	$funcao = $_REQUEST['funcao'];
	$gestor = $_REQUEST['gestor'];
	$user = $_REQUEST['user'];
	
	$sql = mysqli_query($con,"SELECT count(*) total FROM equipamentos.colaborador where matricula = '".$matricula."'")or die(mysqli_error($con));
	$resSql = mysqli_fetch_array($sql);
	
	
		$insert = mysqli_query($con,"insert into equipamentos.colaborador 
										(
											matricula,
											nome,
											setor,
											funcao,
											gestor,
											user
										)
										values
										(
											'".$matricula."',
											'".$nome."',
											'".$setor."',
											'".$funcao."',
											'".$gestor."',
											'".$user."'
										) on duplicate key update
										nome = '".$nome."',
										setor = '".$setor."',
										funcao = '".$funcao."',
										gestor = '".$gestor."',
										user = '".$user."'
										")or die(mysqli_error($con));
		if($insert){
			echo '1';
		}else{
			echo '0';
		}
	
	
	mysqli_close($con);
}

// VINCULO DO EQUIPAMENTO PARA O USUÁRIO
if($action == "vinculo"){
	$codigo = $_REQUEST['codigo'];
	$matricula = $_REQUEST['matricula'];
	
	$insert = mysqli_query($con,"insert into equipamentos.equipamentos_usuario 
									(
										codigo, 
										matricula
									) 
									values 
									(
										'".$codigo."', 
										'".$matricula."'
									)")or die(mysqli_error($con));
									
	if($insert){
		echo "1";
	}else{
		echo "0";
	}
	
	mysqli_close($con);
}

// RETORNA A LISTA DE EQUIPAMENTOS E USUÁRIOS VINCULADOS
if($action == "pesquisa"){
	
	$machine = $_REQUEST['machine'];
	$user = $_REQUEST['user'];
	$id = $_REQUEST['id'];
	
	if($machine && $user && $id){
		$where1 = "a.tipo = '".$machine."' and c.matricula = '".$user."' and a.patrimonio = '".$id."'";
	}elseif(!$user && $id && $machine){
		$where1 = "a.tipo = '".$machine."' and a.patrimonio = '".$id."'";
	}elseif($user && !$id && $machine){
		$where1 = "c.matricula = '".$user."' and a.tipo = '".$machine."'";
	}elseif($user && $id && !$machine){
		$where1 = "c.matricula = '".$user."' and a.patrimonio = '".$id."'";
	}elseif($user && !$id && !$machine){
		$where1 = "c.matricula = '".$user."'";
	}elseif(!$user && $id && !$machine){
		$where1 = "a.patrimonio = '".$id."'";
	}else{
		$where1 = "a.tipo = '".$machine."'";	
	}
	
	$sql = mysqli_query($con,"SELECT 
								 *
							  FROM
									equipamentos.equipamentos a
										LEFT JOIN
									equipamentos.equipamentos_usuario b ON a.codigo = b.codigo
										LEFT JOIN
									equipamentos.colaborador c ON c.matricula = b.matricula
								WHERE $where1
									  ")or die(mysqli_error($con));


    $rows = mysqli_num_rows($sql);
									
	if($rows > 0){								
		while($result = mysqli_fetch_array($sql)){
		extract($result);	
										
		echo "<table class='table table-hover table-bordered table-striped text-center' >
				<thead class='thead'>
					<tr>
						<th colspan='10'>
							INFORMAÇÕES DO EQUIPAMENTO
						</th>
					</tr>
					<tr>
						<th>CÓDIGO</th>
						<th>TIPO</th>
						<th>MARCA</th>
						<th>MODELO</th>
						<th>PN / SN / Service Tag</th>
						<th>PATRIMÔNIO</th>
						<th>STATUS</th>
						<th>NF COMPRA</th>
						<th>DATA NF</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>".$codigo."</td>
						<td>".$tipo."</td>
						<td>".$marca."</td>
						<td>".$modelo."</td>
						<td>".$part_number."</td>
						<td>".$patrimonio."</td>
						<td>".$status."</td>
						<td>".$nf_compra."</td>
						<td>".$data_nf."</td>
					</tr>
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
						<td>".$nome."</td>
						<td>".$setor."</td>
						<td>".$funcao."</td>
						<td>".$gestor."</td>
					</tr>
				</tbody>
			</table><hr style='border-color: orange; border: 5px solid orange;'>";
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
	
	$machine = $_REQUEST['machine'];
	$user = $_REQUEST['user'];
	$id = $_REQUEST['id'];
	
	if($machine && $user && $id){
		$where1 = "a.tipo = '".$machine."' and c.matricula = '".$user."' and a.patrimonio = '".$id."'";
	}elseif(!$user && $id && $machine){
		$where1 = "a.tipo = '".$machine."' and a.patrimonio = '".$id."'";
	}elseif($user && !$id && $machine){
		$where1 = "c.matricula = '".$user."' and a.tipo = '".$machine."'";
	}elseif($user && $id && !$machine){
		$where1 = "c.matricula = '".$user."' and a.patrimonio = '".$id."'";
	}elseif($user && !$id && !$machine){
		$where1 = "c.matricula = '".$user."'";
	}elseif(!$user && $id && !$machine){
		$where1 = "a.patrimonio = '".$id."'";
	}else{
		$where1 = "a.tipo = '".$machine."'";	
	}
	
	// Nome do Arquivo do Excel que será gerado
	$arquivo = 'RelatorioEquipamentosTI.xls';
	
	$sql = mysqli_query($con,"SELECT 
								 *
							  FROM
									equipamentos.equipamentos a
										LEFT JOIN
									equipamentos.equipamentos_usuario b ON a.codigo = b.codigo
										LEFT JOIN
									equipamentos.colaborador c ON c.matricula = b.matricula
								WHERE $where1
									  ")or die(mysqli_error($con));

	$rows = mysqli_num_rows($sql);
	
	$tabela = "<table border='1' width='100%' >";	
	$tabela .= "<tr>";
	$tabela .= '<th colspan="18" style="background: #606060; color: white; text-align: center;">INFORMAÇÕES DO EQUIPAMENTO</tr>';
	$tabela .= '</tr>';
	$tabela .= "<tr>";
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>CÓDIGO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>TIPO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>MARCA</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>MODELO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>PN / SN / Service Tag</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>PATRIMÔNIO</b></td>';
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
		while($result = mysqli_fetch_array($sql)){
			extract($result);
			
			
			
			
			
			$tabela .= '<tr>';
			$tabela .= '<td class="value">'.$codigo.'</td>';
			$tabela .= '<td class="value">'.$tipo.'</td>';
			$tabela .= '<td class="value">'.$marca.'</td>';
			$tabela .= '<td class="value">'.$modelo.'</td>';
			$tabela .= '<td class="value">'.$part_number.'</td>';
			$tabela .= '<td class="value">'.$patrimonio.'</td>';
			$tabela .= '<td class="value">'.$status.'</td>';
			$tabela .= '<td class="value">'.$nf_compra.'</td>';
			$tabela .= '<td class="value">'.$data_nf.'</td>';
			$tabela .= '<td colspan="2" class="value">'.$matricula.'</td>';
			$tabela .= '<td colspan="2" class="value">'.$nome.'</td>';
			$tabela .= '<td colspan="2" class="value">'.$setor.'</td>';
			$tabela .= '<td colspan="2" class="value">'.$funcao.'</td>';
			$tabela .= '<td colspan="1" class="value">'.$gestor.'</td>';
			$tabela .= '</tr>';
					
		}
	}else{
		
		$tabela .= "<tr>";
		$tabela .= '<th colspan="9">NÃO HÁ INFORMAÇÕES PARA ESSA CONSULTA</tr>';
		$tabela .= '</tr>';
		
	}
	
	$tabela .= "</table>";
	
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
										patrimonio,
										status,
										nf_compra,
										hostname,
										cpu,
										memoria,
										hd,
										obs,
										flag,
										DATE_FORMAT(STR_TO_DATE(data_nf, '%d/%m/%Y'),'%Y-%m-%d') data_nf
									FROM
										equipamentos.equipamentos
								  where codigo = '".$busca."'")or die(mysqli_error($con));
		
		if(mysqli_num_rows($sql)){
			while($dados = mysqli_fetch_object($sql)){
				$arr['tipo'] = $dados->tipo; 
				$arr['marca'] = utf8_encode($dados->marca); 
				$arr['modelo'] = utf8_encode($dados->modelo); 
				$arr['partNumber'] = $dados->part_number; 
				$arr['patrimonio'] = $dados->patrimonio; 
				$arr['stat'] = utf8_encode($dados->status); 
				$arr['numNF'] = $dados->nf_compra; 
				$arr['dateNF'] = $dados->data_nf; 
				$arr['obs'] = utf8_encode($dados->obs); 
				$arr['flag'] = $dados->flag; 
				$arr['cpu'] = utf8_encode($dados->cpu); 
				$arr['memoria'] = utf8_encode($dados->memoria); 
				$arr['hd'] = utf8_encode($dados->hd); 
				$arr['hostname'] = $dados->hostname; 
					
			}
		}else{
			$arr[] = '';
		}
		
		echo json_encode($arr);
	}else{
		$arr = array();
		$sql = mysqli_query($con,"SELECT 
									matricula,
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
									gestor
								  FROM equipamentos.colaborador
								  where matricula = '".$busca."'")or die(mysqli_error($con));
		
		if(mysqli_num_rows($sql)){
			while($dados = mysqli_fetch_object($sql)){
				
				$arr['matricula'] = $dados->matricula; 
				$arr['nome'] = utf8_encode($dados->nome); 
				$arr['setor'] = utf8_encode($dados->setor); 
				$arr['funcao'] = utf8_encode($dados->funcao); 
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
	$codigo = $_REQUEST['codigo'];
	
	$sql = mysqli_query($con,"SELECT 
									*
								FROM
									equipamentos.equipamentos a inner join equipamentos.equipamentos_usuario b
									on a.codigo = b.codigo inner join
									equipamentos.colaborador c
									on c.matricula = b.matricula
									where a.codigo = '".$codigo."'")or die(mysqli_error($con));
	$rows = mysqli_num_rows($sql);

	if($rows){
		$result = mysqli_fetch_array($sql);
		extract($result);
		
		echo "<input type='hidden' id='id' value='".$codigo."' />";
										
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
						<th>FUNÇÃO</th>
						<th>GESTOR</th>
						<th>STATUS</th>
						<th>AÇÃO</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>".$patrimonio."</td>
						<td>".$tipo."</td>
						<td>".$marca."</td>
						<td>".$modelo."</td>
						<td>".$part_number."</td>
						<td>".$matricula."</td>
						<td>".$nome."</td>
						<td>".$setor."</td>
						<td>".$funcao."</td>
						<td>".$gestor."</td>
						<td>".$status."</td>
						<td>
							<button class='btn btn-danger' onclick='desvicular();'>
								<i class='fa fa-minus-circle'></i>
							</button>
						</td>
					</tr>
				</tbody>
			</table>";
	}else{
		echo "<center>
				<div class='alert alert-warning' role='alert'>
					<i class='fa fa-exclamation-triangle'></i> <b>NÃO FOI ENCONTRADO VINCULO PARA ESSE EQUIPAMENTO</b>
				</div>
			  </center>";
	}	
	mysqli_close($con);
}

// Aqui desvinculo o Equipamento do usuário
if($action == "desvicular"){
	$codigo = $_REQUEST['codigo'];
	
	$delete = mysqli_query($con,"DELETE FROM `equipamentos`.`equipamentos_usuario` WHERE `codigo`='".$codigo."'")or die(mysqli_error($con));
	
	if($delete){
		echo "1";
	}else{
		echo "0";
	}
}



?>