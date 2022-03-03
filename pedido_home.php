<?php
include('../controle.php');

?>
<!Doctype html>
<html>
<head>
<title>Dashboard</title>
<meta charset="UTF-8" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/pedido_home.js"></script>
</head>
<body>

<div class="container">
	<div class="row justify-content-center align-self-center" id="title">
		<div class="col-md-1 text-left">
			<i class="fa fa-arrow-circle-left fa-2x" id="back" onclick="voltar();"></i>
			<p class='voltar'>VOLTAR</p>
		</div>
		<div class="col-md-11" align="center">
			ESCOLHA O TIPO DE LISTA ABAIXO
		</div>
	</div><br><br>

	<div class="row justify-content-around align-self-center">

		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(1);">
					<i class="fa fa-list-ul fa-2x"></i><br><br>
					LISTA DE SOLICITAÇÕES PENDENTES
				</button>
			</div>
		</div>
		
		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(2);">
					<i class="fa fa-list fa-2x" ></i><br><br>
					LISTA DE SOLICITAÇÕES GERAL
				</button>
			</div>
		</div>
	</div><br><br>
</div>

</body>
</html>

