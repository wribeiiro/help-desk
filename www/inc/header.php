<?php
	session_start();
	include_once("seguranca.php");
	include_once("conexao.php");
?>
<!--
	Name: Sistema Help-Desk
	Versão: 1.0
	Author: Wellisson Ribeiro
	Website: http://www.support-br.com.br
	Contato: welleh10@gmail.com
	Facebook: /wellissonribeiiro
	Github: /wellehr
	Licença: Copia e sem autorização proibida!
-->
<!DOCTYPE html>
	<html lang="pt-br">
		<head>
		    <meta charset="utf-8">
		    <meta http-equiv="X-UA-Compatible" content="IE=edge">
		    <meta name="viewport" content="width=device-width, initial-scale=1">
		    <meta name="description" content="Página Administrativa">
		    <meta name="author" content="Wellisson Ribeiro">
		    <link rel="icon" href="imagens/logo_support.png">

		    <title>Administrativo - Chamado</title>


		    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
		     <!-- DataTables CSS -->
		    <link href="bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

		    <!-- DataTables Responsive CSS -->
		    <link href="bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

		    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

			<!-- MetisMenu CSS -->
			<link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

			<!-- Timeline CSS -->
			<link href="dist/css/timeline.css" rel="stylesheet">

			<!-- Custom CSS -->
			<link href="dist/css/sb-admin-2.css" rel="stylesheet">

			<!-- Morris Charts CSS -->
			<link href="bower_components/morrisjs/morris.css" rel="stylesheet">

			<!-- Custom Fonts -->
			<link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

			<!-- SElect2 -->
			<link href="bower_components/select2/dist/css/select2.css" rel="stylesheet" type="text/css">

			<!-- sweet alert css -->
			<link rel="stylesheet" href="bower_components/sweetalert2/dist/sweetalert2.min.css">
			
		    <link href="css/theme.css" rel="stylesheet">

		    <!--<script src="js/ie-emulation-modes-warning.js"></script>-->

		    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
		</head>

  		<body role="document">
