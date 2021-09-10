<?php
include('../controle.php');

$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Vincular Equipamento ao Usuário</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/maquina_usuario.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-12" align="center">
				<span >ATRIBUIR O EQUIPAMENTO AO USUÁRIO</span>
			</div>
		</div>
		<br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="codigo"><b>Equipamentos:</b> <b class="obrigado">*</b></label>
			  <select class="form-control" id="codigo">
			  <option value=""> -- Selecione o Equipamento -- </option>
			  <?php 
				$sqlEq = mysqli_query($con,"SELECT 
												a.codigo,
												a.patrimonio,
												a.tipo
											FROM
												equipamentos.equipamentos a left join
												equipamentos.equipamentos_usuario b
												on a.codigo = b.codigo
											where b.codigo is null
											order by tipo asc")or die(mysqli_error($con));
				while($resEq = mysqli_fetch_array($sqlEq)){
					echo "<option value='".$resEq['codigo']."'>".$resEq['patrimonio']." - ".$resEq['tipo']."</option>";
				}
			  ?>
			  </select>
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="matricula"><b>Colaborador:</b> <b class="obrigado">*</b></label>
			   <select class="form-control" id="matricula">
			  <option value=""> -- Selecione o Usuário -- </option>
			  <?php 
				$sqlCo = mysqli_query($con,"SELECT matricula, nome FROM equipamentos.colaborador order by nome asc")or die(mysqli_error($con));
				while($resCo = mysqli_fetch_array($sqlCo)){
					echo "<option value='".$resCo['matricula']."'>".$resCo['nome']."</option>";
				}
			  ?>
			  </select>
			</div>
		</div><br>
		<br>
		<br>
		<br>
		
		<div class="row h-25 justify-content-around align-items-center" >
			<div class="form-group col-md-4">
				  <input id="cadastrar" onclick="voltar();" style="color: white" type="button" class="btn btn-primary btn-lg" value="<< Voltar" />
			</div>
			<div class="form-group col-md-6">
				  <input id="cadastrar" onclick="vincular();" type="button" class="btn btn-success btn-lg" value="Confirmar Vinculo" />
			</div>
		</div>
		<br>
	</div>

</body>
</html>