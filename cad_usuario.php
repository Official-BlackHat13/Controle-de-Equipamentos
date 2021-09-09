<?php
include('../controle.php');
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
<script src="js/usuario.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-12 text-center">
				Cadastro de Colaboradores
			</div>
		</div>
		<br>
		
		<input type="hidden" id="user" value="<?=$nome_usuario?>" />
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="matricula"><b>Número da Matricula:</b> <b class="obrigado">*</b></label>
			  <input type="text" autofocus onkeyup="maiuscula(this);"  class="form-control field" id="matricula" placeholder="Digite a matricula do colaborador">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="nome"><b>Nome Completo:</b> <b class="obrigado">*</b></label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="nome" placeholder="Digite o nome">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="setor"><b>Setor:</b> <b class="obrigado">*</b></label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="setor" placeholder="Digite o setor">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="funcao"><b>Função:</b> <b class="obrigado">*</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="funcao" placeholder="Digite a função">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="gestor"><b>Gestor:</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="gestor" placeholder="Digite o gestor">
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