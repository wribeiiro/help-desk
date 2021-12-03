<?php
	$id = $_GET['id'];
	//Executa consulta

	$sql = "SELECT * FROM clientes WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con, $sql);
	$resultado = mysqli_fetch_assoc($result);
?>
 
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Visualizar Clientes</h1>
        </div>
    </div> 
    <div class="row">
		<div class="col-md-8" style="text-align: right;">
			<a href='administrativo.php?link=13'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button></a>
										
			<a href='processa/proc_apagar_clientes.php?id=<?php echo $resultado['id']; ?>'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
		</div>
	</div>
	
	<div class="row"> 
		<div class="col-md-12">
			<div class="col-sm-8 col-md-8">
				<b>ID:</b> <?php echo $resultado['id']; ?>
				<br>
				<b>Nome:</b> <?php echo $resultado['nome']; ?>
				<br>
				<b>Telefone:</b> <?php echo $resultado['telefone']; ?>
				<br>
				<b>CPF/CNPJ:</b> <?php echo $resultado['cnpj']; ?>
				<br>
				<b>Senhas:</b> 
				<?php 
					if($_SESSION['usuarioNivelAcesso'] == 1){
						echo $resultado['senhas'];
					}
				?>
				<br>
				<b>Observação:</b> <?php echo $resultado['observacao']; ?>
				<br> 
				<b>E-mail:</b> <?php echo $resultado['email']; ?>
				<br> 
			</div>
		</div>
	</div>
</div>