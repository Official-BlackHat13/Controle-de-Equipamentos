<?php 
include('../controle.php');

$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
?>
<!DOCTYPE html>
<html>
<head>
<title>Lista de Pedidos</title>
<meta charset="UTF-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/pedido_view.js"></script>
</head>
<body onload="listarAll();">

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-1 text-left">
				<i class="fa fa-arrow-circle-left fa-2x" id="back" onclick="voltar();"></i>
				<p class='voltar'>VOLTAR</p>
			</div>
			<div class="col-md-11" align="center">
				LISTA DE SOLICITAÇÕES GERAL (NOS ÚLTIMOS 6 MESES)
			</div>
		</div>
		<br>
		
		<div class="row justify-content-center align-self-center">
			<input type="hidden" id="perfil" value="<?=$perfil?>" />
			<input type="hidden" id="id_user" value="<?=$id_usuario?>" />
		    <label><b>Setor:</b></label>
			<div class="col-md-4">
				<select class="form-control" id="equipamento" onchange="filtrarAll();">
					<option value=""> -- Selecionar um Equipamento -- </option>
					<option value="Celular">Celular</option>
					<option value="Celular com chip">Celular com chip</option>
					<option value="Computador">Computador</option>
					<option value="Notebook">Notebook</option>
					<option value="Coletor">Coletor</option>
					<option value="Impressora">Impressora</option>
				</select>
			</div>
			&emsp;
			<div class="col-md-3">
				<input type="text" onkeyup="maiuscula(this);" id="filtro" placeholder="Faça sua pesquisa..." class="form-control" />
			</div>
			<div class="col-md-2">
				<button class='btn btn-primary botoes' onclick='filtrarAll();'><i class='fa fa-search'></i></button>
				&nbsp;
				<button class='btn btn-success botoes' onclick='relatorio();'><i class="fa fa-file-excel-o"></i></button>
			</div>
		</div>
		<br>
		
		<div id="retorno"></div>
	</div>

</body>
</html>