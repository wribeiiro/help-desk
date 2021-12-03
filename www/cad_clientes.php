<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Clientes</h1>
        </div>
    </div> 
  	<div class="row">
  		<div class="panel panel-primary">
            <div class="panel-heading">
            	Preencha o formulário do cliente
            </div>
            <div class="panel-body">
            	<form class="form" id="form_clie" method="POST" action="processa/proc_cad_clientes.php">
            		<!--<div class="alert alert-success alert-dismissable sendmessage" id="sendmessage">
					 	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					 	<strong>Registro inserido com sucesso!</strong>
					</div>
					-->
			        <div class="col-sm-4">
			            <div class="form-group">
						   <label>Tipo Pessoa: </label> <span style="color: red; font-weight: bold;"> *</span>
		  					<select class="form-control" name="tipo_pessoa" id="tipo_pessoa" class="tipo_pessoa">
		  						<option value="0">Selecione o Tipo</option>
					  			<option value="1">Física</option>
								<option value="2">Jurídica</option>
					  	 	</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						   <label class="nome-razao">Nome: </label> <span style="color: red; font-weight: bold;"> *</span>
						  	<input type="text" class="form-control" name="nome" placeholder="Informe o nome Completo" required="">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						    <label>Telefone: </label> <span style="color: red; font-weight: bold;"> *</span>
							<input type="text" class="form-control" name="telefone" id="telefone" placeholder="Informe o telefone" required="">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						    <label>CPF/CNPJ: </label> <span style="color: red; font-weight: bold;"> *</span>
							<input type="text" class="form-control" name="cnpj" id="cnpj" class="texto-cpf-cnpj" placeholder="Informe o cpf ou cnpj" required="">
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
						    <label>Situação:</label><span style="color: red; font-weight: bold;"> *</span>
						  	<select class="form-control" name="situacao">
								<option value="1">Em dia</option>
								<option value="2">Divida</option>
							</select>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
						    <label>Atualiza Automático:</label><span style="color: red; font-weight: bold;"> *</span>
						  	<select class="form-control" name="atualiza">
								<option value="S">Sim</option>
								<option value="N">Não</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						    <label>Contato: </label>
						    <input type="text" class="form-control" name="contato" id="contato" placeholder="Contato">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						    <label>E-mail: </label>
						    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail do Cliente">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
						    <label>Observação: </label>
						  	<textarea class="form-control" name="observacao" rows="7" placeholder="Observações do cliente"></textarea>
						</div>
					</div>
					<?php 
						if($_SESSION['usuarioNivelAcesso'] == 1){
							echo "
								<div class=\"col-sm-4\">
									<div class=\"form-group\">
									    <label>Senhas: </label>
									  	<textarea class=\"form-control\" name=\"senhas\" rows=\"7\" placeholder=\"Senhas do Cliente\"></textarea>
									</div>
								</div>
							";
						}
					?>
					<div class="form-group">
						<div class="col-sm-6">
					  		<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Cadastrar</button>
					  		<a href='administrativo.php?link=13&id=<?php echo $resultado['id']; ?>'><button type='button' class='btn btn-info'><i class="fa fa-list"></i> Listar</button></a>
						</div>
				  	</div>
				  	<p style="color: red; float: right;"> Os campos com * são obrigatórios.</p>
				</form>
			</div>
		</div>
	</div>
</div> 