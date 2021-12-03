<?php  
	session_start();

	header('Content-type: text/html; charset=UTF-8');

	ini_set('display_errors',1);
	ini_set('display_startup_erros',1);
	ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
	error_reporting(E_ALL);

	include_once '../seguranca.php';
	include_once '../conexao.php';

	$html = '';
	$cliente 	  = $_POST['cliente'];
	$analista 	  = $_POST['analista'];
	$status 	  = $_POST['status'];
	$data_inicial = $_POST['data_inicial'];
	$data_final   = $_POST['data_final'];
	$garantia     = $_POST['garantia'];
	$descricao    = $_POST['descricao'];
	$defeito      = $_POST['defeito'];
	$laudo 	      = $_POST['laudo'];
	$observacoes  = $_POST['observacoes'];

	
	$sql = "INSERT INTO ordem_servicos (id_cliente, id_usuario, status, data_inicial, data_final, garantia, descricao, defeito, laudo, observacoes) VALUES ('$cliente', '$analista', '$status', '$data_inicial', '$data_final', '$garantia', '$descricao', '$defeito', '$laudo', '$observacoes')";

	$query = mysqli_query($con, $sql) or print mysqli_error($con) . print mysqli_errno($con);

	if (mysqli_affected_rows($con) > 0) {
		echo '<script>alert("OS cadastrada com sucesso! :) ") </script>';
		echo '<script>location.href="../administrativo.php?link=28";</script>';
	} else {
		echo '<script>alert("Ocorreu um erro ao cadastrar! :(") </script>';
		echo '<script>location.href="../administrativo.php?link=28";</script>';
	}
?>