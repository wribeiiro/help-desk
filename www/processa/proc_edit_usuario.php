<?php
	session_start();
	
	header('Content-type: text/html; charset=UTF-8');
	
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id 				= $_POST["id"];
	$nome 				= $_POST["nome"];
	$email 				= $_POST["email"];
	$usuario 			= $_POST["usuario"];
	$senha 				= md5($_POST["senha"]);
	$nivel_de_acesso 	= $_POST["nivel_de_acesso"];

	$sql = "UPDATE usuarios SET nome ='$nome', email = '$email', login = '$usuario', 	senha = '$senha', nivel_acesso_id = '$nivel_de_acesso', modified = NOW() WHERE id='$id'";
	$query = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) != 0 ){
		echo '<script>alert("Usuario editado com Sucesso! :)");</script>';
		echo '<script>location.href="../administrativo.php?link=2";</script>';
	} else {
		echo '<script>alert("Desculpe, ocorreu um erro ao editar! :(");</script>';
		echo '<script>location.href="../administrativo.php?link=2";</script>';
	}
?>