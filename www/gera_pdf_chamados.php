<?php 

	require_once ("conexao.php");

	$html = '';
	$dataatual = date('d/m/Y');
	$datainiciopdf = $_POST["datainiciopdf"];
	$datafinalpdf = $_POST["datafinalpdf"];

	//Executa consulta 

	$sql = "SELECT a.id, a.id_cliente, a.id_usuario, a.problema, a.data, a.solucao, a.status, a.tempo, b.nome, c.login
		FROM 
			chamados a
		JOIN 
			clientes b ON (b.id = a.id_cliente)
		JOIN 
			usuarios c ON (c.id = a.id_usuario)
		WHERE a.data >= '$datainiciopdf' AND a.data <= '$datafinalpdf'
		ORDER BY a.data asc";
	$result = mysqli_query($con, $sql);
	
	$contador = 0;

	while ($resultado = mysqli_fetch_assoc($result)) {
		if ($resultado['status']==1) {
			$resultado['status']='Em aberto';
		}else {
			$resultado['status']='Concluido';
		}

		$dataphp = strtotime($resultado['data']);
		$resultado['data'] = date('d/m/Y', $dataphp);

		$html .= "<b>ID: </b> " . $resultado['id'] . "<br>";
		$html .= "<b>Data Realização: </b> " . $resultado['data'] . "<br>";
		$html .= "<b>Cliente: </b> ". $resultado['nome'] . "<br>";
		$html .= "<b>Analista Responsável: </b> " . $resultado['login'] . "<br>";
		$html .= "<b>Problema: </b> " . $resultado['problema'] . "<br>";
		$html .= "<b>Solução: </b> " . $resultado['solucao'] . "<br>";
		$html .= "<b>Status: </b> " . $resultado['status'] . "<br>";
		$html .= "<b>Tempo: </b> " . $resultado['tempo'] . " Minutos<br><hr>";

		$contador++;
	}

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	use Dompdf\Options;

	// include autoloader
	require_once("bower_components/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	$options = new Options();
	$options->set('defaultFont', 'Courier');
	$dompdf = new Dompdf($options);

	// Carrega o HTML
	$dompdf->load_html('
		<h4 style="text-align: center;">Sistema de Help-Desk - Relatório Chamados</h4>' . 
		'<p style="text-align: right">Data de emissão: ' . $dataatual . '</p>' . 
		'<p style="text-align: right; font-size: 11px">Período de: ' . date('d/m/Y',strtotime($datainiciopdf)) . ' até ' . date('d/m/Y',strtotime($datafinalpdf)) . '</p>' . 
		'<br>' . 
		$html . 
		'<br><b>Total de chamados: </b>' . $contador . '
	');

	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream(
		"relatorio_chamados", 
		array(
			"Attachment" => true //Para realizar o download somente alterar para true
		)
	);
?>