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
	$serviceTag = $_REQUEST['serviceTag'];
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
											service_tag,
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
											'".$serviceTag."',
											'".$patrimonio."',
											'".$stat."',
											'".$numNF."',
											'".$dateNF."',
											'".$user."'
										)")or die(mysqli_error($con));
										
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
	
	if($resSql['total'] == 0){
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
										)")or die(mysqli_error($con));
		if($insert){
			echo '1';
		}else{
			echo '0';
		}
	}else{
		echo '2';
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
	
	$busca = $_REQUEST['busca'];
	
	$sql = mysqli_query($con,"SELECT 
									*
								FROM
									equipamentos.equipamentos a left join equipamentos.equipamentos_usuario b
									on a.codigo = b.codigo left join
									equipamentos.colaborador c
									on c.matricula = b.matricula
									where a.codigo = '".$busca."'")or die(mysqli_error($con));
									
	$result = mysqli_fetch_array($sql);
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
					<th>PART NUMBER</th>
					<th>SERVICE TAG</th>
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
					<td>".$service_tag."</td>
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
		</table>";
	
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
	
	$busca = $_REQUEST['busca'];
	// Nome do Arquivo do Excel que será gerado
	$arquivo = 'RelatorioEquipamentosTI.xls';
	
	$sql = mysqli_query($con,"SELECT 
									*
								FROM
									equipamentos.equipamentos a left join equipamentos.equipamentos_usuario b
									on a.codigo = b.codigo left join
									equipamentos.colaborador c
									on c.matricula = b.matricula
									where a.codigo = '".$busca."'")or die(mysqli_error($con));
									
	$result = mysqli_fetch_array($sql);
    extract($result);
	
	$tabela = "<table border='1' width='100%' >";
	$tabela .= "<tr>";
	$tabela .= '<th colspan="10">INFORMAÇÕES DO EQUIPAMENTO</tr>';
	$tabela .= '</tr>';
	$tabela .= "<tr>";
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>CÓDIGO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>TIPO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>MARCA</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>MODELO</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>PART NUMBER</b></td>';
	$tabela .= '<td style="background: #606060; color: white; text-align: center;"><b>SERVICE TAG</b></td>';
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
	$tabela .= '<td class="value">'.$service_tag.'</td>';
	$tabela .= '<td class="value">'.$patrimonio.'</td>';
	$tabela .= '<td class="value">'.$status.'</td>';
	$tabela .= '<td class="value">'.$nf_compra.'</td>';
	$tabela .= '<td class="value">'.$data_nf.'</td>';
	$tabela .= '</tr>';
	
	$tabela .= "<tr>";
	$tabela .= '<th colspan="10"></tr>';
	$tabela .= '</tr>';
	
	$tabela .= "<tr>";
	$tabela .= '<th colspan="10">INFORMAÇÕES DO COLABORADOR</tr>';
	$tabela .= '</tr>';
	$tabela .= "<tr>";
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>MATRICULA</b></td>';
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>NOME</b></td>';
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>SETOR</b></td>';
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>FUNÇÃO</b></td>';
	$tabela .= '<td colspan="2" style="background: #606060; color: white; text-align: center;"><b>GESTOR</b></td>';
	$tabela .= "</tr>";
	
	$tabela .= '<tr>';
	$tabela .= '<td colspan="2" class="value">'.$matricula.'</td>';
	$tabela .= '<td colspan="2" class="value">'.$nome.'</td>';
	$tabela .= '<td colspan="2" class="value">'.$setor.'</td>';
	$tabela .= '<td colspan="2" class="value">'.$funcao.'</td>';
	$tabela .= '<td colspan="2" class="value">'.$gestor.'</td>';
	$tabela .= '</tr>';
	$tabela .= "</table>";

	
	// Força o Download do Arquivo Gerado
	 header ('Cache-Control: no-cache, must-revalidate');
	 header ('Pragma: no-cache');
	 header('Content-Type: application/x-msexcel');
	 header ("Content-Disposition: attachment; filename=\"{$arquivo}\"");
	 echo $tabela;
}



?>