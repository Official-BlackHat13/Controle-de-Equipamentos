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
<link rel="stylesheet" href="css/multselect.css">
<script src="js/cad_pedido.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-12 text-center">
				Solicite seu Equipamento Abaixo
			</div>
		</div>
		<br>
		
		<input type="hidden" id="user" value="<?=$nome_usuario?>" />
		<input type="hidden" id="equipamentos" value="" style="width: 100%;" />
		<div class="form-row justify-content-around align-self-center">
			
			<div class="form-group col-md-5">
			  <label class="label" for="busca"><b>Lista de Equipamentos:</b> <b class="obrigado">*</b></label>
			    
				<div class="multiselect">
					<div class="selectBox" onclick="showCheckboxes()">
					  <select class="form-control" id="listas">
						<option> -- Selecione um Equipamento -- </option>
					  </select>
					  <div class="overSelect"></div>
					</div>
					<div id="checkboxes">
					  <label for="one" onclick="getValue(0);">
						&nbsp;&nbsp;<input type="checkbox" class="lista" onclick="getValue(0);" value="Celular" />&emsp;Celular 		  		  
					  </label>
					  <label for="two" onclick="getValue(1);">
						&nbsp;&nbsp;<input type="checkbox" class="lista" onclick="getValue(1);"  value="Celular com chip" />&emsp;Celular com Chip
					  </label>
					  <label for="three" onclick="getValue(2);">
						&nbsp;&nbsp;<input type="checkbox" class="lista" onclick="getValue(2);"  value="Computador" />&emsp;Computador
					  </label>
					  <label for="four" onclick="getValue(3);">
						&nbsp;&nbsp;<input type="checkbox" class="lista" onclick="getValue(3);" value="Notebook" />&emsp;Notebook
					  </label>
					  <label for="five" onclick="getValue(4);">
						&nbsp;&nbsp;<input type="checkbox" class="lista" onclick="getValue(4);" value="Coletor" />&emsp;Coletor
					  </label>
					  <label for="six" onclick="getValue(5);">
						&nbsp;&nbsp;<input type="checkbox" class="lista" onclick="getValue(5);" value="Impressora" />&emsp;Impressora
					  </label>
					</div>
				</div>
			</div>
		
			<div class="form-group col-md-5">
			  <label class="label" for="usuario"><b>Nome dos Colaboradores:</b> <b class="obrigado">*</b></label>
			  <select class="form-control" id="usuario">
				<option value=""> -- Selecione um Colaborador -- </option>
				<?php 
					$usuario = '31131826';
					$sql = mysqli_query($con,"SELECT cpf, upper(nome) nome FROM equipamentos.colaborador where gestor = '".$usuario."' order by nome")or die(mysqli_error($con));
					while($result = mysqli_fetch_array($sql)){
						extract($result);
						echo "<option value='".$cpf."'>".$nome."</option>";
					}
				?>
			  </select>
			</div>
		</div><br>
	
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-5">
			  <label class="label" for="obs"><b>Observação:</b></label>
			  <textarea class="form-control" id="obs" placeholder="Digite uma observação..."></textarea>
			</div>
			<div class="form-group col-md-5">
			</div>
		</div><br>
		
	
				
		<br>
		
		<div class="row justify-content-center align-self-center">
			<div class="form-group col-md-4">
				  <input id="voltar" onclick="voltar();" style="color: white" type="button" class="btn btn-primary btn-lg" value="<< Voltar" />
			</div>
			<div class="form-group col-md-6">
				  <input id="cadastrar" onclick="salvarPedido();" type="button" class="btn btn-success btn-lg" value="Confirmar Solicitação" />
			</div>
		</div>
		<br>
		<br>
	</div>

</body>
</html>