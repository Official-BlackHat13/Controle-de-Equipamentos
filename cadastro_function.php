<?php 
$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];

//CADASTRO DE EQUIPAMENTO
if($action == "equipamento"){
	
	$user   = $_REQUEST['user'];
	$tipo   = str_replace(" ","",$_REQUEST['tipo']);
	$marca  = $_REQUEST['marca'];
	$modelo = $_REQUEST['modelo'];
	$partNumber = $_REQUEST['partNumber'];
	$patrimonio = $_REQUEST['patrimonio'];
	$stat = $_REQUEST['stat'];
	$numNF = $_REQUEST['numNF'];
	$dateNF = ($_REQUEST['dateNF'] != "") ? date_create($_REQUEST['dateNF']) : "";
	if($dateNF != ""){
		$dateNF = date_format($dateNF, "d/m/Y");
	}
		
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
											'".$user."'
										) on duplicate key update
										tipo = '".$tipo."',
										marca = '".$marca."',
										modelo = '".$modelo."',
										part_number = '".$partNumber."',
										status = '".$stat."',
										nf_compra = '".$numNF."',
										data_nf = '".$dateNF."',
										user = '".$user."'")or die(mysqli_error($con));
										
	if($insert){
		echo '1';
	}else{
		echo '0';
	}	
	
	mysqli_close($con);
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
	if($rows > 0){
		while($result = mysqli_fetch_array($sql)){
			extract($result);
			
			
			$tabela .= "<tr>";
			$tabela .= '<th colspan="9" style="background: #606060; color: white; text-align: center;">INFORMAÇÕES DO EQUIPAMENTO</tr>';
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
			$tabela .= "</tr>";
			
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
			$tabela .= '</tr>';
			
			$tabela .= "<tr>";
			$tabela .= '<th colspan="9" style="background: #606060; color: white; text-align: center;">INFORMAÇÕES DO COLABORADOR</tr>';
			$tabela .= '</tr>';
			$tabela .= "<tr>";
			$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>MATRICULA</b></td>';
			$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>NOME</b></td>';
			$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>SETOR</b></td>';
			$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>FUNÇÃO</b></td>';
			$tabela .= '<td colspan="1" style="background: #606060; color: white; text-align: center;"><b>GESTOR</b></td>';
			$tabela .= "</tr>";
			
			$tabela .= '<tr>';
			$tabela .= '<td colspan="2" class="value">'.$matricula.'</td>';
			$tabela .= '<td colspan="2" class="value">'.$nome.'</td>';
			$tabela .= '<td colspan="2" class="value">'.$setor.'</td>';
			$tabela .= '<td colspan="2" class="value">'.$funcao.'</td>';
			$tabela .= '<td colspan="1" class="value">'.$gestor.'</td>';
			$tabela .= '</tr>';
			
			$tabela .= "<tr>";
			$tabela .= '<th colspan="9" style="background: orange;"></tr>';
			$tabela .= '<th colspan="9" style="background: orange;"></tr>';
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
										DATE_FORMAT(STR_TO_DATE(data_nf, '%d/%m/%Y'),'%Y-%m-%d') data_nf
									FROM
										equipamentos.equipamentos
								  where codigo = '".$busca."'")or die(mysqli_error($con));
		
		if(mysqli_num_rows($sql)){
			while($dados = mysqli_fetch_object($sql)){
				$arr['tipo'] = $dados->tipo; 
				$arr['marca'] = $dados->marca; 
				$arr['modelo'] = $dados->modelo; 
				$arr['partNumber'] = $dados->part_number; 
				$arr['patrimonio'] = $dados->patrimonio; 
				$arr['stat'] = $dados->status; 
				$arr['numNF'] = $dados->nf_compra; 
				$arr['dateNF'] = $dados->data_nf; 
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
									setor,
									funcao,
									gestor
								  FROM equipamentos.colaborador
								  where matricula = '".$busca."'")or die(mysqli_error($con));
		
		if(mysqli_num_rows($sql)){
			while($dados = mysqli_fetch_object($sql)){
				
				$arr['matricula'] = $dados->matricula; 
				$arr['nome'] = utf8_encode($dados->nome); 
				$arr['setor'] = $dados->setor; 
				$arr['funcao'] = $dados->funcao; 
				$arr['gestor'] = $dados->gestor; 
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