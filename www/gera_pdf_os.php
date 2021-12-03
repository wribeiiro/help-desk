<?php 
	
	$id = $_GET['id'];
	require_once 'conexao.php';

	$html = '';

	$select = "
		SELECT a.id, a.id_cliente, a.id_usuario, a.status, a.data_inicial, a.data_final, a.garantia, a.descricao, a.defeito, a.laudo, a.observacoes, b.nome, c.login
		FROM 
			ordem_servicos a
		JOIN 
			clientes b ON (b.id = a.id_cliente)
		JOIN 
			usuarios c ON (c.id = a.id_usuario)
		WHERE a.id = '$id' LIMIT 1
	";

	$result = mysqli_query($con, $select);

	while ($dados = mysqli_fetch_assoc($result)) {
		
		if ($dados['status'] == 1) {
			$dados['status'] = 'Orçamento';
		} elseif ($dados['status'] == 2) {
			$dados['status'] = 'Em andamento';
		} elseif ($dados['status'] == 3) {
			$dados['status'] = 'Finalizado';
		} else {
			$dados['status'] = 'Encerrado';
		}

		$html .= "<b>Nº da OS: </b> " . $dados['id'] 
	       . "<b style='padding-left: 395px'>Data Recebimento: </b> " . $dados['data_inicial'] 
	       . "<br>" 
	       . "<b>Cliente: </b> "  . $dados['nome'] . "<b style='padding-left: 266px'>Data Entrega: </b>"
	       . "<br>" 
	       . "<b>Analista: </b> " . $dados['login']
	       . "<br>"
	       . "<b>Situação da Ordem: </b> " . $dados['status']
	       . "<hr>"
		;
		
		$html .= "<b>Descrição: </b><br> ". $dados['descricao'] . "<br><br><br><hr>";
		$html .= "<b>Defeito: </b><br>"  . $dados['defeito'] . "<br><br><hr>";
		$html .= "<b>Laudo: </b><br> "    . $dados['laudo'] . "<br><br><hr>";
		$html .= "<b>Observações: </b><br> "      . $dados['observacoes'] . "<br><br><hr>";
		$html .= "<b>Condições de Serviços</b><br>
		<p>
		<b>1 -</b> A empresa da garantia de 90 dias de mão de obra e peças usadas no conserto, contados a partir da data de entrega.<br>
		<b>2 -</b> Os aparelhos não retirados no prazo máximo de 30 dias contados a partir da comunnicação para sua retirada sofrerão acréscimo das despeas de armazenamento e seguro.<br>
		<b>3 -</b> Qualquer dúvida que venha a ter com relação ao serviço entre em contato!
		</p>
		<hr>";
		$html .= "<b style='padding-left: 460px'>( )Via do Cliente </b> <b>( )Via da Empresa</b>";
	}

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;
	use Dompdf\Options;

	// include autoloader
	require_once("bower_components/dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

	$options = new Options();
	$options->set('defaultFont', 'Arial');
	$dompdf = new Dompdf($options);

	// Carrega o HTML
	$dompdf->load_html('
	
		<div style="float:left; padding-top: 0px">
			<img src="imagens/logo_support.png" alt="logo-support" style="width: 180px; padding-top: 25px; padding-left: 0px">
		</div>
		<div style="padding-left: -75px; padding-top: 0px;">
			<h2 style="text-align: center;">ORDEM DE SERVIÇO</h2>
			<p style="padding-left: 280px; text-align:left; padding-top: -20px;">
				Avenida Saturnino Olinto, 1175 - Campo do Gado<br>Rio Negro - PR <br> Fone: (47)3642-2100 / (47)3642-8748
			</p>
		</div>
		<hr style="margin-top: 0px"> ' . 
		$html .'
	');

	//Renderizar o html
	$dompdf->render();

	//Exibir a página
	$dompdf->stream(
		"Ordem de Serviço", 
		array(
			"Attachment" => false // true -> download -- false -> view no browser
		)
	);
?>