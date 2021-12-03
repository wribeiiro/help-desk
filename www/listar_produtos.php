<?php

	$sql = "SELECT * FROM usuarios ORDER BY 'id'";
	$resultado = mysqli_query($con, $sql);
	$linhas = mysqli_num_rows($resultado);
?>	
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lista de Produtos</h1>
            </div>
        </div>
        <div class="row">
			<div class="col-md-6" style="text-align: left;">
				<a href="administrativo.php?link=31"><button type='button' class='btn btn-sm btn-success'><i class="fa fa-pencil"></i> Cadastrar</button></a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive dataTable_wrapper">
				  	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
						 	<tr>
								<th>ID</th>
								<th>Descrição</th>
								<th>Preço Venda</th>
								<th>Estoque</th>
								<th>Ações</th>
						  	</tr>
						</thead>
						<tbody>
							<?php 
								while($linhas = mysqli_fetch_array($resultado)){
									if ($linhas['nivel_acesso_id']==1) {
										$linhas['nivel_acesso_id']='Administrador';
									}else {
										$linhas['nivel_acesso_id']='Usuário';
									}
									echo "<tr>";
										echo "<td>".$linhas['id']."</td>";
										echo "<td>".$linhas['nome']."</td>";
										echo "<td>".$linhas['email']."</td>";
										echo "<td>".$linhas['nivel_acesso_id']."</td>";
										?>
										<td> 
											<a href='administrativo.php?link=5&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Visualizar'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-search"></i></button></a>
											
											<a href='administrativo.php?link=4&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Editar'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
											
											<a href='processa/proc_apagar_usuario.php?id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Excluir'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
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


