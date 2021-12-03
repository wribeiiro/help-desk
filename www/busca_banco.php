<?php
	// Recuperamos a ação enviada pelo formulário
	$a = $_GET['a'];

	if ($a == "buscar") {
		// Pegamos a palavra
		$palavra = trim($_POST['palavra']);
	 
	 	$sql = "
	 		SELECT b.pergunta, c.problema 
	 		FROM base_conhecimento b, chamados c 
	 		WHERE b.pergunta, c.problema  
	 		LIKE '%".$palavra."%'";
	 		
		$result = mysqli_query($con, $sql);
		$numRegistros = mysqli_num_rows($result);
	}
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Base do Conhecimento</h1>
        </div>
    </div> 
	<div class="row">
		<div class="col-md-12">
			<div class="col-sm-8 col-md-8">
				<?php 
					if ($numRegistros != 0) {
						while($linhas = mysqli_fetch_array($result)){
							echo '<ul>';
							echo '
								<li>
									<a href="">'. $linhas['problema']. '</a>
								</li>'
							;
							echo '</ul>';
						}
					} else {
						echo "Nenhum produto foi encontrado com a palavra " . "<b>" . $palavra ."</b>";
					}
				?>
				<br>
			</div>
		</div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>