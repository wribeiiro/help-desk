<?php
	$id = $_GET['id'];
	//Executa consulta

	$sql 		= "SELECT * FROM ordem_servicos WHERE id = '$id' LIMIT 1";
	$result 	= mysqli_query($con, $sql);
	$resultado  = mysqli_fetch_assoc($result);

	$sql2      = "SELECT * FROM clientes ORDER BY nome";
	$result2   = mysqli_query($con, $sql2);

	$sql3 	   = "SELECT id, login FROM usuarios ORDER BY login";
	$queryuser = mysqli_query($con, $sql3);
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
			  		<form class="form" method="POST" action="processa/edit_cad_os.php">
			  			<div class="col-md-6 col-sm-6">
				  			<div class="form-group">
								<label class="control-label">Cliente:</label><span style="color: red; font-weight: bold;"> *</span>
								<select class="js-example-basic-single form-control" id="cliente" name="cliente">
						  			<?php
							  			$sql = "SELECT a.id, a.id_cliente, a.id_usuario, a.status, a.data_inicial, a.data_final, a.garantia, a.descricao, a.defeito, a.laudo, a.observacoes, b.nome, c.login
											FROM 
												ordem_servicos a
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
								</select>
							</div>
				  		</div>
				  		<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label class="control-label">Técnico:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<select class="js-example-basic-single form-control" name="analista">
						  			<?php
							  		$sql = "SELECT a.id, a.id_cliente, a.id_usuario, a.status, a.data_inicial, a.data_final, a.garantia, a.descricao, a.defeito, a.laudo, a.observacoes, b.nome, c.login
											FROM 
												ordem_servicos a
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
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Status:</label> <span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="status" style="width: 70%">
							  		<option value="1"
										<?php
											if( $resultado['status'] == 1){
												echo 'selected';
											}
										?>
									>Orçamento</option>
									<option value="2"
										<?php
											if( $resultado['status'] == 2){
												echo 'selected';
											}
										?>
									>Em andamento</option>
									<option value="3"
										<?php
											if( $resultado['status'] == 3){
												echo 'selected';
											}
										?>
									>Finalizado</option>
									<option value="3"
										<?php
											if( $resultado['status'] == 4){
												echo 'selected';
											}
										?>
									>Cancelado</option>
								</select>
							</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Data inicial: </label> <span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control datai" name="data_inicial" id="calendar" placeholder="Data realização" value="<?php echo $resultado['data_inicial']; ?>" required>
					  		</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Data final: </label> <span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control dataf" name="data_final" id="calendar" placeholder="Data realização" value="<?php echo $resultado['data_final']; ?>" required>
					  		</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Garantia: </label>
						  		<input type="text" class="form-control garantia" name="garantia" id="garantia" placeholder="Especifique" value="<?php echo $resultado['garantia']; ?>">
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Descrição Produto/Serviço: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<textarea class="form-control" name="descricao" rows="7" placeholder="Breve descricao do serviço"><?php echo $resultado['descricao']; ?></textarea>
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Defeito: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<textarea class="form-control" name="defeito" rows="7" placeholder="Defeito do equipamento"><?php echo $resultado['defeito']; ?>
						  		</textarea>
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Laudo: </label>
						  		<textarea class="form-control" name="laudo" rows="7" placeholder=""><?php $resultado['laudo'] ?></textarea>
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Observações: </label>
						  		<textarea class="form-control" name="observacoes" rows="7" placeholder=""><?php echo $resultado['observacoes']; ?></textarea>
					  		</div>
					  	</div>
					  	<div class="col-sm-8">
					  		<div class="form-group">
						  		<button type="submit" class="btn btn-success">
						  			<i class="fa fa-save"></i> Editar
						  		</button>
						  		<a href='administrativo.php?link=29'>
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