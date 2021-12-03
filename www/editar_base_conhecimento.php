<?php
	$id = $_GET['id'];
	//Executa consulta

	$sql       = "SELECT * FROM base_conhecimento WHERE id = '$id' LIMIT 1";
	$result    = mysqli_query($con, $sql);
	$resultado = mysqli_fetch_assoc($result);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro Base do Conhecimento</h1>
        </div>
    </div>
  	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
            	<div class="panel-body">
			  		<form class="form" method="POST" action="processa/proc_edit_base_conhecimento.php" enctype="multipart/form-data">
					  	<div class="col-sm-6">
				  			<div class="form-group">
								<label>Pergunta: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control" name="pergunta" placeholder="Descrição breve" value="<?php echo $resultado['pergunta']; ?>" required>
							</div>
							<div class="form-group">
								<label>Resposta: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<textarea class="form-control" name="resposta" rows="7" placeholder="Procedimentos efetuados" required><?php echo $resultado['resposta']; ?></textarea>
							</div>
				  		</div> 
					  	<div class="col-sm-6">
							<div class="form-group">
								<label>Plataforma:</label> <span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="plataforma" style="width: 70%">
							  		<option value="1">Genus</option>
							  		<option value="2">Sisauto</option>
								</select>
							</div>
							<div class="form-group">
								<label>Anexo:</label>
						    	<div class="fileinput fileinput-new" data-provides="fileinput">
									<span class="btn btn-default btn-file">
										<input type="file" name="anexo" />
									</span>
								</div>
							</div> 
					  	</div>
					  	<input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">			  	
					  	<div class="col-sm-8">
					  		<div class="form-group">
						  		<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
						  		<a href='administrativo.php?link=20'><button type='button' class='btn btn-info'><i class="fa fa-list"></i> Listar</button></a>		
							</div>
					  	</div>
					  	<div class="col-sm-12">
					  		<p style="color: red; float: right;"> Os campos com * são obrigatórios.</p>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /container -->