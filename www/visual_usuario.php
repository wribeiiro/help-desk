<?php
	$id = $_GET['id'];
	//Executa consulta

	$sql = "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con, $sql);
	$resultado = mysqli_fetch_assoc($result);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
		<div class="col-md-8" style="text-align: right;">

			<a href='administrativo.php?link=2&id=<?php echo $linhas['id']; ?>'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button></a>
										
			<a href='administrativo.php?link=4&id=<?php echo $linhas['id']; ?>'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
										
			<a href='processa/proc_apagar_usuario.php?id=<?php echo $linhas['id']; ?>'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="col-sm-4 col-md-4">
				<b>Id:</b> <?php echo $resultado['id']; ?>
				<br>
				<b>Nome:</b> <?php echo $resultado['nome']; ?>
				<br>
				<b>E-mail:</b> <?php echo $resultado['email']; ?>
				<br>
				<b>Usuário:</b> <?php echo $resultado['login']; ?>
				<br>
				<b>Nivel de Acesso:</b> <?php echo $resultado['nivel_acesso_id']; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

