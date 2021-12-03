<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Importação de dados</h1>
        </div>
    </div>
  	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-default">
                	<div class="panel-body">
						<form class="form-txt" method="POST" action="processa/proc_letxt.php" enctype="multipart/form-data"> 
							<legend>Importar Clientes</legend>
				  			<div class="col-md-8"> 
					  			<div class="form-group">
						  			<div class="fileinput fileinput-new" data-provides="fileinput">
										<span class="btn btn-default btn-file">
											<input type="file" name="arquivo" accept="text/plain"/>
										</span>
									</div>
								</div>
								<button type="submit" class="btn btn-danger"><i class="fa fa-file-text-o"></i> Importar</a></button>
					  		</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<small>Layout do txt <br>
					CNPJ|IE|NOME|EMAIL|FONE|CEP|ENDERECO|NUMERO|COMPLEMENTO|BAIRRO|CIDADE|UF|CEP|
				</small>
			</div>
		</div>
	</div>
</div> <!-- /container -->