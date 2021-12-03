<?php
ob_start();

if ($_SESSION['registro']) {
	$segundos = time() - $_SESSION['registro']; // faz o do tempo recebido pelo limite 
}

if ($segundos > $_SESSION['limite']) { // verifica se é maior que o limite permitido, caso seja desloga
	unset(
		$_SESSION['registro'],
		$_SESSION['limite'],
		$_SESSION['usuarioId'],			
		$_SESSION['usuarioNome'], 		
		$_SESSION['usuarioNivelAcesso'], 
		$_SESSION['usuarioLogin'], 		
		$_SESSION['usuarioSenha']
	);
	//session_destroy();

	$_SESSION['loginErro'] = "Sua sessão expirou, faça login novamente!";

	header("Location: index.php"); // manda para tela de login
} else {
	$_SESSION['registro'] = time(); // pega novamente hora atual
}

/*
if(($_SESSION['usuarioId'] == "") || ($_SESSION['usuarioNome'] == "") || ($_SESSION['usuarioNivelAcesso'] == "") || ($_SESSION['usuarioLogin'] == "") || ($_SESSION['usuarioSenha'] == "")){
	unset(
		$_SESSION['usuarioId'],			
		$_SESSION['usuarioNome'], 		
		$_SESSION['usuarioNivelAcesso'], 
		$_SESSION['usuarioLogin'], 		
		$_SESSION['usuarioSenha']
	);
	//Mensagem de Erro
	$_SESSION['loginErro'] = "Sua sessão expirou, faça login novamente!";
	
	//Manda o usuário para a tela de login
	header("Location: index.php");
}
*/