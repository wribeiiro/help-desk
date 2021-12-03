<?php
	session_start();
	
	header('Content-type: text/html; charset=UTF-8');

	include_once("../seguranca.php");
	include_once("../conexao.php");

	$plataforma 	= $_POST["plataforma"];
	$pergunta 		= $_POST["pergunta"];
	$resposta 		= $_POST["resposta"];
	//$anexo 		    = $_POST["anexo"];

	if (isset($_FILES['anexo'])) {
		
		$extensao  = strtolower(substr($_FILES['anexo']['name'],-4)); // pega extensao do arquivo
		$novo_nome = md5(time()). $extensao; //nome do arquivo 
		$diretorio = "../uploads/"; //diretorio 

		move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome); // faz úpload

		$sql   = "INSERT INTO base_conhecimento (id_plataforma, pergunta, resposta, anexo) VALUES ('$plataforma', '$pergunta', '$resposta', '$novo_nome')";

		$result = mysqli_query($con, $sql);

		if (mysqli_affected_rows($con) != 0 ){
			echo '<script>alert("Registro inserido com Sucesso! :)");</script>';
			echo '<script>location.href="../administrativo.php?link=20";</script>';
		} else {
			echo '<script>alert("Desculpe, ocorreu um erro ao cadastrar! :(");</script>';
			echo '<script>location.href="../administrativo.php?link=20";</script>';
		}
	}
?>   