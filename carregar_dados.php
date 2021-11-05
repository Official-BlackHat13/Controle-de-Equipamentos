<?php 

	//carregar a classe PHPExcel
	require_once('Classes/PHPExcel.php');
 	
	$con = mysqli_connect("localhost","adminwebsorocaba","VmtefuQffnq6T6US","equipamentos")or die("<h1>FALHA NA CONEXÃO COM BANCO DE DADOS</h1>");
	
	//iniciar o objeto
	$objReader = new PHPExcel_Reader_Excel5();
	$objReader->setReadDataOnly(true);
	$objPHPExcel = $objReader->load("Dados_Colaboradores.xls");
	
	//pegar o total de colunas
	//$colunas = $objPHPExcel->setActiveSheetIndex(0)->getHighestColumn();
	//$total_colunas = PHPExcel_Cell::columnIndexFromString($colunas);
	
	//pegar o total de linhas
    //$total_linhas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
	
	$sheet = $objPHPExcel->getSheet(0); 
	$highestRow = $sheet->getHighestRow(); 
	$highestColumn = $sheet->getHighestColumn();
	
	$objWorksheet = $objPHPExcel->getActiveSheet();

	$i=1;
	foreach ($objWorksheet->getRowIterator() as $row) {

		$column_A_Value = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();//column A
		$column_B_Value = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();//column B
		$column_C_Value = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();//column C
		//you can add your own columns B, C, D etc.
		
		if($i > 1){
			//echo $column_A_Value." - ";
			//echo $column_B_Value." - ";
			//echo $column_C_Value."<br>";
			
			$sql = mysqli_query($con,"select * from equipamentos.colaborador where matricula = '".$column_A_Value."'")or die(mysqli_error($con));
			
			while($result = mysqli_fetch_array($sql)){
				extract($result);
				echo $matricula." - ".$column_C_Value."<br>";
			}
			
			$update = mysqli_query($con,"UPDATE `equipamentos`.`colaborador` SET `cpf`='".$column_C_Value."' WHERE `matricula`= '".$column_A_Value."'")or die(mysqli_error($con));
			
			//inset $column_A_Value value in DB query here
			/*
			$insert = mysqli_query($con,"insert into testes.atividades 
										(
											Id, 
											beeCnpj__AtividadeEconomicaPrincipal__c
										) 
										values 
										(
											'".$column_A_Value."',
											'".$column_B_Value."'
										)")or die(mysqli_error($con));
			*/
		}

		
		/*
		
		*/
		$i++;
	}
	
	//echo "<table border='1'>";
	
	// navegar nas linhas
	//for($linha=0; $linha <= $total_linhas; $linha++){
		//echo "<tr>";
		// navegar nas colunas
		//for($coluna=0; $coluna <= $total_colunas-1; $coluna++){
			//if($linha == 1){
				//echo "<th>".utf8_decode($objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue())."</th>";
			//}else{
				//echo "<td>".$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue()."</td>";
				
				/*
				$insert = mysqli_query($con,"insert into testes.atividades 
													(
														Id, 
														beeCnpj__AtividadeEconomicaPrincipal__c
													) 
													values 
													(
														'".$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue()."',
														'".$objPHPExcel->getActiveSheet()->getCellByColumnAndRow($coluna,$linha)->getValue()."'
													)")or die(mysqli_error($con));
				*/
			//}
		//}
		//echo "</tr>";
	//}
	
	//echo "</table>";

