<?php
	$id = $_GET['id'];
	//Executa consulta

	$sql = "SELECT * FROM base_conhecimento WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con, $sql);
	$resultado = mysqli_fetch_assoc($result);
?>
 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Base do Conhecimento</h1>
        </div>
    </div> 
    <div class="row">
		<div class="col-md-8" style="text-align: right;">
			<a href='administrativo.php?link=20'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button></a>
										
			<a href='processa/proc_apagar_base_conhecimento.php?id=<?php echo $resultado['id']; ?>'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="col-sm-8 col-md-8">
				<b>ID:</b> <?php echo $resultado['id']; ?>
				<br>
				<b>Plataforma:</b> 
					<?php 
						if ($resultado['id_plataforma']==1) {
							echo "Genus";
						} elseif ($resultado['id_plataforma']==2) {
							echo "Sisauto";
						} else {
							echo "Outros";
						}
					?>
				<br>
				<b>Pergunta:</b> <?php echo '<b>'.$resultado['pergunta']. '</b>'; ?>
				<br>
				<b>Resposta:</b> <?php echo $resultado['resposta']; ?>
				<br>
				<b>Anexo:</b>
				<br> 
				<?php 
					echo "<a href='uploads/".$resultado['anexo']."' target='_blank'</a>"; 
					echo "<img src='uploads/".$resultado['anexo']."'alt='Anexo' width='300px' height='auto'/>";
				?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

