<?php 
$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
?>
<!DOCTYPE html>
<html>
<head>
<title>Lista de Usuários</title>
<meta charset="UTF-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/lista_usuarios.js"></script>
</head>
<body onload="listar();">

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-1 text-left">
				<i class="fa fa-arrow-circle-left fa-2x" id="back" onclick="voltar();"></i>
				<p class='voltar'>VOLTAR</p>
			</div>
			<div class="col-md-11" align="center">
				LISTA DE USUÁRIOS
			</div>
		</div>
		<br>
		
		<div class="row justify-content-center align-self-center">
		    <label><b>Setor:</b></label>
			<div class="col-md-3">
				<select class="form-control" id="setor">
					<option value=""> -- Selecionar o Setor -- </option>
					<?php 
						$sql = mysqli_query($con,"select setor from equipamentos.colaborador group by setor order by setor asc")or die(mysqli_error($con));
							
						while($result = mysqli_fetch_array($sql)){
							echo "<option value='".utf8_encode($result['setor'])."'>".utf8_encode($result['setor'])."</option>";
						}
					?>
				</select>
			</div>
			&emsp;
			<div class="col-md-3">
				<input type="text" onkeyup="maiuscula(this);" id="filtro" placeholder="Faça sua pesquisa..." class="form-control" />
			</div>
			<div class="col-md-2">
				<button class='btn btn-primary' onclick='filtrar();'><i class='fa fa-search'></i></button>
				&nbsp;
				<button class='btn btn-success' onclick='relatorio();'><i class="fa fa-file-excel-o"></i></button>
			</div>
		</div>
		<br>
		
		<div id="retorno"></div>
	</div>

</body>
</html>