<?php
	session_start();

	header('Content-type: text/html; charset=UTF-8');

	include_once("../seguranca.php");
	include_once("../conexao.php");

	$id             = $_POST["id"];
	$cliente 		= $_POST["cliente"];
	$analista		= $_POST["analista"];
	$problema 		= $_POST["problema"];
	$data 			= $_POST["data"];
	$data 			= date("Y-m-d",strtotime(str_replace('/','-',$data)));
	$conexao 	 	= $_POST["conexao"];
	$solucao		= $_POST["solucao"];
	$status			= $_POST["status"];
	$tempo			= $_POST["tempo"];

	if (isset($_FILES['anexo'])) {
		$extensao  = strtolower(substr($_FILES['anexo']['name'],-4)); // pega extensao do ar quivo
		$novo_nome = md5(time()). $extensao; //nome do arquivo 
		$diretorio = "../uploads/"; //diretorio 

		move_uploaded_file($_FILES['anexo']['tmp_name'], $diretorio.$novo_nome); // faz úpload

		$sql = "
			UPDATE chamados 
			SET id_cliente ='$cliente', id_usuario = '$analista', 
				problema = '$problema', data = '$data', data_modif = NOW(), conexao = '$conexao', 
				solucao = '$solucao', status = '$status', tempo = '$tempo', 
				anexo = '$novo_nome' 
			WHERE id='$id'
		";
		$query = mysqli_query($con, $sql);

		if (mysqli_affected_rows($con) != 0 ){
			echo '<script>alert("Chamado editado com Sucesso! :)");</script>';
			echo '<script>location.href="../administrativo.php?link=11";</script>';
		} else {
			echo '<script>alert("Desculpe, ocorreu um erro ao editar! :(");</script>';
			echo '<script>location.href="../administrativo.php?link=11";</script>';
		}
	} else {
		print "erro";
	}
?>