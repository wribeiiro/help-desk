<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');
	
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$tipo_pessoa 		= $_POST["tipo_pessoa"];
	$nome 				= $_POST["nome"];
	$telefone 			= $_POST["telefone"];
	$cnpj 				= $_POST["cnpj"];
	$situacao 			= $_POST["situacao"];
	$atualiza			= $_POST["atualiza"];
	$observacao 		= $_POST["observacao"];
	$contato 			= $_POST["contato"];
	$email 				= $_POST["email"];
	$senhas  			= $_POST["senhas"];

	$sqlcnpj   = "SELECT cnpj FROM clientes WHERE cnpj = '$cnpj'";
	$cnpjquery = mysqli_query($con, $sqlcnpj);

	if (mysqli_num_rows($cnpjquery) > 0) {
		echo'<script>alert("Já existe um cliente com o mesmo CPF/CNPJ! :(");</script>';
		echo '<script>location.href="../administrativo.php?link=12";</script>';
	} else {
		$sql = "INSERT INTO clientes (tipo_pessoa, nome, telefone, cnpj, situacao, atualiza, observacao, contato, email, senhas) VALUES ('$tipo_pessoa', '$nome', '$telefone', '$cnpj', '$situacao', '$atualiza', '$observacao', '$contato', '$email', '$senhas')";
		$query = mysqli_query($con, $sql);

		if (mysqli_affected_rows($con) != 0 ){
			//echo 'OK';
			echo '<script>alert("Cliente cadastrado com Sucesso! :)");</script>';
			echo '<script>location.href="../administrativo.php?link=13";</script>';
		} else {
			echo '<script>alert("Desculpe, ocorreu um erro ao cadastrar! :(");</script>';
			echo '<script>location.href="../administrativo.php?link=13";</script>';
		}
	}
?>
