<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');
	
	include_once("../seguranca.php");
	include_once("../conexao.php");
	
	$nome_nivel = $_POST["nome_nivel"];

	$sql   = "INSERT INTO nivel_acessos (nome_nivel, created) VALUES ('$nome_nivel', NOW())";
	$query = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) != 0 ){
		echo '<script>alert("Nível cadastrado com Sucesso! :)");</script>';
		echo '<script>location.href="../administrativo.php?link=6";</script>';
	} else {
		echo '<script>alert("Desculpe, ocorreu um erro ao cadastrar! :(");</script>';
		echo '<script>location.href="../administrativo.php?link=6";</script>';
	}
?>