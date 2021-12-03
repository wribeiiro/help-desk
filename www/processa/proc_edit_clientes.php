<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');

	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id 			= $_POST["id"];
	$tipo_pessoa 	= $_POST["tipo_pessoa"];
	$nome 			= $_POST["nome"];
	$telefone 		= $_POST["telefone"];
	$cnpj 			= $_POST["cnpj"];
	$situacao 		= $_POST["situacao"];
	$atualiza 		= $_POST["atualiza"];
	$observacao 	= $_POST["observacao"];
	$contato 		= $_POST["contato"];
	$email 			= $_POST["email"]; 
	$senhas 		= $_POST["senhas"]; 

	$sql = "UPDATE clientes SET tipo_pessoa = '$tipo_pessoa', nome = '$nome', telefone = '$telefone', cnpj = '$cnpj', situacao = '$situacao', atualiza = '$atualiza' , observacao = '$observacao', contato = '$contato', email = '$email', senhas ='$senhas' WHERE id = '$id'";
	$query = mysqli_query($con, $sql);

	if (mysqli_affected_rows($con) != 0 ){
		echo '<script>alert("Cliente editado com Sucesso! :) ");</script>';
		echo '<script>location.href="../administrativo.php?link=13";</script>';
	} else {
		echo '<script>alert("Desculpe, ocorreu um erro ao editar! :( ");</script>';
		echo '<script>location.href="../administrativo.php?link=17";</script>';
	}
?>
