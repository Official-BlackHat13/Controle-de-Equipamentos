function redireciona(tela){
	
	switch(tela){
		case 1:
			location.href="pedido_view.php";
		break;
		case 2:
			location.href="pedido_geral.php";
		break;
		default:
			alert("OPÇÃO INVÁLIDA!");
	}
	
}

function voltar(){
	location.href="index.php";
}