<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');

	include_once("../seguranca.php");
	include_once("../conexao.php");

	$nome 		 = $_POST["nome"];
	$preco 		 = $_POST["preco"];
	$preconovo   = trim(str_replace(',', '',$preco));	
	$descricao 	 = $_POST["descricao"];

	$sql   = "INSERT INTO servicos (nome, preco, descricao) VALUES ('$nome', '$preconovo', '$descricao')";
	$query = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) != 0 ){
		echo '<script>alert("Serviço cadastrado com Sucesso! :)");</script>';
		echo '<script>location.href="../administrativo.php?link=25";</script>';
	} else {
		echo '<script>alert("Desculpe, ocorreu um erro ao cadastrar! :(");</script>';
		echo '<script>location.href="../administrativo.php?link=25";</script>';
	}
?>
