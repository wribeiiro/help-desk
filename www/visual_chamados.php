<?php
	$id = $_GET['id'];
	//Executa consulta
	//$result = mysql_query("SELECT * FROM chamados WHERE id = '$id' LIMIT 1");
	//$resultado = mysql_fetch_assoc($result);
	$sql = "
		SELECT a.id, a.id_cliente, a.id_usuario, a.problema, a.data, a.conexao, a.solucao, a.status, a.tempo, a.anexo, b.nome, c.login
		FROM 
			chamados a
		JOIN 
			clientes b ON (b.id = a.id_cliente)
		JOIN 
			usuarios c ON (c.id = a.id_usuario) 
		WHERE a.id = '$id'"
	;
	$result = mysqli_query($con, $sql);
	$resultado = mysqli_fetch_assoc($result);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Visualizar Chamados</h1>
        </div>
    </div>
    <div class="row">
		<div class="col-md-8" style="text-align: right;">
			<a href='administrativo.php?link=11'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button></a>
										
			<a href='administrativo.php?link=16&id=<?php echo $resultado['id']; ?>'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
			
			<a href='processa/proc_apagar_chamados.php?id=<?php echo $resultado['id']; ?>'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="col-sm-8 col-md-8">
				<b>ID:</b> <?php echo $resultado['id']; ?>
				<br>
				<b>Nome Cliente:</b> <?php echo $resultado['nome']; ?>
				<br>
				<b>Analista:</b> <?php echo $resultado['login']; ?>
				<br>
				<b>Problema:</b> <?php echo $resultado['problema']; ?>
				<br>
				<b>Data:</b> <?php echo $resultado['data']; ?>
				<br>
				<b>Conexão:</b> <?php echo $resultado['conexao']; ?>
				<br>
				<b>Solução:</b> <?php echo $resultado['solucao']; ?>
				<br>
				<b>Status:</b> 
				<?php 
					if ($resultado['status']==1) {
						echo 'Em aberto'; 
					} else {
						echo 'Concluído';
					}
				?>
				<br>
				<b>Tempo:</b> <?php echo $resultado['tempo']; ?>
				<br>
				<b>Anexo:</b>
				<br>
				<?php 
					if (isset($resultado['anexo']) != null){
						echo "<a href='uploads/".$resultado['anexo']."' target='_blank'</a>"; 
						echo "<img src='uploads/".$resultado['anexo']."'alt='Anexo' width='300px' height='auto'/>";
					} else {
						echo "Não possui anexo";
					}
				?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

