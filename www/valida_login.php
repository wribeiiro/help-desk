<?php
	session_start();
	date_default_timezone_set("America/Sao_Paulo");

	//escapar strings
	$usuariot = addslashes($_POST['usuario']);
	$senhat   = addslashes(md5($_POST["senha"]));

	include_once("conexao.php");

	// monta a query
	$sql = ("SELECT * FROM usuarios WHERE login = '$usuariot' AND senha = '$senhat' LIMIT 1");
	// executa a query
	$res = mysqli_query($con, $sql);

	// recebe o resultado da consulta
	$resultado = mysqli_fetch_assoc($res);

	// verifica se há resultados
	if(empty($resultado)){
		$_SESSION['loginErro'] = "Usuário e senha inválidos!";
		header("Location: index.php");
	}else{
		//variaveis globais
		$limiteSessao = 180000; // tempo da sessao em segundos

		$_SESSION['registro'] = time(); // pega tempo atual
		$_SESSION['limite'] = $limiteSessao; // recebe limite da sessao

		$_SESSION['usuarioId'] 			= $resultado['id'];
		$_SESSION['usuarioNome'] 		= $resultado['nome'];
		$_SESSION['usuarioNivelAcesso'] = $resultado['nivel_acesso_id'];
		$_SESSION['usuarioLogin'] 		= $resultado['login'];
		$_SESSION['usuarioSenha'] 		= $resultado['senha'];
		
		// se user for administrador, manda para administrativo
		if($_SESSION['usuarioNivelAcesso'] == 1){

			// variaveis para receber a sessao e gravar no banco
			$iduser    = $resultado['id'];
			$nomeuser  = $resultado['nome'];
			$data_hora = date("Y-m-d H:i:s");
			
			// query para inserir no banco
			$sqlLog = "INSERT INTO logusuarios (id_usuario, login, data_hora) VALUES ('$iduser', '$nomeuser', '$data_hora')";

			// executa a query
			$query = mysqli_query($con, $sqlLog) or print mysqli_error($con) . print mysqli_errno($con);

			// se nao afetar registro retorna erro
			if (!mysqli_affected_rows($con) != 0 ){
				echo "Erro ao inserir registros na tabela de log";
			} else {
				header("Location: administrativo.php");
			}
		}else{
			$_SESSION['loginPermissao'] = "Voce nao possui permissao de acesso! Por favor entre com permissão de Administrador!";
			header("Location: administrativo.php");
		}
	}
?>