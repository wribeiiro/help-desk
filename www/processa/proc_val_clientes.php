<?php
    /***********************************
    * Title: Valida Clientes VB6 + PHP *
    * Date: 26/05/2017				   *
    * Name: Valida CLiente			   *
    * Author: Wellisson Ribeiro		   *
    * *********************************/
    
    // habilita erros php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(1);

    // parametros de conexao local
	$host = 'localhost';
	$user = 'root';
	$pass = '1';
	$db   = 'tcc1';

	/* parametros de conexao producap */ 
	/*
	$host = 'localhost';
	$user = 'brasilno_hp';
	$pass = 'New@500';
	$db   = 'brasilno_hp';
	*/
	
	// abre conexao com servidor
	$con = mysqli_connect($host, $user, $pass, $db) or die ("erro ao conectar com banco") . print mysqli_error();

    // verifica se foi passado algo na variavel por GET
	if (isset($_GET['cnpj'])){
	    
		//variavel cnpj será enviada por GET
		$cnpj = $_GET['cnpj'];
		
		// monta consulta
		$sql = "SELECT atualiza FROM clientes WHERE cnpj = '" .$cnpj. "' ";
		
        // executa a consulta
		$resultado = mysqli_query($con, $sql) or print mysqli_error($con);
        $result = mysqli_fetch_assoc($resultado);

        //verifica  se possui registros
		if (mysqli_num_rows($resultado) > 0){
			// verifica o valor do campo atualiza
			if ($result['atualiza'] == "S") {
				echo "S";
			} else {
				echo "N";
			}
		}else{
			echo "Nenhum registro encontrato";
		}
	} else {
		echo "Nenhum CNPJ/CPF foi passado pelo metodo GET"; // caso nao seja passado nenhum parametro
	}
?>