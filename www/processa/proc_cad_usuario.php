<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');

	include_once("../seguranca.php");
	include_once("../conexao.php");

	$nome 				= $_POST["nome"];
	$email 				= $_POST["email"];
	$usuario 			= $_POST["usuario"];
	$senha 				= md5($_POST["senha"]);
	$nivel_de_acesso 	= $_POST["nivel_de_acesso"];

	$sql = "INSERT INTO usuarios (nome, email, login, senha, nivel_acesso_id, created) VALUES ('$nome', '$email', '$usuario', '$senha', '$nivel_de_acesso', NOW())";
	$query = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) != 0 ){
		echo '<script>alert("Cliente cadastrado com Sucesso! :)");</script>';
		echo '<script>location.href="../administrativo.php?link=2";</script>';
	} else {
		echo '<script>alert("Desculpe, ocorreu um erro ao cadastrar! :(");</script>';
		echo '<script>location.href="../administrativo.php?link=2";</script>';
	}
?>
