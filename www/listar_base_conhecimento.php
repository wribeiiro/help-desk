	<?php
		$sql = "SELECT a.id, a.id_plataforma, a.pergunta, a.resposta, b.nome_plataforma
			FROM base_conhecimento a
			JOIN plataforma b ON (b.id = a.id_plataforma)
			ORDER BY a.id desc";
		$resultado = mysqli_query($con, $sql);
		$linhas    = mysqli_num_rows($resultado);
	?>	
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Base do Conhecimento</h1>
            </div>
        </div>
        <div class="row">
			<div class="form-group">
				<div class="col-md-6" style="text-align: left;">
					<a href="administrativo.php?link=21"><button type='button' class='btn btn-success'><i class="fa fa-pencil"></i> Cadastrar</button></a>
				</div>
	  		</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive dataTable_wrapper">
				  	<table class="table table-responsive table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
						 	<tr>
								<th>ID</th>
								<th>Pergunta</th>
								<th>Resposta</th>
								<th>Plataforma</th>
								<th>Ações</th>
						  	</tr>
						</thead>
						<tbody>
							<?php 
								while($linhas = mysqli_fetch_array($resultado)){	
									echo "<tr>";
										echo "<td>".$linhas['id']."</td>";
										echo "<td>".$linhas['pergunta']."</td>";
										echo "<td>".substr($linhas['resposta'], 0,21). ".."."</td>";
										echo "<td>".$linhas['nome_plataforma']."</td>";
										?>
										<td> 
											<a href='administrativo.php?link=22&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Visualizar'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-search"></i></button></a>
											
											
											<a href='administrativo.php?link=23&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Editar'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
											
											
											<a href='processa/proc_apagar_base_conhecimento.php?id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Excluir'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
										</td>
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


