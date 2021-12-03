<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Produtos</h1>
        </div>
    </div>
  	<div class="row">
		<div class="col-lg-8">
			<div class="panel panel-primary">
                <div class="panel-heading">
                	Preencha o formulário do produto
                </div>
                <div class="panel-body">
			  		<form class="form" method="POST" action="processa/proc_cad_produtos.php">
			  			<div class="col-md-6 col-sm-6">
				  			<div class="form-group">
								<label class="control-label">Descrição:</label><span style="color: red; font-weight: bold;"> *</span>
								<input type="text" class="form-control descricao" name="descricao" id="descricao" placeholder="Descricao completa do produto" required>
							</div>
						</div>
						<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Unidade:</label> <span style="color: red; font-weight: bold;"> *</span>
						  		<select class="form-control" name="unidade" style="width: 70%">
							  		<option value="1">UN</option>
							  		<option value="2">PC</option>
							  		<option value="3">MT</option>
							  		<option value="4">KG</option>
							  		<option value="5">EM</option>
							  		<option value="6">PR</option>
								</select>
							</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Estoque: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control money" name="estoque" id="estoque" placeholder="Quantidade em estoque" required="">
					  		</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Preço de Compra: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control money" name="precoc" id="precoc" required="">
					  		</div>
					  	</div>
					  	<div class="col-md-3 col-sm-3">
					  		<div class="form-group">
								<label>Preço de Venda: </label><span style="color: red; font-weight: bold;"> *</span>
						  		<input type="text" class="form-control money" name="precov" id="precov" required="">
					  		</div>
					  	</div>
					  	<div class="col-md-6 col-sm-6">
					  		<div class="form-group">
								<label>Observações: </label>
						  		<textarea class="form-control" name="observacoes" rows="7" placeholder=""></textarea>
					  		</div>
					  	</div>
					  	<div class="col-sm-8">
					  		<div class="form-group">
						  		<button type="submit" class="btn btn-success">
						  			<i class="fa fa-save"></i> Gravar
						  		</button>
						  		<a href='administrativo.php?link=32'>
						  			<button type='button' class='btn btn-info'>
						  				<i class="fa fa-list"></i> Listar
						  			</button>
						  		</a>		
							</div>
					  	</div>
					  	<p style="color: red; float: right;"> Os campos com * são obrigatórios.</p>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>