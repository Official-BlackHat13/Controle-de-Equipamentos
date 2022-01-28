<?php 
/*

	FORMULÁRIOS DE ANTENAS E AP

*/
function tipoAntena($con, $tipo){
?>
	
<?php
}

/*

	FORMULÁRIOS DE CELULAR

*/
function tipoCelular($con, $tipo){
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
						echo "<option value='".$resMat['patrimonio']."'>".$resMat['patrimonio']." - ".utf8_encode($resMat['tipo'])."</option>";
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
				  <label class="label" for="capinha"><b>Capinha / Película:</b></label>
				  <select class="form-control" id="capinha">
					 <option value=""> -- Selecione a Opção -- </option>
					 <option id="OK" value="OK">OK</option>
					 <option id="PENDENTE" value="PENDENTE">PENDENTE</option>
					 <option id="NÃO NECESSÁRIO" value="NÃO NECESSÁRIO">NÃO NECESSÁRIO</option>
				  </select>
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="imei"><b>IMEI:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="imei" placeholder="Digite o IMEI">
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
				  <label class="label" for="patrimonio"><b>Número do Patrimônio:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="patrimonio" placeholder="Digite o número do patrimônio">
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
				  <label class="label" for="tempoUso"><b>Tempo de Uso:</b> </label>
				  <input disabled type="text" class="form-control field" id="tempoUso" placeholder="Tempo de Uso">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="status"><b>Observações:</b> </label>
				  <textarea class="form-control" id="obs" placeholder="Digite aqui..." ></textarea>
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="hostname"><b>Compartilhado:</b></label>
				   &emsp;
				  <input type="checkbox" class="flags" id="flag" placeholder="Digite o hostname" >
				</div>
				<div class="col-md-4">
				  <label class="label" for="valor"><b>Valor:</b> </label>
				  <input type="text" class="form-control field" id="valor" placeholder="Digite o valor">
				</div>
			</div><br>
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


/*

	FORMULÁRIOS DE CADASTRO DE COLETORES

*/
function tipoColetor($con, $tipo){
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
						echo "<option value='".$resMat['patrimonio']."'>".$resMat['patrimonio']." - ".utf8_encode($resMat['tipo'])."</option>";
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
				  <label class="label" for="partNumber"><b>PN:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="partNumber" placeholder="Digite o PN">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="sn"><b>SN:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="sn" placeholder="Digite o SN">
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
				  <label class="label" for="patrimonio"><b>Número do Patrimônio:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="patrimonio" placeholder="Digite o número do patrimônio">
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
				  <label class="label" for="tempoUso"><b>Tempo de Uso:</b> </label>
				  <input disabled type="text" class="form-control field" id="tempoUso" placeholder="Tempo de Uso">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="status"><b>Observações:</b> </label>
				  <textarea class="form-control" id="obs" placeholder="Digite aqui..." ></textarea>
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="hostname"><b>Compartilhado:</b></label>
				   &emsp;
				  <input type="checkbox" class="flags" id="flag" placeholder="Digite o hostname">
				</div>
				<div class="col-md-4">
				  <label class="label" for="valor"><b>Valor:</b> </label>
				  <input type="text" class="form-control field" id="valor" placeholder="Digite o valor">
				</div>
			</div><br>
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

/*

	FORMULÁRIOS DE CADASTRO DE NOTEBOOK, DESKTOP E AIO

*/
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
						echo "<option value='".$resMat['patrimonio']."'>".$resMat['patrimonio']." - ".utf8_encode($resMat['tipo'])."</option>";
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
				  <label class="label" for="tempoUso"><b>Tempo de Uso:</b> </label>
				  <input disabled type="text" class="form-control field" id="tempoUso" placeholder="Tempo de Uso">
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="hostname"><b>Compartilhado:</b></label>
				   &emsp;
				  <input type="checkbox" class="flags" id="flag" placeholder="Digite o hostname">
				</div>
				<div class="form-group col-md-4">
					 <label class="label" for="valor"><b>Valor:</b> </label>
				   <input type="text" class="form-control field" id="valor" placeholder="Digite o valor">
				</div>
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
				<div class="form-group col-md-4">
				</div>
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

/*

	FORMULÁRIOS DE IMPRESSORA

*/
function tipoImpressora($con, $tipo){
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
						echo "<option value='".$resMat['patrimonio']."'>".$resMat['patrimonio']." - ".utf8_encode($resMat['tipo'])."</option>";
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
				  <label class="label" for="cartucho"><b>Toner / Cartucho:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="cartucho" placeholder="Digite as informações">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="ip"><b>IP:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="ip" placeholder="255.255.255.0">
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
				  <label class="label" for="patrimonio"><b>Número do Patrimônio:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="patrimonio" placeholder="Digite o número do patrimônio">
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
				  <label class="label" for="tempoUso"><b>Tempo de Uso:</b> </label>
				  <input disabled type="text" class="form-control field" id="tempoUso" placeholder="Tempo de Uso">
				</div>
				<div class="form-group col-md-4">
				   <label class="label" for="local"><b>Local:</b> </label>
				    <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="local" placeholder="Digite o local">
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="col-md-4">
					<label class="label" for="obs"><b>Observações:</b> </label>
					<textarea class="form-control" id="obs" placeholder="Digite aqui..." ></textarea>
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="hostname"><b>Compartilhado:</b></label>
				   &emsp;
				  <input type="checkbox" class="flags" id="flag" placeholder="Digite o hostname">
				</div>
			</div><br>
			
			
			<div class="row justify-content-around align-self-center">
				<div class="col-md-4">
				   
				</div>
				<div class="form-group col-md-4">
					<label class="label" for="valor"><b>Valor:</b> </label>
				    <input type="text" class="form-control field" id="valor" placeholder="Digite o valor">
				</div>
			</div><br>
			
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


/*

	FORMULÁRIOS DE LINHAS MOVEIS

*/
function tipoLinhasMoveis($con, $tipo){
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
						echo "<option value='".$resMat['patrimonio']."'>".$resMat['patrimonio']." - ".utf8_encode($resMat['tipo'])."</option>";
					}	
				?>
				</select>
			</div>
		    <div class="form-group col-md-4">
			</div>
		</div><br>
			
		<div class="row justify-content-around align-self-center">
			<div class="form-group col-md-4">
				<label class="label" for="patrimonio"><b>Número da Linha:</b> <b class="obrigado">*</b></label>
				<input type="text" onkeyup="maiuscula(this);" class="form-control field" id="patrimonio" placeholder="Digite o patrimonio">
			</div>
			<div class="form-group col-md-4">
		 	    <label class="label" for="valor"><b>Valor:</b> </label>
				<input type="text" class="form-control field" id="valor" placeholder="Digite o valor">
			</div>
		</div><br>
						
		<div class="row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			  <label class="label" for="status"><b>Status:</b> <b class="obrigado">*</b></label>
				  <select id="status" class="form-control field">
					<option value=""> -- Selecione o Status -- </option>
					<option id="EM USO" value="EM USO">EM USO</option>
					<option id="BACKUP" value="BACKUP">BACKUP</option>
					<option id="COM PROBLEMA" value="COM PROBLEMA">COM PROBLEMA</option>
				  </select>
			</div>
			<div class="form-group col-md-4">
				  <label class="label" for="plano"><b>Plano:</b> <b class="obrigado">*</b></label>
				  <input type="text" class="form-control" onkeyup="maiuscula(this);" id="plano" value="" placeholder="Digite o plano" />
			</div>
		</div><br>
		
		<div class="row justify-content-around align-self-center">
			<div class="form-group col-md-4">
			    <label class="label" for="hostname"><b>Compartilhado:</b></label>
				   &emsp;
				<input type="checkbox" class="flags" id="flag" placeholder="Digite o hostname" >
			</div>
			<div class="form-group col-md-4">
				<label class="label" for="obs"><b>Observações:</b> </label>
			    <textarea class="form-control" id="obs" placeholder="Digite aqui..." ></textarea>
			</div>
		</div><br>
		
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


/*

	FORMULÁRIOS DE MODEM

*/
function tipoModem($con, $tipo){
	
}


/*

	FORMULÁRIOS DE MONITOR

*/
function tipoMonitor($con, $tipo){
	
}

/*

	FORMULÁRIOS DE PROJETOR E SCANNER

*/
function tipoProjetor($con, $tipo){
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
						echo "<option value='".$resMat['patrimonio']."'>".$resMat['patrimonio']." - ".utf8_encode($resMat['tipo'])."</option>";
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
				  <label class="label" for="sn"><b>SN:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="sn" placeholder="Digite o SN">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="local"><b>Local:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="local" placeholder="Digite o local">
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
				  <label class="label" for="patrimonio"><b>Número do Patrimônio:</b> <b class="obrigado">*</b> </label>
				  <input type="text" onkeyup="maiuscula(this);" class="form-control field" id="patrimonio" placeholder="Digite o número do patrimônio">
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
				  <label class="label" for="tempoUso"><b>Tempo de Uso:</b> </label>
				  <input disabled type="text" class="form-control field" id="tempoUso" placeholder="Tempo de Uso">
				</div>
				<div class="form-group col-md-4">
				  <label class="label" for="status"><b>Observações:</b> </label>
				  <textarea class="form-control" id="obs" placeholder="Digite aqui..." ></textarea>
				</div>
			</div><br>
			
			<div class="row justify-content-around align-self-center">
				<div class="form-group col-md-4">
				  <label class="label" for="hostname"><b>Compartilhado:</b></label>
				   &emsp;
				  <input type="checkbox" class="flags" id="flag" placeholder="Digite o hostname">
				</div>
				<div class="col-md-4">
					<label class="label" for="valor"><b>Valor:</b> </label>
				    <input type="text" class="form-control field" id="valor" placeholder="Digite o valor">
				</div>
			</div><br>
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


/*

	FORMULÁRIOS DE SERVIDORES

*/
function tipoServidores($con, $tipo){
	
}


/*

	FORMULÁRIOS DE SWITCH

*/
function tipoSwitch($con, $tipo){
	
}


/*

	FORMULÁRIOS DE TABLET

*/
function tipoTablet($con, $tipo){
	
}


?>