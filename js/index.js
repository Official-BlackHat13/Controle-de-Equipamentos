function redireciona(tela){
	
	switch(tela){
		case 1:
			location.href="cad_equipamentos.php";
		break;
		case 2:
			location.href="cad_usuario.php";
		break;
		case 3:
			location.href="maquina_usuario.php";
		break;
		case 4:
			location.href="lista_dados.php";
		break;
		default:
			alert("OPÇÃO INVÁLIDA!");
	}
	
	
}