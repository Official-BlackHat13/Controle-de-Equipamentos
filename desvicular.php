<?php 
include('../controle.php');

$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Desvincular Equipamento ao Usuário</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/desvincular.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-12" align="center">
				<span >DESVINCULAR O EQUIPAMENTO AO USUÁRIO</span>
			</div>
		</div>
		<br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="codigo"><b>Equipamentos:</b> <b class="obrigado">*</b></label>
			  <select class="form-control" id="codigo" onchange="search(this.value);">
			  <option value=""> -- Selecione o Equipamento -- </option>
			  <?php 
				$sqlEq = mysqli_query($con,"SELECT 
												a.codigo,
												a.patrimonio,
												a.tipo
											FROM
												equipamentos.equipamentos a inner join equipamentos.equipamentos_usuario b
												on a.codigo = b.codigo inner join
												equipamentos.colaborador c
												on c.matricula = b.matricula
												order by a.tipo asc")or die(mysqli_error($con));
				while($resEq = mysqli_fetch_array($sqlEq)){
					echo "<option value='".$resEq['codigo']."'>".$resEq['patrimonio']." - ".$resEq['tipo']."</option>";
				}
			  ?>
			  </select>
			</div>
		</div>
		</div>
		<br>
		<div style="margin-left: 5px;" id="retorno"></div>
		
		
		<div class="row h-25 justify-content-center align-items-center" >
			<div class="form-group col-md-4">
				  <input id="cadastrar" onclick="voltar();" style="color: white" type="button" class="btn btn-primary btn-lg" value="<< Voltar" />
			</div>
			<div class="form-group col-md-6">
			</div>
		</div>
		<br>

</body>
</html>