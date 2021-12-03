        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php 
                                            require_once ("conexao.php");
                                            $sql = "SELECT COUNT(*) AS total FROM chamados";
                                            $res = mysqli_query($con, $sql);

                                            $linhas = mysqli_fetch_assoc($res);

                                            echo $linhas['total'];
                                        ?> 
                                    </div>
                                    <div>Chamados</div>
                                </div>
                            </div>
                        </div>
                        <a href="administrativo.php?link=11">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php require_once ("conexao.php");
                                            $sql = "SELECT COUNT(*) AS total FROM clientes";
                                            $res = mysqli_query($con, $sql);

                                            $linhas = mysqli_fetch_assoc($res);

                                            echo $linhas['total'];
                                        ?>
                                    </div>
                                    <div>Clientes</div>
                                </div>
                            </div>
                        </div>
                        <a href="administrativo.php?link=13">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-question-circle fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php require_once ("conexao.php");
                                            $sql = "SELECT COUNT(*) AS total FROM base_conhecimento";
                                            $res = mysqli_query($con, $sql);

                                            $linhas = mysqli_fetch_assoc($res);

                                            echo $linhas['total'];
                                        ?>
                                    </div>
                                    <div>Base do Conhec.</div>
                                </div>
                            </div>
                        </div>
                        <a href="administrativo.php?link=20">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">
                                        <?php require_once ("conexao.php");
                                            $sql = "SELECT COUNT(*) AS total FROM usuarios";
                                            $res = mysqli_query($con, $sql);

                                            $linhas = mysqli_fetch_assoc($res);

                                            echo $linhas['total'];;
                                        ?>
                                    </div>
                                    <div>Usuários</div>
                                </div>
                            </div>
                        </div>
                        <a href="administrativo.php?link=2">
                            <div class="panel-footer">
                                <span class="pull-left">Ver Detalhes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-6">
                        <h1 class="page-header">Informações do Sistema</h1>
                    </div>
                    <div class="col-lg-6">
                        <h1 class="page-header">Notícias</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php 
                        /* Total de chamados realizados */
                        $sql1 = "SELECT COUNT(*) AS total FROM chamados";
                        $resultT = mysqli_query($con, $sql1);
                        $linhasT = mysqli_fetch_assoc($resultT);

                        /* Total de chamados em aberto */
                        $sql2 = "SELECT COUNT(*) AS total FROM chamados WHERE status='2'";
                        $result = mysqli_query($con, $sql2);
                        $linhas = mysqli_fetch_assoc($result);

                        /* Total de chamados encerrados */
                        $sql3 = "SELECT COUNT(*) AS total FROM chamados WHERE status='1'";
                        $result2 = mysqli_query($con, $sql3);
                        $linhas2 = mysqli_fetch_assoc($result2);

                        /* Total de chamados em analise */
                        $sqlA = "SELECT COUNT(*) AS total FROM chamados WHERE status='3'";
                        $resultA = mysqli_query($con, $sqlA);
                        $linhasA = mysqli_fetch_assoc($resultA);

                        /* Total de chamados realizados no período(Mês atual) */
                        $sqlMes = "SELECT COUNT(*) AS total FROM chamados WHERE MONTH(data) = MONTH(Now())";
                        $resultMes = mysqli_query($con, $sqlMes);
                        $linhasMes = mysqli_fetch_assoc($resultMes);

                        /* Clientes com Pendencias */
                        $sqlPend = "SELECT COUNT(*) AS total FROM clientes WHERE situacao = '2'";
                        $resultPend = mysqli_query($con, $sqlPend);
                        $linhasPend = mysqli_fetch_assoc($resultPend);

                    ?>
                    <div id="chamados" class="col-md-12">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="administrativo.php?link=11" class="hover">
                                    <h3 style="color: #5CB85C">Chamados realizados </h3>
                                </a> 
                                <h3><?php echo $linhasT['total']?></h3>
                            </div>

                            <div class="col-md-3">
                                <a class="hover">
                                    <h3 style="color: #3c5a99">Chamados em análise </h3> 
                                </a>
                                <h3><?php echo $linhasA['total']?></h3>
                            </div>

                            <div class="col-md-3">
                                <a href="administrativo.php?link=11#abertos" class="hover">
                                    <h3 style="color: #D9534F">Chamados em aberto </h3>
                                </a> 
                                <h3><?php echo $linhas2['total']?></h3>
                            </div>

                            <div class="col-md-3">
                                <a class="hover">
                                    <h3 style="color: #3c5a99">Chamados no Mês </h3> 
                                </a>
                                <h3><?php echo $linhasMes['total']?></h3>
                            </div>

                            <div class="col-md-3">
                                <a href="administrativo.php?link=11#encerrados" class="hover">
                                    <h3 style="color: #F0AD4E">Chamados encerrados </h3> 
                                </a>
                                <h3><?php echo $linhas['total']?></h3>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <a href="administrativo.php?link=13" class="hover">
                                <h3 style="color: #D9534F">Clientes com pendências </h3>
                            </a>
                            <h3><?php echo $linhasPend['total']?></h3>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="list-group">
                        <?php
                            $xml = simplexml_load_file('http://www.contabeis.com.br/rss/noticias/') or die("Erro ao carregar arquivo, o arquivo não existe, ou verifique sua conexão com a internet!");
                            $cont = 0;
                            foreach ($xml->channel->item as $noticia) {
                                $cont ++;

                                if ($cont >= 5) {
                                    break;
                                }
                                $noticia->pubDate = date('d/m/Y');

                                echo "
                                    <a href=\"$noticia->link\" target=\"_blank\" class=\"list-group-item\">
                                        <i class=\"fa fa-rss fa-fw\"></i> $noticia->title
                                        <br>
                                        <small>$noticia->pubDate - Fonte: Portal Contábeis
                                        </small>       
                                    </a><br>
                                ";
                            }
                        ?> 
                    </div>
                </div>
            </div>
        </div>