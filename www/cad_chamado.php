<?php 
	$sql = "SELECT id, nome, situacao FROM clientes ORDER BY nome";
	$query = mysqli_query($con, $sql);

	$sqluser = "SELECT id, login FROM usuarios ORDER BY login";
	$queryuser = mysqli_query($con, $sqluser);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Chamados</h1>
        </div>
    </div>
  	<div class="row"> 
		<div class="col-md-12">
			<div class="panel panel-primary">
                <div class="panel-heading">
                	Preencha o formulário do chamado
                </div>
            	<div class="panel-body">
			  		<form class="form" method="POST" action="processa/proc_cad_chamados.php" enctype="multipart/form-data">
			  			<div class="col-sm-4">
				  			<div class="form-group">
								<label>Cliente: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<select class="js-example-basic-single form-control" id="cliente" name="cliente">
						  			<?php					  		
							  			while($dados = mysqli_fetch_array($query)) { ?>
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
								</select>
							</div>
				  		</div>
				  		<div class="col-sm-4">
					  		<div class="form-group">
								<label>Problema: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control" name="problema" placeholder="Descrição breve" required>
							</div>
					  	</div>
					  	<div class="col-sm-4">
					  		<div class="form-group">
								<label>Data: </label> <span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control dataf" name="data" id="calendar" placeholder="Data realização" value="<?=date('Y/m/d')?>" required>
							</div>
					  	</div>
					  	<div class="col-sm-4">
							<div class="form-group">
								<label>Analista:</label> <span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="analista" style="width: 70%">
							  			<?php					  		
								  			while($dados = mysqli_fetch_array($queryuser)) { ?>
											<option value="<?php echo $dados['id'] ?>">
												<?php 
													echo $dados['login']; 
												?>
											</option>
										<?php } ?>
								</select>
							</div>
					  	</div>
					  	<div class="col-sm-4">
							<div class="form-group">
								<label>Status:</label> <span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="status" style="width: 70%">
							  		<option value="1">Em Aberto</option>
							  		<option value="2">Concluído</option>
							  		<option value="3">Análise</option>
								</select>
							</div>
					  	</div>
					  	<div class="col-sm-4">
							<div class="form-group">
								<label>Tempo:</label>
						  		<input type="text" class="form-control time" name="tempo" min="0" placeholder="Tempo decorrido" style="width: 50%">
							</div>
					  	</div>
					  	<div class="col-sm-6">
					  		<div class="form-group">
								<label>Conexão: </label>
						  		<textarea class="form-control" name="conexao" rows="7" placeholder="Informaçações como TeamViewer, Backups, etc.."></textarea>
							</div>
					  	</div>
					  	<div class="col-sm-6">
					  		<div class="form-group">
								<label>Solução: </label>
						  		<textarea class="form-control" name="solucao" rows="7" placeholder="Procedimentos efetuados"></textarea>
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
					  	<div class="col-sm-8">
					  		<div class="form-group">
						  		<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Cadastrar</button>
						  		<a href='administrativo.php?link=11'><button type='button' class='btn btn-info'><i class="fa fa-list"></i> Listar</button></a>
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
</div>