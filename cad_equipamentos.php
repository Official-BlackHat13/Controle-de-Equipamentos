<?php
include('../controle.php');
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
			  <label class="label" for="partNumber"><b>Part Number / Serial Number:</b> <b class="obrigado">*</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="partNumber" placeholder="Digite o part number">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="serviceTag"><b>Service Tag:</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="serviceTag" placeholder="Digite o service tag">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="patrimonio"><b>Número do Patrimônio:</b> <b class="obrigado">*</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="patrimonio" placeholder="Digite o número do patrimônio">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="status"><b>Status:</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="status" placeholder="Digite o status">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="numNF"><b>Número da NF de compra:</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="numNF" placeholder="Digite o número da NF de compra">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="dateNF"><b>Data NF de compra:</b> </label>
			  <input type="date" onkeyup="maiuscula(this);" class="form-control field" id="dateNF" placeholder="Digite o Nome Fantasia">
			</div>
			<div class="form-group col-md-4">
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