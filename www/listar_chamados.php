	<?php
		$sql = "SELECT a.id, a.id_cliente, a.id_usuario, a.problema, a.data, a.conexao, a.solucao, a.status, a.tempo, b.nome, c.login
			FROM 
				chamados a
			LEFT JOIN 
				clientes b ON (b.id = a.id_cliente)
			LEFT JOIN 
				usuarios c ON (c.id = a.id_usuario)";
		$resultado = mysqli_query($con, $sql);
		$linhas    = mysqli_num_rows($resultado);

		$sql2 = "SELECT a.id, a.id_cliente, a.id_usuario, a.problema, a.data, a.conexao, a.solucao, a.status, a.tempo, b.nome, c.login
			FROM 
				chamados a
			JOIN 
				clientes b ON (b.id = a.id_cliente)
			JOIN 
				usuarios c ON (c.id = a.id_usuario) 
			WHERE a.status !=2";
		$queryAbertos  = mysqli_query($con, $sql2);
		$linhasAbertos = mysqli_num_rows($queryAbertos);


		$sql3 = "SELECT a.id, a.id_cliente, a.id_usuario, a.problema, a.data, a.conexao, a.solucao, a.status, a.tempo, b.nome, c.login
			FROM 
				chamados a
			JOIN 
				clientes b ON (b.id = a.id_cliente)
			JOIN 
				usuarios c ON (c.id = a.id_usuario) 
			WHERE a.status =2";
		$queryEncerrados  = mysqli_query($con, $sql3);
		$linhasEncerrados = mysqli_num_rows($queryEncerrados);
	?>	
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lista de Chamados</h1>
            </div>
        </div>
        <div class="row">
			<div class="form-group">
				<div class="col-md-6" style="text-align: left;">
					<a href="administrativo.php?link=10"><button type='button' class='btn btn-success'><i class="fa fa-pencil"></i> Cadastrar</button></a>
				</div>
	  		</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active">
                        	<a href="#abertos" data-toggle="tab">Abertos/Análise</a>
                        </li>
                        <li>
                        	<a href="#encerrados" data-toggle="tab">Encerrados</a>
                        </li>
                        <li>
                        	<a href="#todos" data-toggle="tab">Todos</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="abertos">
                            <div class="table-responsive dataTable_wrapper">
	                            <br>
							  	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
									<thead>
									 	<tr>
											<th>ID</th>
											<th>Cliente</th>
											<th>Analista</th>
											<th>Problema</th>
											<th>Data</th>
											<th>Conexão</th>
											<th>Status</th>
											<th>Ações</th>
									  	</tr>
									</thead>
									<tbody>
										<?php 
											while($linhasAbertos = mysqli_fetch_array($queryAbertos)){
												if ($linhasAbertos['status']==1) {
													$linhasAbertos['status']='Em aberto';
												}elseif($linhasAbertos['status']==3) {
													$linhasAbertos['status']='Análise';
												}	

												$dataphp = strtotime($linhasAbertos['data']);
												$linhasAbertos['data'] = date('d/m/Y', $dataphp);

												echo "<tr>";
													echo "<td>".$linhasAbertos['id']."</td>";
													echo "<td>".$linhasAbertos['nome']."</td>";
													echo "<td>".$linhasAbertos['login']."</td>";
													echo "<td>". substr($linhasAbertos['problema'], 0,32).".."."</td>";
													echo "<td>".$linhasAbertos['data']."</td>";
													echo "<td>". substr($linhasAbertos['conexao'], 0,32).".."."</td>";
													echo "<td>".$linhasAbertos['status']."</td>";
													?>
													<td> 
														<a href='administrativo.php?link=15&id=<?php echo $linhasAbertos['id']; ?>' data-toggle='tooltip' title='Visualizar'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-search"></i></button></a>
														
														<a href='administrativo.php?link=16&id=<?php echo $linhasAbertos['id']; ?>' data-toggle='tooltip' title='Editar'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
														<!--
														<a href='processa/proc_apagar_chamados.php?id=<?php echo $linhasAbertos['id']; ?>'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
														-->
													</td>
													<?php
												echo "</tr>";
											}
										?>
									</tbody>
								</table>
							</div>
                        </div>
                        
                        <div class="tab-pane fade in" id="encerrados">
                            <div class="dataTable_wrapper" style="overflow-y: auto;">
	                            <br>
							  	<table class="table table-striped table-bordered table-hover" id="dataTables-example2">
									<thead>
									 	<tr>
											<th>ID</th>
											<th>Cliente</th>
											<th>Analista</th>
											<th>Problema</th>
											<th>Data</th>
											<th>Conexão</th>
											<th>Status</th>
											<th>Ações</th>
									  	</tr>
									</thead>
									<tbody>
										<?php 
											while($linhasEncerrados = mysqli_fetch_array($queryEncerrados)){
												if ($linhasEncerrados['status']==1) {
													$linhasEncerrados['status']='Em aberto';
												}else {
													$linhasEncerrados['status']='Concluido';
												}	
												
												$dataphp = strtotime($linhasEncerrados['data']);
												$linhasEncerrados['data'] = date('d/m/Y', $dataphp);

												echo "<tr>";
													echo "<td>".$linhasEncerrados['id']."</td>";
													echo "<td>".$linhasEncerrados['nome']."</td>";
													echo "<td>".$linhasEncerrados['login']."</td>";
													echo "<td>". substr($linhasEncerrados['problema'], 0,32).".."."</td>";
													echo "<td>".$linhasEncerrados['data']."</td>";
													echo "<td>". substr($linhasEncerrados['conexao'], 0,32).".."."</td>";
													echo "<td>".$linhasEncerrados['status']."</td>";
													?>
													<td> 
														<a href='administrativo.php?link=15&id=<?php echo $linhasEncerrados['id']; ?>' data-toggle='tooltip' title='Visualizar'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-search"></i></button></a>
														
														<a href='administrativo.php?link=16&id=<?php echo $linhasEncerrados['id']; ?>' data-toggle='tooltip' title='Editar'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
														<!--
														<a href='processa/proc_apagar_chamados.php?id=<?php echo $linhasEncerrados['id']; ?>'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
														-->
													</td>
													<?php
												echo "</tr>";
											}
										?>
									</tbody>
								</table>
							</div>
                        </div>
                        <div class="tab-pane fade in" id="todos">
                            <div class="dataTable_wrapper" style="overflow-y: auto;">
	                            <br>
							  	<table class="table table-striped table-bordered table-hover" id="dataTables-example3">
									<thead>
									 	<tr>
											<th>ID</th>
											<th>Cliente</th>
											<th>Analista</th>
											<th>Problema</th>
											<th>Data</th>
											<th>Conexão</th>
											<th>Status</th>
											<th>Ações</th>
									  	</tr>
									</thead>
									<tbody>
										<?php 
											while($linhas = mysqli_fetch_array($resultado)){
												if ($linhas['status']==1) {
													$linhas['status']='Em aberto';
												}else {
													$linhas['status']='Concluido';
												}	

												$dataphp = strtotime($linhas['data']);
												$linhas['data'] = date('d/m/Y', $dataphp);

												echo "<tr>";
													echo "<td>".$linhas['id']."</td>";
													echo "<td>".$linhas['nome']."</td>";
													echo "<td>".$linhas['login']."</td>";
													echo "<td>". substr($linhas['problema'], 0,32).".."."</td>";
													echo "<td>".$linhas['data']."</td>";
													echo "<td>". substr($linhas['conexao'], 0,32).".."."</td>";
													echo "<td>".$linhas['status']."</td>";
													?>
													<td> 
														<a href='administrativo.php?link=15&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Visualizar'><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-search"></i></button></a>
														
														<a href='administrativo.php?link=16&id=<?php echo $linhas['id']; ?>' data-toggle='tooltip' title='Editar'><button type="button" class="btn btn-info btn-circle"><i class="fa fa-pencil"></i></button></a>
														<!--
														<a href='processa/proc_apagar_chamados.php?id=<?php echo $linhas['id']; ?>'><button type="button" class="btn btn-warning btn-circle"><i class="fa fa-times"></i></button></a>
														-->
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
                </div>
			</div>
		</div>
	</div> <!-- /container -->


