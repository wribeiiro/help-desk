<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');
	
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id 				= $_POST["id"];
	$nome_nivel 		= $_POST["nome_nivel"];

	$sql = "UPDATE nivel_acessos set nome_nivel ='$nome_nivel', modified = NOW() WHERE id='$id'";
	$query = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) != 0 ){
		echo '<script>alert("Nivel editado com Sucesso! :)");</script>';
		echo '<script>location.href="../administrativo.php?link=6";</script>';
	} else {
		echo '<script>alert("Desculpe, ocorreu um erro ao editar! :(");</script>';
		echo '<script>location.href="../administrativo.php?link=6";</script>';
	}
?>
