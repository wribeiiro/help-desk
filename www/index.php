<?php
    session_start();
    require_once 'conexao.php';
?>

<!--
    Name: Sistema Help-Desk
    Versão: 1.0
    Author: Wellisson Ribeiro
    website: http://www.support-br.com.br
    contato: welleh10@gmail.com
    facebook: /wellissonribeiiro
    github: /wellehr
    Licença: Copia e sem autorização proibida!
-->
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <title>Área Restrita - Autenticação</title> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Página para realizar login">
    <meta name="author" content="Wellisson">
   
    <link rel="icon" href="imagens/logo_support.png">

    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <script src="js/ie-emulation-modes-warning.js"></script>
</head>

<body style="
    background:linear-gradient(rgba(0,0,0, 0.5),rgba(0,0,0, 0.5)),
    url(imagens/bg.jpg) repeat;
    background-position:center top;
    background-attachment:fixed;
    background-size:cover;">
    <?php
        unset(
            $_SESSION['registro'],
            $_SESSION['limite'],
            $_SESSION['usuarioId'],         
            $_SESSION['usuarioNome'],       
            $_SESSION['usuarioNivelAcesso'], 
            $_SESSION['usuarioLogin'],      
            $_SESSION['usuarioSenha']
        );
    ?>
    <div class="container page-login">
        <div class="row">
            <div class="col-md-5 col-lg-4  col-lg-offset-4">
                <div class="login-container">
                    <div class="login-logo" style="text-align: center;">
                        <img src="imagens/logo_support.png">
                    </div>
                    <br>
                    <div class="login-panel panel panel-primary">
                        <div class="panel-heading"> 
                            <h3 class="panel-title" style="text-align: center;">Autenticação - Help Desk </h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-signin" method="POST" action="valida_login.php">
                                <fieldset>
                                    <div class="form-group has-feedback">
                                        <label class="control-label"></label>
                                        <input type="text" class="form-control" placeholder="Digite seu usuario.." name="usuario" required autofocus>
                                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    </div>
                                    <div class="form-group has-feedback">
                                        <label class="control-label"></label>
                                        <input type="password" class="form-control" placeholder="Digite sua senha.." name="senha" required autofocus>
                                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    </div>

                                    <a class="text-center text-danger" href="recupera_senha.php" style="float: right; font-size: 12px">Esqueceu sua senha?</a>
                                    <br><br>
                                    <button class="btn btn-primary btn-block mb-10" type="submit" style="background-color: #027CC1; border: solid 1px #027CC1"><i class="fa fa-check"></i> Entrar</button>
                                </fieldset>
                            </form>
                            <p class="text-center text-danger">
                                <?php
                                    if(isset($_SESSION['loginErro'])){
                                        echo $_SESSION['loginErro'];
                                        unset($_SESSION['loginErro']);
                                    }
                                    if(isset($_SESSION['loginPermissao'])) {
                                        echo $_SESSION['loginPermissao'];
                                        unset($_SESSION['loginPermissao']);
                                    }
                                ?>
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script> 
</body>
</html>