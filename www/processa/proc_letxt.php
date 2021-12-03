<?php 
	 
	session_start();
	include_once("../seguranca.php");
	include_once("../conexao.php");

	error_reporting(E_ALL);
	ini_set('display_errors', 'On');

	header('Content-type: text/html; charset=UTF-8');
	
	//local do arquivo
	//$arquivo = fopen('../Clientes.txt', 'r');
	$arq = $_FILES['arquivo'];

	// verifica se variavel recebeu algum valor
	if (isset($_FILES['arquivo'])) {
		// abre arquivo
		$arquivo = fopen($arq['tmp_name'], 'r');
		//verifica se foi selecionado algum arquivo
		if (empty($arquivo) or $arquivo == null) {
			echo '<script>alert("Selecione um arquivo para importar!")</script>';
			echo '<script>location.href="../administrativo.php?link=27"</script>';
		} else {
			// le as linhas do arquivo
			while (($linha = fgets($arquivo)) == true) {
				// divide os dados com separador "|"
				$parte = explode("|", $linha);

				// execulta query bd
				$sql = 
					"
						INSERT INTO clientes (tipo_pessoa, nome, telefone, cnpj, situacao, observacao, contato, email, senhas) 
						VALUES ('" . utf8_encode($parte[0]) . "', '" . utf8_encode($parte[1]) . "', '" . utf8_encode($parte[2]) . "' , '" . utf8_encode($parte[3]) . "' , '" . utf8_encode($parte[4]) . "' , '" . utf8_encode($parte[5]) . "' , '" . utf8_encode($parte[6]) . "' , '" . utf8_encode($parte[7]) . "' , '" . utf8_encode($parte[8]) . "')
					"
				;
				$result = mysqli_query($con, $sql) or print mysqli_error($con);	
			}
			// se achar algum registro
			if (mysqli_affected_rows($con) > 0) {
				echo '<script>alert("Dados importados!")</script>';
				echo '<script>location.href="../administrativo.php?link=27"</script>';
			} else {
				echo "<script>alert('Ocorreu um erro ao ler o arquivo txt!')</script>";
				echo '<script>location.href="../administrativo.php?link=27"</script>';
			}
		}
	} else {
		echo '<script>alert("Erro ao importar!")</script>';
		echo '<script>location.href="../administrativo.php?link=27"</script>';
	}
	fclose($arquivo);
?>