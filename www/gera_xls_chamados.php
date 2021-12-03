<?php
	header('Content-type: text/html; charset=UTF-8');
	header("Content-type: application/x-msexcel; charset=UTF-8");
	
	include_once 'conexao.php';
	
	$datainicio = $_POST["datainicio"];
	$datafinal = $_POST["datafinal"];
 
 	$sql = "SELECT a.id, a.id_cliente, a.id_usuario, a.problema, a.data, a.conexao, a.solucao, a.status, a.tempo, b.nome, b.cnpj, c.login
		FROM 
			chamados a
		JOIN 
			clientes b ON (b.id = a.id_cliente)
		JOIN 
			usuarios c ON (c.id = a.id_usuario) 
		WHERE a.data >= '$datainicio' AND a.data <= '$datafinal'";
	$query = mysqli_query($con, $sql);
	$dados = mysqli_num_rows($query);
	
	for ($i=0; $i <1; $i++) { 
		$html[$i] = "";
		$html[$i] .= "<meta http-equiv=\"content-type\" content=\"application/xhtml+xml; charset=UTF-8\" />";
		$html[$i] .= "<table>";
		$html[$i] .= "<tr>";
		$html[$i] .= "<td><b>ID</b></td>";
		$html[$i] .= "<td><b>Data Realizacao</b></td>";
		$html[$i] .= "<td><b>Cliente</b></td>";
		$html[$i] .= "<td><b>CNPJ</b></td>";
		$html[$i] .= "<td><b>Analista</b></td>";
		$html[$i] .= "<td><b>Problema</b></td>";
		$html[$i] .= "<td><b>Solucao</b></td>";
		$html[$i] .= "<td><b>Status</b></td>";
		$html[$i] .= "<td><b>Tempo</b></td>";
		$html[$i] .= "<td><b>Valor(Cobranca)</b></td>";
		//$html[$i] .= "<td><b>Valor(Cobrança)</b></td>";
		$html[$i] .= "</tr>";
		$html[$i] .= "</table>";
	}
	$i = 1;
	while ($ret = mysqli_fetch_array($query)) {

		if ($ret['status']==1) {
			$ret['status']='Em aberto';
		}else {
			$ret['status']='Concluido';
		}

		$dataphp = strtotime($ret['data']);
		$ret['data'] = date('d/m/Y', $dataphp);

		$retorno_id 		= $ret['id'];
		$retorno_data 		= $ret['data'];
		$retorno_cliente 	= $ret['nome'];
		$retorno_cnpj    	= $ret['cnpj'];
		$retorno_analista 	= $ret['login'];
		$retorno_problema 	= $ret['problema'];
		$retorno_solucao 	= $ret['solucao'];
		$retorno_status 	= $ret['status'];
		$retorno_tempo 		= $ret['tempo']; 

		$html[$i] = "";
		$html[$i] .= "<table>";
		$html[$i] .= "<tr>";
		$html[$i] .= "<td>$retorno_id</td>";
		$html[$i] .= "<td>$retorno_data</td>";
		$html[$i] .= "<td>$retorno_cliente</td>";
		$html[$i] .= "<td>$retorno_cnpj</td>";
		$html[$i] .= "<td>$retorno_analista</td>";
		$html[$i] .= "<td>$retorno_problema</td>";
		$html[$i] .= "<td>$retorno_solucao</td>";
		$html[$i] .= "<td>$retorno_status</td>";
		$html[$i] .= "<td>$retorno_tempo</td>";
		$html[$i] .= "</tr>";
		$html[$i] .= "</table>";
		$i++;
	}

	$xls = 'chamadosc.xls';
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
	header("Cache-Control: no-cache, must-revalidate");
	header("Pragma: no-cache");
	header('Content-type: text/html; charset=UTF-8');
	header("Content-type: application/x-msexcel; charset=UTF-8");
	header("Content-Disposition: attachment; filename={$xls}" );
	header("Content-Description: PHP Generated Data" );

	for ($i=0; $i<=$dados ; $i++) { 
		echo $html[$i];
	}
?>