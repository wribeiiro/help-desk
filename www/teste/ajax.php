<!-- vamos levar em consideração que voce tem o id do usuario na variavel de sessao -->

<!-- iniciar sessao para poder usar variaveis de sessao, essa parte vai no topo do arquivo -->
<?php session_start(); ?>

<!-- esse script vai no final do arquivo -->
<script>
  function consultaChamado() {
    //captura o id da sessao em php e coloca em uma variavel JS
    var id_usuario = "<?php echo $_SESSION['id']; ?>";
    // aqui é a chamada ajax, precisa ter o jquery no documento
    // type é o tipo de envio (POST ou GET)
    // url é o arquivo que será chamado e receberá os dados de data
    // data são os dados que serão enviados, nesse caso o campo ID receberá o valor da variavel id_usuario que pegamos o
    //valor da sessão anteriormente. Para capturar o valor do ID no documento setado em "URL",
    //devemos chamar pelo tipo que foi informado no type, ou seja, no arquivo select.php se eu usar: $_POST['id']; vou ter o valor que foi passado por aqui
    $.ajax({
      type: 'POST',
      url: 'select.php'
      data: {
        id: id_usuario
      },
      success: function(retorno){
        //essa parte só entra quando termina de percorrer o arquivo select.php; a variavel "retorno" não é um callback, ou seja, valor de resposta que recebe do documento "select.php";
        //verifica se o retorno é ok e apresenta a notificação para o usuario
        if(retorno == 'ok'){
          //aqui coloca o código do notification
        }else{ //se for diferente de ok, não faz nada, pois não queremos que seja mostrado nada caso não tenha notificação para esse usuario
          //faz nada
        }
      }
    });
  }

  //vamos chamar a fnção ja quando iniciar o documento para fazer a primeira verificação
  consultaChamado();

  // setInterval é uma função que fica executando a todo momento, quando chega no tempo
  // o tempo é em milesegundos, então 1000 * 60 = 60000(1 min), 60000 * 5 = 5 minutos
  setInterval(consultaChamado(),1000*60*5);
</script>