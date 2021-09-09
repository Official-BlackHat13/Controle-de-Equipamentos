<?php
include('../controle.php');
$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Cadastro de Equipamentos</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/equipamentos.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-12 text-center">
				Cadastro de Equipamento
			</div>
		</div>
		<br>
		
		<input type="hidden" id="user" value="<?=$nome_usuario?>" />
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="busca"><b>Lista de Equipamentos:</b> <b class="obrigado">*</b></label>
			  <select class="form-control" id="busca" onchange="autoComplete(1);" >
			  <option value=""> -- Selecione o Equipamento -- </option>
			  <?php 
				$sqlMat = mysqli_query($con,"SELECT codigo, patrimonio, tipo FROM equipamentos.equipamentos order by tipo asc")or die(mysqli_error($con));
				while($resMat = mysqli_fetch_array($sqlMat)){
					echo "<option value='".$resMat['codigo']."'>".$resMat['patrimonio']." - ".$resMat['tipo']."</option>";
				}
			  ?>
			  </select>
			</div>
			<div class="form-group col-md-4">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="tipo"><b>Tipo:</b> <b class="obrigado">*</b></label>
			  <input type="text" autofocus onkeyup="maiuscula(this);"  class="form-control field" id="tipo" placeholder="Digite o tipo do equipamento">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="marca"><b>Marca:</b> <b class="obrigado">*</b></label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="marca" placeholder="Digite a marca">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="modelo"><b>Modelo:</b> <b class="obrigado">*</b></label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="modelo" placeholder="Digite o modelo">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="partNumber"><b>PN / SN / Service Tag:</b> <b class="obrigado">*</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="partNumber" placeholder="Digite o part number">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="patrimonio"><b>Número do Patrimônio:</b> <b class="obrigado">*</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="patrimonio" placeholder="Digite o número do patrimônio">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="status"><b>Status:</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="status" placeholder="Digite o status">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="numNF"><b>Número da NF de compra:</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="numNF" placeholder="Digite o número da NF de compra">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="dateNF"><b>Data NF de compra:</b> </label>
			  <input type="date" onkeyup="maiuscula(this);" class="form-control field" id="dateNF" value="" placeholder="Digite o Nome Fantasia">
			</div>
		</div><br>
				
		<br>
		
		<div class="row justify-content-center align-self-center">
			<div class="form-group col-md-4">
				  <input id="cadastrar" onclick="voltar();" style="color: white" type="button" class="btn btn-primary btn-lg" value="<< Voltar" />
			</div>
			<div class="form-group col-md-6">
				  <input id="cadastrar" onclick="cadastrar();" type="button" class="btn btn-success btn-lg" value="Confirmar Cadastro" />
			</div>
		</div>
		<br>
		<br>
	</div>

</body>
</html>