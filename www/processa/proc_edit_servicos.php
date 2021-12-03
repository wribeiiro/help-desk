<?php 
	session_start();
	
	include_once '../conexao.php';
	include_once '../seguranca.php';


	$id        =  $_POST['id']; 
	$nome 	   =  $_POST['nome']; 
	$preco 	   =  $_POST["preco"];
	$preconovo =  trim(str_replace(',', '',$preco)); 
	$descricao =  $_POST['descricao']; 

	$sql = "UPDATE servicos SET nome = '$nome', preco = '$preconovo', descricao = '$descricao' WHERE id = '$id'";
	$query = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) != 0) {
		echo '<script>alert("Serviço editado com sucesso! :) ") </script>';
		echo '<script>location.href="../administrativo.php?link=25";</script>';
	} else {
		echo '<script>alert("Desculpe ocorreu um erro ao editar o serviço :( ")<script>';
		echo '<script>location.href="../administrativo.php?link=25";</script>';
	}
?>