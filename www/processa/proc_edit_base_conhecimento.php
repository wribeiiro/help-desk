<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');

	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id             = $_POST["id"];
	$plataforma 	= $_POST["plataforma"];
	$pergunta 		= $_POST["pergunta"];
	$resposta 		= $_POST["resposta"];  

	if (isset($_FILES['anexo'])) {
		$extensao  = strtolower(substr($_FILES['anexo']['name'],-4)); // pega extensao do ar quivo
		$novo_nome = md5(time()). $extensao; //nome do arquivo 
		$diretorio = "../uploads/"; //diretorio 

		move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome); // faz úpload

		$sql = "UPDATE base_conhecimento SET id_plataforma = '$plataforma', pergunta = '$pergunta', resposta = '$resposta', anexo = '$novo_nome' WHERE id='$id'";
		$query = mysqli_query($con, $sql);

		if (mysqli_affected_rows($con) != 0 ){
			echo '<script>alert("Registro editado com Sucesso! :) ");</script>';
			echo '<script>location.href="../administrativo.php?link=20";</script>';
		} else {
			echo '<script>alert("Desculpe, ocorreu um erro ao editar! :( ");</script>';
			echo '<script>location.href="../administrativo.php?link=23";</script>';
		}
	}
?>