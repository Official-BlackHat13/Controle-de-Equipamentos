<?php 
function tipoAntena($con, $tipo){
?>
	
<?php
}

function tipoCelular($con, $tipo){
	
}

function tipoColetor($con, $tipo){
	
}

function tipoMaquinas($con, $tipo){
?>
		<div class="col-md-12">
			<div class="row justify-content-around align-self-center">	
				<div class="form-group col-md-4">
				  <label class="label" for="busca"><b>Lista de Equipamentos:</b> <b class="obrigado">*</b></label>
				  <select class="form-control" id="busca" onchange="autoComplete(1);" >
				  <option value=""> -- Selecione o Equipamento -- </option>
				  <?php 
				  
					$sqlMat = mysqli_query($con,"SELECT codigo, patrimonio, tipo FROM equipamentos.equipamentos where tipo = '".$tipo."' order by tipo asc")or die(mysqli_error($con));
					while($resMat = mysqli_fetch_array($sqlMat)){
						echo "<option value='".$resMat['codigo']."'>".$resMat['patrimonio']." - ".utf8_encode($resMat['tipo'])."</option>";
					}
					
				  ?>
				  </select>
				</div>
				<div class="form-group col-md-4">
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="marca"><b>Marca:</b> <b class="obrigado">*</b></label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="marca" placeholder="Digite a marca">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="modelo"><b>Modelo:</b> <b class="obrigado">*</b></label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="modelo" placeholder="Digite o modelo">
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">	
				<div class="form-group col-md-4">
				  <label class="label" for="partNumber"><b>PN / SN / Service Tag:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="partNumber" placeholder="Digite o part number">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="patrimonio"><b>Número do Patrimônio:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="patrimonio" placeholder="Digite o número do patrimônio">
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="status"><b>Status:</b> <b class="obrigado">*</b></label>
				  <select id="status" class="form-control field">
					<option value=""> -- Selecione o Status -- </option>
					<option id="EM USO" value="EM USO">EM USO</option>
					<option id="PARA DOAÇÃO" value="PARA DOAÇÃO">PARA DOAÇÃO</option>
					<option id="BACKUP" value="BACKUP">BACKUP</option>
					<option id="DESCARTE" value="DESCARTE">DESCARTE</option>
				  </select>
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="status"><b>Observações:</b> </label>
				  <textarea class="form-control" id="obs" placeholder="Digite aqui..." ></textarea>
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="numNF"><b>Número da NF de compra:</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="numNF" placeholder="Digite o número da NF de compra">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="dateNF"><b>Data NF de compra:</b> </label>
				  <input type="date"  class="form-control field" id="dateNF" onchange="tempoUso();"  placeholder="Digite o Nome Fantasia">
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="hostname"><b>Hostname:</b> <b class="obrigado">*</b></label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="hostname" placeholder="Digite o hostname">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="tempoUso"><b>Tempo de Uso:</b> <b class="obrigado">*</b></label>
				  <input disabled type="text" onkeyup="maiuscula(this);" class="form-control field" id="tempoUso" placeholder="Tempo de Uso">
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="hostname"><b>Compartilhado:</b></label>
				   &emsp;
				  <input type="checkbox" class="flags" id="flag" placeholder="Digite o hostname" onclick="teste();">
				</div>
				<div class="form-group col-md-4"></div>
			</div>
		</div><br>
		
		<center>
			<div class=" col-md-10 border border-success rounded" style="padding: 10px;">
				<div class="form-row justify-content-center align-self-center ">
					<div class="form-group text-center">
					  <label class="label" for="hostname"><b>Configurações:</b> </label>
					</div>
				</div>
			</div>
		</center><br>
		
			<div class="row justify-content-around align-self-center ">
				<div class="form-group col-md-4">
				  <label class="label" for="cpu"><b>Processador:</b> <b class="obrigado">*</b></label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="cpu" placeholder="Digite a configuração">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="memoria"><b>Memória:</b> <b class="obrigado">*</b></label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="memoria" placeholder="Digite a configuração">
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center ">
				<div class="form-group col-md-4">
				  <label class="label" for="hd"><b>HD:</b> <b class="obrigado">*</b></label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="hd" placeholder="Digite a configuração">
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
		</div>
		<br>
<?php	
}

function tipoImpressora($con, $tipo){
	
}

function tipoLinhasMoveis($con, $tipo){
	
}

function tipoModem($con, $tipo){
	
}

function tipoMonitor($con, $tipo){
	
}


function tipoProjetor($con, $tipo){
	
}

function tipoScanner($con, $tipo){
	
}

function tipoServidores($con, $tipo){
	
}

function tipoSwitch($con, $tipo){
	
}

function tipoTablet($con, $tipo){
	
}


?>