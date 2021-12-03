<?php  
	$id = $_GET['id'];
	//Executa consulta

	$sql 		= "SELECT * FROM usuarios WHERE id = '$id' LIMIT 1";
	$result 	= mysqli_query($con, $sql);
	$resultado  = mysqli_fetch_assoc($result);
?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar usuários</h1>
        </div>
    </div>

  	<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
            <div class="panel-body">
			  	<form class="form" method="POST" action="processa/proc_edit_usuario.php">
				 	<div class="col-sm-4">
				 		<div class="form-group">
							<label>Nome: </label><span style="color: red; font-weight: bold;"> *</span>
					  		<input type="text" class="form-control" name="nome" placeholder="Nome Completo" value="<?php echo $resultado['nome']; ?>">
						</div>
				  	</div>
				  	<div class="col-sm-4">
				  		<div class="form-group">
							<label>E-mail: </label><span style="color: red; font-weight: bold;"> *</span>
						  	<input type="email" class="form-control" name="email" placeholder="E-mail" value="<?php echo $resultado['email']; ?>">
						</div>
				 	</div>
				  	<div class="col-sm-4">
					 	<div class="form-group">
							<label >Usuário: </label><span style="color: red; font-weight: bold;"> *</span>						
						  	<input type="text" class="form-control" name="usuario" placeholder="Usuário" value="<?php echo $resultado['login']; ?>">
						</div>
					</div>
				  	<div class="col-sm-4">
				  		<div class="form-group">
							<label>Nova senha: </label><span style="color: red; font-weight: bold;"> *</span>
					  		<input type="password" class="form-control" name="senha" placeholder="Senha" value="<?php echo $resultado['senha']; ?>">
						</div>
				  	</div>
				  	<div class="col-sm-4">
				  		<div class="form-group">
							<label>Nivel de Acesso</label><span style="color: red; font-weight: bold;"> *</span>
					  		<select class="form-control" name="nivel_de_acesso">
								<option>Selecione</option>
								<option value="1"
								<?php
									if( $resultado['nivel_acesso_id'] == 1){
										echo 'selected';
									}
								?>
								>Administrativo</option>
								<option value="2"
								<?php
									if( $resultado['nivel_acesso_id'] == 2){
										echo 'selected';
									}
								?>
								>Usuário</option>
							</select>
						</div>
				  	</div>
				  
				  	<input type="hidden" name="id" value="<?php echo $resultado['id']; ?>">
				  	<div class="col-sm-6">
				  		<div class="form-group">
					  		<button type="submit" class="btn btn-success"><i class="fa fa-pencil"></i> Editar</button>
					  		<a href='administrativo.php?link=2'><button type='button' class='btn btn-info'><i class="fa fa-list"></i> Listar</button></a>		
						</div>
				  	</div>
				  	<p style="color: red; float: right;"> Os campos com * são obrigatórios.</p>
				</form>
			</div>
		</div>
	</div>
</div> <!-- /container -->

