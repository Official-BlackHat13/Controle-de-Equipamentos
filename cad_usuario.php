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
			  <label class="label" for="busca"><b>Lista de Colaboradores:</b> <b class="obrigado">*</b></label>
			  <select class="form-control" id="busca" onchange="autoComplete(2);">
			  <option value=""> -- Selecione o Usuário -- </option>
			  <?php 
				$sqlMat = mysqli_query($con,"SELECT matricula, nome FROM equipamentos.colaborador order by nome asc")or die(mysqli_error($con));
				while($resMat = mysqli_fetch_array($sqlMat)){
					echo "<option value='".$resMat['matricula']."'>".utf8_encode($resMat['nome'])."</option>";
				}
			  ?>
			  </select>
			</div>
			<div class="form-group col-md-4 text-center"><br>
				<button id="relatorio" onclick="listaUsuarios();" type="button" class="btn btn-primary btn-lg">
					<i class="fa fa-search"></i> 
					&nbsp;Listar Usuários
				</button>
			</div>
		</div><br>
		
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
			<div class="form-group col-md-4"><br>
				<label class="label" for="terceiro"><b>Terceiro:</b></label>
				&emsp;
				<input type="checkbox" class="flags" id="terceiro" placeholder="Digite o hostname">
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
			<div class="form-group col-md-2">
				  <input id="cadastrar" onclick="location.reload();" type="button" class="btn btn-info btn-lg" value="Novo Cadastro" />
			</div>
		</div>
		<br>
		<br>
	</div>

</body>
</html>