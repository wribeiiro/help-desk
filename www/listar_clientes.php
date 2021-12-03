	<?php
		$sql 	   = "SELECT * FROM clientes ORDER BY 'id'";
		$resultado = mysqli_query($con, $sql);
		$linhas    = mysqli_num_rows($resultado);
	?>	
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lista de Clientes</h1>
            </div>
        </div>
        <div class="row">
			<div class="col-md-8" style="text-align: left;">
				<a href="administrativo.php?link=12"><button type='button' class='btn btn-success'><i class="fa fa-pencil"></i> Cadastrar</button></a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive dataTable_wrapper">
				  	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				  	<!--<table class="table table-striped table-bordered table-hover">-->
						<thead>
						 	<tr>
								<th>ID</th>
								<th>Nome</th>
								<th>Telefone</th>
								<th>Contato</th>
								<th>Situação</th>
								<th>Atualiza automático</th>
								<th>Ações</th>
						  	</tr>
						</thead>
						<tbody>
							<?php 
								while($linhas = mysqli_fetch_array($resultado)){
									if ($linhas['situacao']=='1') {
										$linhas['situacao']='Em dia';
									}else {
										$linhas['situacao']='Devendo';
									}

									if ($linhas['atualiza']=='S') {
										$linhas['atualiza']='Sim';
									}else {
										$linhas['atualiza']='Não';
									}		
									echo "<tr>";
										echo "<td>".$linhas['id']."</td>";
										echo "<td>".$linhas['nome']."</td>";
										echo "<td>".$linhas['telefone']."</td>";
										echo "<td>" .substr($linhas['contato'], 0,20)."</td>";
										echo "<td>".$linhas['situacao']."</td>";
										echo "<td>".$linhas['atualiza']."</td>";
										?>
										<td> 
										<a href='administrativo.php?link=14&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Visualizar'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-search"></i></button></a>
										
										<a href='administrativo.php?link=17&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Editar'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
										
										<a href='processa/proc_apagar_clientes.php?id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Excluir'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
										
										<?php
									echo "</tr>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div> <!-- /container -->


