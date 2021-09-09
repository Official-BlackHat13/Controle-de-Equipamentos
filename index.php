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
<script src="js/index.js"></script>
</head>
<body>

<div class="container">
	<div class="row justify-content-center align-self-center" id="title">
		CONTROLE DE EQUIPAMENTO
	</div><br><br>

	<div class="row justify-content-around align-self-center">
		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(1);">
					<i class="fa fa-laptop fa-2x"></i><br><br>
					EQUIPAMENTOS
				</button>
			</div>
		</div>
		
		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(2);">
					<i class="fa fa-users fa-2x"></i><br><br>
					COLABORADORES
				</button>
			</div>
		</div>
	
		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(3);">
					<i class="fa fa-id-card fa-2x"></i><br><br>
					EQUIPAMENTOS PARA USUÁRIO
				</button>
			</div>
		</div>
		
		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(4);">
					<i class="fa fa-eye fa-2x"></i><br><br>
					VISUALIZAR CADASTRO
				</button>
			</div>
		</div>
	</div>
	
	<br><br>
</div>

</body>
</html>

