<?php
	$id = $_GET['id'];
	//Executa consulta

	$sql = "SELECT * FROM nivel_acessos WHERE id = '$id' LIMIT 1";
	$result = mysqli_query($con, $sql);
	$resultado = mysql_fetch_assoc($result);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <div class="row">
		<div class="pull-right">
			<a href='administrativo.php?link=6&id=<?php echo $linhas['id']; ?>'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-list"></i></button></a>
										
			<a href='administrativo.php?link=9&id=<?php echo $linhas['id']; ?>'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
			
			<a href='processa/proc_apagar_nivel_acesso.php?id=<?php echo $linhas['id']; ?>'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class=" col-sm-3 col-md-1">
				<b>Id:</b> <?php echo $resultado['id']; ?>
				<br>
				<b>Nome:</b><?php echo $resultado['nome_nivel']; ?>
			</div>
		</div>
	</div>
</div> <!-- /container -->

