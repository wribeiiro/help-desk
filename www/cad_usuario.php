<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Usuários</h1>
        </div>
    </div>
  	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-primary">
                <div class="panel-heading">
                	Preencha o formulário do usuário
                </div>
                <div class="panel-body">
			  		<form class="form" method="POST" action="processa/proc_cad_usuario.php">  
			  			<div class="col-sm-4">
				  			<div class="form-group">
								<label>Nome:</label><span style="color: red; font-weight: bold;"> *</span>
					  			<input type="text" class="form-control" name="nome" placeholder="Nome Completo" required>
							</div>
				  		</div>
				  		<div class="col-sm-4">
					  		<div class="form-group">
								<label>E-mail:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="email" class="form-control" name="email" placeholder="E-mail" required>
							</div>
					  	</div>
					  	<div class="col-sm-4">
					  		<div class="form-group">
								<label>Usuário:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control" name="usuario" placeholder="Usuário" required>
							</div>
					  	</div>
					  	<div class="col-sm-4">
						  	<div class="form-group">
								<label>Senha:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="password" class="form-control" name="senha" placeholder="Senha" required>
							</div>
					  	</div> 
					  	<div class="col-sm-4">
					  		<div class="form-group">
							<label>Nivel de Acesso:</label><span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="nivel_de_acesso">
							  		<option value="1">Administrativo</option>
							  		<option value="2">Usuário</option>
								</select>
							</div>
					  	</div>
					  	<div class="col-sm-8">
					  		<div class="form-group">
						  		<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Cadastrar</button>
						  		<a href='administrativo.php?link=2'><button type='button' class='btn btn-info'><i class="fa fa-list"></i> Listar</button></a>		
							</div>
					  	</div>
					  	<p style="color: red; float: right;"> Os campos com * são obrigatórios.</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>