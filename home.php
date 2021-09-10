<?php
include('../controle.php');

$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Tela de Escolha</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/home.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-between align-self-center" id="title">
			<div class="col-md-1 text-left">
				<i class="fa fa-arrow-circle-left fa-2x" id="back" onclick="voltar();"></i>
				<p class='voltar'>VOLTAR</p>
			</div>
			<div class="col-md-10" align="center">
				<span style="margin-left: -180px;" >ESCOLHA A OPÇÃO ABAIXO</span>
			</div>
		</div>
		<br>
		<br>
		<br>
		
		<div class="row justify-content-around align-items-center" >
			<div class="col-md-3 text-center">
				<div class="btn-group">
					<button onclick="vincular();">
						<i class="fa fa-link fa-2x"></i><br><br>
						VINCULAR EQUIPAMENTO
					</button>
				</div>
			</div>
			<div class="col-md-3 text-center">
				<div class="btn-group">
					<button onclick="desvincular();">
						<i class="fa fa-unlock fa-2x" ></i><br><br>
						DESVINCULAR EQUIPAMENTO
					</button>
				</div>
			</div>
		</div>
		<br>
	</div>

</body>
</html>