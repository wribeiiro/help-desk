<?php  
	$id = $_GET['id'];

	$sql 		= "SELECT * FROM servicos WHERE id = '$id' LIMIT 1";
	$result 	= mysqli_query($con, $sql);
	$resultado  = mysqli_fetch_assoc($result);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Serviços</h1>
        </div>
    </div>
  	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
                <div class="panel-body">
			  		<form class="form" method="POST" action="processa/proc_edit_servicos.php">  
			  			<div class="col-md-3 col-sm-3">
				  			<div class="form-group">
								<label class="control-label">Nome:</label><span style="color: red; font-weight: bold;"> *</span>
					  			<input type="text" class="form-control" name="nome" placeholder="Nome do serviço" value="<?php echo $resultado['nome']; ?>" required>
							</div>
				  		</div>
				  		<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label class="control-label">Preço:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control" name="preco" id="money" placeholder="Preço do serviço" required value="<?php echo $resultado['preco']; ?>">
							</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Descrição:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control" name="descricao" placeholder="Descrição Completa" required value="<?php echo $resultado['descricao']; ?>">
							</div>
					  	</div>
					  	<input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
					  	<div class="col-sm-8">
					  		<div class="form-group">
						  		<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
						  		<a href='administrativo.php?link=25'><button type='button' class='btn btn-info'><i class="fa fa-list"></i> Listar</button></a>		
							</div>
					  	</div>
					  	<p style="color: red; float: right;"> Os campos com * são obrigatórios.</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>