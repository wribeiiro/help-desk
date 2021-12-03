<?php 
	$sql = "SELECT id, nome, situacao FROM clientes ORDER BY nome";
	$query = mysqli_query($con, $sql);

	$sqluser = "SELECT id, login FROM usuarios ORDER BY login";
	$queryuser = mysqli_query($con, $sqluser);
?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ordem de Serviço</h1>
        </div>
    </div>
  	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
                <div class="panel-heading">
                	Preencha o formulário da OS
                </div>
                <div class="panel-body">
			  		<form class="form" method="POST" action="processa/proc_cad_os.php">
			  			<div class="col-md-6 col-sm-6">
				  			<div class="form-group">
								<label class="control-label">Cliente:</label><span style="color: red; font-weight: bold;"> *</span>
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
				  		<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label class="control-label">Técnico:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<select class="js-example-basic-single form-control" name="analista">
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
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Status:</label> <span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="status" style="width: 70%">
							  		<option value="1">Orçamento</option>
							  		<option value="2">Em andamento</option>
							  		<option value="3">Finalizado</option>
							  		<option value="4">Cancelado</option>
								</select>
							</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Data inicial: </label> <span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control datai" name="data_inicial" id="calendar" placeholder="Data realização" value="<?=date('Y/m/d')?>" required>
					  		</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Data final: </label> <span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control dataf" name="data_final" id="calendar" placeholder="Data realização" value="<?=date('Y/m/d')?>" required>
					  		</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Garantia: </label>
						  		<input type="text" class="form-control garantia" name="garantia" id="garantia" placeholder="Especifique">
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Descrição Produto/Serviço: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<textarea class="form-control" name="descricao" rows="7" placeholder="Breve descricao do serviço"></textarea>
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Defeito: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<textarea class="form-control" name="defeito" rows="7" placeholder="Defeito do equipamento"></textarea>
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Laudo: </label>
						  		<textarea class="form-control" name="laudo" rows="7" placeholder=""></textarea>
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Observações: </label>
						  		<textarea class="form-control" name="observacoes" rows="7" placeholder=""></textarea>
					  		</div>
					  	</div>
					  	<div class="col-sm-8">
					  		<div class="form-group">
						  		<button type="submit" class="btn btn-success">
						  			<i class="fa fa-save"></i> Gravar
						  		</button>
						  		<a href='administrativo.php?link=25'>
						  			<button type='button' class='btn btn-info'>
						  				<i class="fa fa-list"></i> Listar
						  			</button>
						  		</a>		
							</div>
					  	</div>
					  	<p style="color: red; float: right;"> Os campos com * são obrigatórios.</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>