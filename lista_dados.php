<?php
include('../controle.php');
$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Cadastro de Colaborador</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/lista_dados.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-between align-self-center" id="title">
			<div class="col-md-2 text-left">
				<i class="fa fa-arrow-circle-left fa-2x" id="back" onclick="voltar();"></i>
				<p class='voltar'>VOLTAR</p>
			</div>
			<div class="col-md-9" align="center">
				<span style="margin-left: -150px;" >LISTA DE EQUIPAMENTO E COLABORADORES VINCULADOS</span>
			</div>
		</div>
		<br>
		<div class="row justify-content-center align-self-center">
			<div class="col-md-4 text-center consult">
				 <select class="form-control" id="busca">
				  <option value=""> -- Selecione o Equipamento -- </option>
				  <?php 
					$sqlMat = mysqli_query($con,"SELECT 
													a.codigo
												FROM
													equipamentos.equipamentos a left join equipamentos.equipamentos_usuario b
												on a.codigo = b.codigo
												where b.codigo is not null order by tipo asc")or die(mysqli_error($con));
					while($resMat = mysqli_fetch_array($sqlMat)){
						echo "<option value='".$resMat['codigo']."'>".$resMat['codigo']."</option>";
					}
				  ?>
				  </select>
			</div>
			<div class="consult">
				<button class="btn btn-primary pesq" onclick="pesquisa();"><i class="fa fa-search" aria-hidden="true"></i></button>
				&emsp;
				<button class="btn btn-success pesq" onclick="exportar();"><i class="fa fa-file-excel-o" aria-hidden="true"></i></button>
			</div>
		</div><br>
		
		
		<div id="lista"></div>
		<br>
		<br>
	</div>

</body>
</html>