<?php
include('../controle.php');

$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
$action = $_REQUEST['action'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Vincular Equipamento ao Usuário</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="bootstrap/css/icon-font.min.css">
<link rel="stylesheet" href="css/custom.css">
<script src="js/maquina_usuario.js"></script>
</head>
<body>

	<div class="container">
		<div class="row justify-content-center align-self-center" id="title">
			<div class="col-md-12" align="center">
				<span >ATRIBUIR O EQUIPAMENTO AO USUÁRIO</span>
			</div>
		</div>
		<br>
		
		<?php 
			$buscaListaG = mysqli_query($con,"select group_concat('\"',matricula,'\"') listaGenerica from equipamentos.colaborador where generico = 'Y'")or die(mysqli_error($con));
			$resultListaG = mysqli_fetch_array($buscaListaG);
		?>
		<input type="hidden" id="listaGenerica" value='<?php echo $resultListaG['listaGenerica']; ?>' />
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="tipo"><b>Tipo:</b> <b class="obrigado">*</b></label>
			  <select class="form-control" id="tipo" onchange="selectionTipo(this.value);">
			  <option value=""> -- Selecione o Tipo -- </option>
			  <?php
				$sqlTipo = mysqli_query($con,"select tipo from equipamentos.equipamentos group by tipo order by tipo asc")or die(mysqli_error($con));
				while($resEq = mysqli_fetch_array($sqlTipo)){
					echo "<option value='".$resEq['tipo']."'>".$resEq['tipo']."</option>";
				}
			  ?>
			  </select>
			</div>
			<input type="hidden" id="status" value="" />
			<div class="form-group col-md-7">
				<div id="patr"  style="display: none;">
					<label class="label" for="patrimonio"><b>Equipamento:</b> <b class="obrigado">*</b></label>
					<select class="form-control" id="patrimonio" onchange="selection(this.value);">
						<option value=""> -- Selecione o Equipamento -- </option>
					</select>
				</div>
			</div>
		</div><br>
		
		<div class="form-row justify-content-around align-self-center">
			<div class="form-group col-md-11">
				<div id="colab"  style="display: none;">	
				  <label class="label" for="matricula"><b>Colaborador:</b> <b class="obrigado">*</b></label>
				   <select class="form-control" id="matricula" >
				  <option value=""> -- Selecione o Usuário -- </option>
				  <?php 
					$sqlCo = mysqli_query($con,"SELECT matricula, nome FROM equipamentos.colaborador where generico <> 'Y' order by nome asc")or die(mysqli_error($con));
					while($resCo = mysqli_fetch_array($sqlCo)){
						echo "<option value='".$resCo['matricula']."'>".utf8_encode($resCo['nome'])."</option>";
					}
				  ?>
				  </select>
				</div>
				<div id="generic"  style="display: none;">
					<label class="label" for="matricula"><b>Colaborador:</b> <b class="obrigado">*</b></label>
					<div style="display:flex">
						<select class="form-control esqect" id="select1" multiple>
						  <?php 
							$con = mysqli_connect("localhost","root","","camara_fria")or die("FALHA NA COMUNICAÇÃO COM BANCO");
							$sql = mysqli_query($con,"SELECT matricula, nome FROM equipamentos.colaborador order by nome asc")or die(mysqli_error($con));
							while($result = mysqli_fetch_array($sql)){
								echo "<option value='".$result['matricula']."'>".utf8_encode($result['nome'])."</option>";
							}
						  ?>
						</select>
						<div style="display:flex;  flex-wrap: wrap; align-content:center;">
							<button class="btn btn-primary dir" id="dir" onclick="adicionar();">
								<i class="fa fa-arrow-right" aria-hidden="true"></i>
							</button>
							<button class="btn btn-primary esq" id="esq" onclick="remover();">
								<i class="fa fa-arrow-left" aria-hidden="true"></i>
							</button>
						</div>
						<select class="form-control direct" multiple id="select2" ></select>
					</div><br>
				</div>
			</div>
			<div class="form-group col-md-3"></div>
		</div>
		<!-- onclick="vincular();" -->
		<div class="row h-25 justify-content-around align-items-center" >
			<div class="form-group col-md-4">
				  <input onclick="voltar();" style="color: white" type="button" class="btn btn-primary btn-lg" value="<< Voltar" />
			</div>
			<div class="form-group col-md-6">
				  <input id="cadastrar" onclick="notify();" disabled type="button" class="btn btn-success btn-lg" value="Confirmar Vinculo" />
			</div>
		</div>
		<br>
	</div>

</body>
</html>