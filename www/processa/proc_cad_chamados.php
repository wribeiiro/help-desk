<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');
	
	include_once("../seguranca.php");
	include_once("../conexao.php");

	$cliente 				= $_POST["cliente"];
	$problema 				= $_POST["problema"];
	$data 					= $_POST["data"];
	$data 					= date("Y-m-d",strtotime(str_replace('/','-',$data)));
	$conexao 	 			= $_POST["conexao"]; 
	$analista 	 			= $_POST["analista"];
	$solucao				= $_POST["solucao"];
	$status					= $_POST["status"];
	$tempo					= $_POST["tempo"]; 

	if (isset($_FILES['anexo'])) { 
		$extensao  = strtolower(substr($_FILES['anexo']['name'],-4)); // pega extensao do arquivo
		$novo_nome = md5(time()). $extensao; //nome do arquivo 
		$diretorio = "../uploads/"; //diretorio 

		move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome); // faz úpload

		$sql   = "INSERT INTO chamados (id_cliente, id_usuario, problema, data, conexao, solucao, status, tempo, anexo) VALUES ('$cliente', '$analista', '$problema', '$data', '$conexao', '$solucao', '$status', '$tempo', '$novo_nome')";
		$query = mysqli_query($con, $sql);

		if (mysqli_affected_rows($con) != 0 ){
			echo '<script>alert("Chamado cadastrado com Sucesso! :)");</script>';
			echo '<script>location.href="../administrativo.php?link=11";</script>';
		} else {
			echo '<script>alert("Desculpe, ocorreu um erro ao cadastrar! :(");</script>';
			echo '<script>location.href="../administrativo.php?link=11";</script>';
		}
	}
?>
