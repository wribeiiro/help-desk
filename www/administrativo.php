<?php
	
	include_once 'inc/header.php';
	include_once 'inc/menu.php';
	
	$link = isset($_GET['link']) ? $_GET['link'] : "";
	//$link = $_GET['link'];

	$pag[1]  = "dashboard.php";
	$pag[2]  = "listar_usuario.php";
	$pag[3]  = "cad_usuario.php";
	$pag[4]  = "editar_usuario.php";		
	$pag[5]  = "visual_usuario.php";
	$pag[6]  = "listar_nivel_acesso.php";
	$pag[7]  = "cad_nivel_acesso.php";
	$pag[8]  = "visual_nivel_acesso.php";
	$pag[9]  = "editar_nivel_acesso.php";
	$pag[10] = "cad_chamado.php";
	$pag[11] = "listar_chamados.php";
	$pag[12] = "cad_clientes.php";
	$pag[13] = "listar_clientes.php";
	$pag[14] = "visual_clientes.php";
	$pag[15] = "visual_chamados.php";
	$pag[16] = "editar_chamados.php";
	$pag[17] = "editar_clientes.php";
	$pag[18] = "rel_chamados.php";
	$pag[19] = "gera_pdf_chamados.php";
	$pag[20] = "listar_base_conhecimento.php";
	$pag[21] = "cad_base_conhecimento.php";
	$pag[22] = "visual_base_conhecimento.php";
	$pag[23] = "editar_base_conhecimento.php";
	$pag[24] = "cad_servicos.php";
	$pag[25] = "listar_servicos.php";
	$pag[26] = "editar_servicos.php";
	$pag[27] = "importar_clientes.php";
	$pag[28] = "cad_os.php";
	$pag[29] = "listar_os.php";
	$pag[30] = "editar_os.php";
	$pag[31] = "cad_produtos.php";
	$pag[32] = "listar_produtos.php";
	$pag[33] = "editar_produtos.php";
	$pag[34] = "busca_banco.php";
	$pag[35] = "gera_pdf_os.php";
	
	if(!empty($link)){
		if(file_exists($pag[$link])){
			include $pag[$link];
		}else{
			include "dashboard.php";
		}
	}else{
		include "dashboard.php";
	}
	
	include 'inc/footer.php';	
?>