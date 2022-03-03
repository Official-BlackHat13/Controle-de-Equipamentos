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
			location.href="desvicular.php";
		break;
		case 5:
			location.href="lista_dados.php";
		break;
		case 6:
			location.href="lista_usuarios.php";
		break;
		case 7:
			location.href="cad_pedido.php";
		break;
		case 8:
			location.href="pedido_home.php";
		break;
		default:
			alert("OPÇÃO INVÁLIDA!");
	}
	
	
}