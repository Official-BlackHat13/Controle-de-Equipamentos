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
					echo "<option value='".$resMat['matricula']."'>".$resMat['nome']."</option>";
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
		    <div class="form-group col-md-2">
				<label class="label" for="generico"><b>Genérico:</b></label>
				&emsp;
				<input type="checkbox" class="flags" id="generico" onclick="checar();">
			</div>
			<div class="col-md-6"></div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4" id="cult1">
			  <label class="label" for="cpf"><b>CPF:</b> <b class="obrigado">*</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" onchange="verificarCPF(this.value);" class="form-control field" id="cpf" placeholder="Digite o CPF">
			</div>
			<div class="form-group col-md-4" id="cult2" style="display: none;">
			  <label class="label" for="id"><b>ID:</b> </label>
			  <input type="text" onkeyup="maiuscula(this);"  class="form-control field" id="id" placeholder="Digite uma Identificação">
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="setor"><b>Setor:</b> <b class="obrigado">*</b></label>
			  <select class="form-control" id="setor">
				<option value=""> -- Selecione um Setor -- </option>
				<?php 
					$sql1 = mysqli_query($con,"SELECT upper(setor) setor FROM equipamentos.colaborador group by setor order by setor")or die(mysqli_error($con));
					while($result1 = mysqli_fetch_array($sql1)){
						extract($result1);
						echo "<option id='".$setor."' value='".$setor."'>".$setor."</option>";
					}
				?>
			  </select>
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="gestor"><b>Gestor:</b> </label>
			  <select class="form-control" id="gestor">
				 <option value=""> -- Selecione um Gestor -- </option>
				 <?php 
					$sql2 = mysqli_query($con,"SELECT usuario, nome FROM equipamentos.gestores order by nome")or die(mysqli_error($con));
					while($result2 = mysqli_fetch_array($sql2)){
						extract($result2);
						echo "<option id='".$usuario."' value='".$usuario."'>".$nome."</option>";
					}
				  ?>
			  </select>
			</div>
			<div class="form-group col-md-4">
			  <label class="label" for="funcao"><b>Função:</b> <b class="obrigado">*</b> </label>
			  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="funcao" placeholder="Digite a função">
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4"><br>
				<label class="label" for="terceiro"><b>Terceiro:</b></label>
				&emsp;
				<input type="checkbox" class="flags" id="terceiro" placeholder="Digite o hostname">
			</div>
			<div class="form-group col-md-4"></div>
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