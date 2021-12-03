<?php

	$sql = "
		SELECT a.id, a.id_cliente, a.id_usuario, a.status, a.data_inicial, a.data_final, a.garantia, a.descricao, a.defeito, a.laudo, a.observacoes, b.nome
		FROM 
			ordem_servicos a
		JOIN 
			clientes b ON (b.id = a.id_cliente)
	";
	$resultado = mysqli_query($con, $sql);
	$linhas    = mysqli_num_rows($resultado);
?>	
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ordens de Serviço</h1>
            </div>
        </div>
        <div class="row">
			<div class="col-md-6" style="text-align: left;">
				<a href="administrativo.php?link=28"><button type='button' class='btn btn-success'><i class="fa fa-pencil"></i> Cadastrar</button></a>
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
								<th>Cliente</th>
								<th>Data</th>
								<th>Defeito</th>
								<th>Status</th>
								<th>Ações</th>
						  	</tr>
						</thead>
						<tbody>
							<?php 
								while($linhas = mysqli_fetch_array($resultado)){
									echo "<tr>";
										echo "<td>".$linhas['id']."</td>";
										echo "<td>".$linhas['nome']."</td>";
										echo "<td>".$linhas['data_inicial']."</td>";
										echo "<td>".$linhas['defeito']."</td>";
										if ($linhas['status'] == 1) {
											$linhas['status'] = 'Orçamento';
										} elseif ($linhas['status'] == 2) {
											$linhas['status'] = 'Em andamento';
										} elseif ($linhas['status'] == 3) {
											$linhas['status'] = 'Finalizado';
										} else {
											$linhas['status'] = 'Encerrado';
										}
										echo "<td>".$linhas['status']."</td>";
										?>
										<td> 
											<a href='administrativo.php?link=30&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Editar/Visualizar'>
												<button type="button" class="btn btn-info btn-circle">
													<i class="fa fa-pencil"></i>
												</button>
											</a>
											<a href='gera_pdf_os.php?id=<?php echo $linhas['id']; ?>' target='_blank' data-toggle='tooltip' title='Imprimir'>
												<button type="button" class="btn btn-danger btn-circle">
													<i class="fa fa-print"></i>
												</button>
											</a>
											<a href='processa/proc_apagar_os.php?id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Excluir'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
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


