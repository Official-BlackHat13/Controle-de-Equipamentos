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
		<?php if($perfil == "COORDENAÇÃO_TI" || $perfil == "TI_DESENV" || $perfil == "TI_INFRA"){ ?>
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
				<?php if($perfil == "TI_DESENV" || $perfil == "COORDENAÇÃO_TI"){ ?>
				<button onclick="redireciona(2);">
					<i class="fa fa-users fa-2x"></i><br><br>
					COLABORADORES
				</button>
				<?php }else{ ?>
				<button onclick="redireciona(6);">
					<i class="fa fa-users fa-2x"></i><br><br>
					COLABORADORES
				</button>
				<?php } ?>
			</div>
		</div>
	
		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(3);">
					<i class="fa fa-link fa-2x"></i><br><br>
					VINCULAR EQUIPAMENTO
				</button>
			</div>
		</div>
		
		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(4);">
					<i class="fa fa-unlock fa-2x" ></i><br><br>
					DESVINCULAR EQUIPAMENTO
				</button>
			</div>
		</div>
	</div><br><br>
	<div class="row justify-content-start align-self-center">	
		<div class="col-md-3 text-center">
			<div class="btn-group">
				<button onclick="redireciona(5);">
					<i class="fa fa-eye fa-2x"></i><br><br>
					VISUALIZAR CADASTRO
				</button>
			</div>
		</div>
	
		
		<?php if($perfil == "TI_DESENV"){ ?>
			<div class="col-md-3 text-center">
				<div class="btn-group">
					<button onclick="redireciona(7);">
						<i class="fa fa-cart-arrow-down fa-2x"></i><br><br>
						SOLICITAR EQUIPAMENTO
					</button>
				</div>
			</div>
		
			<div class="col-md-3 text-center">
				<div class="btn-group">
					<button onclick="redireciona(8);">
						<i class="fa fa-list-alt fa-2x"></i><br><br>
						LISTA DE SOLICITAÇÕES
					</button>
				</div>
			</div>
			<!--
			<div class="col-md-3 text-center">
				<div class="btn-group">
					<button onclick="redireciona(8);">
						<i class="fa fa-eye fa-2x"></i><br><br>
						VISUALIZAR CADASTRO TESTE
					</button>
				</div>
			</div>
			-->
		<?php } ?>
	</div>
	<?php }elseif($perfil == "TI_SISTEMAS" ){ ?>
		<div class="col-md-12 text-center">
			<div class="btn-group">
				<button onclick="redireciona(6);">
					<i class="fa fa-users fa-2x"></i><br><br>
					COLABORADORES
				</button>
			</div>
		</div>
	<?php }elseif($perfil == "DP" || $perfil == "DP_ASSIST"){ //158151  ?>
		<div class="col-md-12 text-center">
			<div class="btn-group">
				<button onclick="redireciona(5);">
					<i class="fa fa-eye fa-2x"></i><br><br>
					VISUALIZAR CADASTRO
				</button>
			</div>
		</div>
	<?php }else{
		echo "<br><br>
		      <div class='col-md-12 text-center'>
				<div class='btn-group'>
					<div class='alert alert-warning'>
						
						<h1><i class='fa fa-exclamation-triangle'></i> Você não tem acesso a essa tela!!!!!</h1>
					</div>
				</div>
			</div>";
	    } ?>
	<br><br>
</div>

</body>
</html>

