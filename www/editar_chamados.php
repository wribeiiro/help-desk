<?php
	$id = $_GET['id'];
	//Executa consulta

	$sql 	   = "SELECT * FROM chamados WHERE id = '$id' LIMIT 1";
	$result    = mysqli_query($con, $sql);
	$resultado = mysqli_fetch_assoc($result);

	$sql2      = "SELECT * FROM clientes ORDER BY nome";
	$result2   = mysqli_query($con, $sql2);

	$sql3 	   = "SELECT id, login FROM usuarios ORDER BY login";
	$queryuser = mysqli_query($con, $sql3);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Chamado</h1>
        </div>
    </div>
  	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
                <div class="panel-heading">
                	Preencha o formulário do chamado
                </div>
            	<div class="panel-body">
		  			<form class="form" method="POST" action="processa/proc_edit_chamados.php" enctype="multipart/form-data">
			  			<div class="col-sm-4">
				  			<div class="form-group"> 	
								<label>Cliente: </label><span style="color: red; font-weight: bold;"> *</span>
					  			<select class="js-example-basic-single form-control" name="cliente">
							  		<?php					  		
								  	  	while($dados = mysqli_fetch_array($result2)) { ?>
										<option value="<?php echo $dados['id'] ?>">
											<?php 
												if ($dados['situacao']==1) {
													$dados['situacao']='Em dia';
												} else {
													$dados['situacao']='Devendo';
												}
												echo $dados['nome'] . ' -> '. $dados['situacao']; 
											?>
										</option>
										<?php } ?>
										<?php 
											$sql = "SELECT a.id, a.id_cliente, a.id_usuario, a.problema, a.data, a.solucao, a.status,a.tempo, b.nome, c.login
												FROM 
													chamados a
												JOIN 
													clientes b ON (b.id = a.id_cliente)
												JOIN 
													usuarios c ON (c.id = a.id_usuario)
												WHERE a.id = '$id' LIMIT 1
												";
								  			$result = mysqli_query($con, $sql);
								  			while($dados = mysqli_fetch_array($result)) { ?>
											<option value="<?php echo $dados['id_cliente']?>" <?php echo "selected";?> ><?php echo $dados['nome'] ?>
											</option>
										<?php } ?>
									?>
								</select>
							</div>
			  			</div>
			  
					  	<div class="col-sm-4">
				  			<div class="form-group">
								<label>Problema: </label><span style="color: red; font-weight: bold;"> *</span>
					  			<input type="text" class="form-control" name="problema" placeholder="Problema" value="<?php echo $resultado['problema']; ?>">
							</div>
					  	</div>

					  	<div class="col-sm-4">
				  			<div class="form-group">
								<label>Data: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control dataf" name="data" id="calendario" placeholder="Data Realização" value="<?php echo $resultado['data']; ?>">
							</div>
					  	</div> 
						<div class="col-sm-4">
							<div class="form-group">
								<label>Analista:</label> <span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="analista">
							  		<?php
							  		$sql = "SELECT a.id, a.id_cliente, a.id_usuario, a.problema, a.data, a.solucao, a.status,a.tempo, b.nome, c.login
											FROM 
												chamados a
											JOIN 
												clientes b ON (b.id = a.id_cliente)
											JOIN 
												usuarios c ON (c.id = a.id_usuario)
											WHERE a.id = '$id' LIMIT 1
											";
							  			$result = mysqli_query($con, $sql);
							  			while($dados = mysqli_fetch_array($result)) { ?>
										<option value="<?php echo $dados['id_usuario']?>" <?php echo "selected";?> ><?php echo $dados['login'] ?>
										</option>
									<?php } ?>
									<?php				  		
							  			while($dados = mysqli_fetch_array($queryuser)) { ?>
										<option value="<?php echo $dados['id'] ?>">
											<?php 
												echo $dados['login']; 
											?>
										</option>
										<?php } ?>
									?>
								</select>
							</div> 
					  	</div>
						<div class="col-sm-4">
							<div class="form-group">
								<label>Status:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="status">
						  			<option value="1"
										<?php
											if( $resultado['status'] == 1){
												echo 'selected';
											}
										?>
										>Em Aberto</option>
										<option value="2"
										<?php
											if( $resultado['status'] == 2){
												echo 'selected';
											}
										?>
										>Concluído</option>
										<option value="3"
										<?php
											if( $resultado['status'] == 3){
												echo 'selected';
											}
										?>
										>Análise</option>
								</select>
							</div>
					  	</div>
					  	<div class="col-sm-4">
							<div class="form-group">
								<label>Tempo:</label> <span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control time" name="tempo" min="0" placeholder="Tempo decorrido" style="width: 50%" value="<?php echo $resultado['tempo']; ?>">
							</div>
					  	</div>
					  	<div class="col-sm-6">
					  		<div class="form-group">
								<label>Conexão: </label>
						  		<textarea class="form-control" name="conexao" rows="7" placeholder="Informaçações como TeamViewer, Backups, etc.."><?php echo $resultado['conexao']; ?></textarea>
							</div>
					  	</div>
					  	<div class="col-sm-6">
						  	<div class="form-group">
								<label>Solução: </label>
							  	<textarea class="form-control" name="solucao" rows="7" placeholder="Procedimentos e fetuados"><?php echo $resultado['solucao']; ?></textarea>
							</div>
						</div>
						<div class="col-sm-6">
					  		<div class="form-group">
								<label>Anexo:</label>
						    	<div class="fileinput fileinput-new" data-provides="fileinput">
									<span class="btn btn-default btn-file">
										<input type="file" name="anexo" multiple/>
									</span>
								</div>
							</div> 
						</div>
						<input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
					  	<div class="col-sm-8">
						  	<div class="form-group">
						  		<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
						  		<a href='administrativo.php?link=11' class="btn btn-primary"><i class="fa fa-list"></i> Listar </a>
							</div>
						</div>
						<div class="col-sm-12">
					  		<p style="color: red; float: right;"> - Os campos com * são obrigatórios.</p><br>
					  	</div>
					  	<div class="col-sm-12">
					  		<p style="color: blue; float: right;"> - Clientes com pendências, verificar pagamentos antes.</p>
					  	</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /container -->