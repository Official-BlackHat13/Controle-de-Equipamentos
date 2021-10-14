<?php
include('../controle.php');
$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");

?>
<!DOCTYPE html>
<html>
<head>
<title>Cadastro de Equipamentos</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/equipamentos.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-12 text-center">
				Cadastro de Equipamento
			</div>
		</div>
		<br>
	
		<div class="form-row justify-content-around align-self-center">
			<input type="hidden" id="user" value="<?=$nome_usuario?>" />
			<div class="form-group col-md-4">
				 <label class="label" for="tipo"><b>Tipo:</b></label>
				 <select class="form-control" id="tipo" onchange="carregar(this.value);" >
				  <?php 
					$sqlType = mysqli_query($con,"select equipamento from equipamentos.lista_equipamentos order by equipamento asc")or die(mysqli_error($con));
					while($resType = mysqli_fetch_array($sqlType)){
						echo "<option value='".$resType['equipamento']."'>".$resType['equipamento']."</option>";
					}
				  ?>
				  </select>
			</div>
		</div>
		<br>
		<br>
		<div id="retorno"></div>
		
	</div>

</body>
</html>