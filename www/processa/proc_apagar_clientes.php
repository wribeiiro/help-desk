<?php
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id = $_GET["id"];

	$query     = "DELETE FROM clientes WHERE id=$id";
	$resultado = mysqli_query($con, $query);
	//$linhas = mysql_affected_rows();

	if (mysqli_affected_rows($con) != 0 ){
		echo '<script>alert("Cliente deletado com Sucesso! :)");</script>';
		echo '<script>location.href="../administrativo.php?link=13";</script>';
	} else {
		echo '<script>alert("Desculpe, ocorreu um erro ao deletar! :(");</script>';
		echo '<script>location.href="../administrativo.php?link=13";</script>';
	}
?>