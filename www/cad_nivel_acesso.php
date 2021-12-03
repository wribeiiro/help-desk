<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Nivel de acesso</h1>
        </div>
    </div>
  	<div class="row">
		<div class="panel panel-primary">
            <div class="panel-heading">
            	Preencha o formulário do nível de acesso
            </div>
            <div class="panel-body">
		  		<form class="form" method="POST" action="processa/proc_cad_nivel_acesso.php">
				  	<div class="col-sm-4">
						<div class="form-group">
						   <label class="nome_nivel">Nível: </label> <span style="color: red; font-weight: bold;"> *</span>
						  	<input type="text" class="form-control" name="nome_nivel" placeholder="Nome nivel acesso" required="">
						</div>
					</div>
			  		<div class="col-sm-12">
			  			<div class="form-group">
				  			<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Cadastrar</button>
				  			<a href='administrativo.php?link=6'><button type='button' class='btn btn-success'><i class="fa fa-list"></i> Listar</button></a>
						</div>
			  		</div>
				</form>
			</div>
		</div>
	</div>	
</div>