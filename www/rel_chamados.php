<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Relatórios Chamados</h1>
        </div>
    </div>
  	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-default">
                	<div class="panel-body">
						<form class="form_pdf" method="POST" action="gera_pdf_chamados.php"> 
							<legend>Relatorio por período em PDF</legend>
							<div class="col-sm-4"> 
								<div class="form-group">
									<label>Inicial: </label>
							  		<input type="text" name="datainiciopdf" class="calendario form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group"> 
								<label>Final: </label> 
						  			<input type="text" name="datafinalpdf" class="calendario form-control" required>
								</div>
				  			</div>
				  			<div class="col-md-8"> 
					  			<div class="form-group">
							  		<button type="submit" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Gerar PDF</a></button>
								</div>
					  		</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-default">
                	<div class="panel-body">
						<form class="form_xls" method="POST" action="gera_xls_chamados.php"> 
							<legend>Relatorio por período em Excel</legend>
							<div class="col-sm-4"> 
								<div class="form-group">
									<label>Inicial: </label>
							  		<input type="text" name="datainicio" id="calendario2" class="calendario form-control" required>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group"> 
								<label>Final: </label> 
						  			<input type="text" name="datafinal" id="calendario3" class="calendario form-control" required >
								</div>
				  			</div>
				  			<div class="col-md-8"> 
					  			<div class="form-group">
							  		<button type="submit" class="btn btn-primary"><i class="fa fa-file-excel-o"></i> Gerar XLS</a></button>
								</div>
					  		</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- /container -->