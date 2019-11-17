<?php
    session_start();
    $varLogin = $_SESSION['varLogin'];
?>
<!DOCTYPE html>
<html lang="br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styleVenda.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>RentalSystem</title>
</head>
<body>

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
          </div>

          <ul class="nav navbar-nav">

            <li><a href="index.php">Home</a></li>
            <li><a href="quemsomos.php">Quem somos</a></li>
            <li><a href="<?php 
            
            if($varLogin != true){
                echo 'cadastro.php';
            }
            else{
                echo 'pedido.php';
            }

            ?>">Pedido</a></li>
            <li><a href="contato.php">Contato</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
                if($varLogin != true){
                    echo '<li><a href="login.php">Login</a></li>
                    <li><a href="cadastro.php">Cadastrar</a></li>';
                }
                else{
                    echo '<li><a href="conta.php"><i class="fa fa-bell"> Conta</i></a></li>
                    <li><a href="https://rentalsystempm.000webhostapp.com/php/conta/logout.php" id="btnDeslogar"><i class="fa fa-power-off">  Sair</i></a></li>';
                }
            ?>
            </ul>
        </div>
    </nav>

    <div class="jumbotron text-center updest">
      <h1>Tati & Isaque</h1>
      <p>Aluguel de mesas e cadeiras</p>
    </div>
    <section class="slideshow">
      <div class="content">
        <div class="content-car">
          <figure class="shadow"><img src="img/foto1.jpg"></figure>
          <figure class="shadow"><img src="img/foto2.jpg"></figure>
          <figure class="shadow"><img src="img/foto3.jpg"></figure>
          <figure class="shadow"><img src="img/foto4.jpg"></figure>
          <figure class="shadow"><img src="img/foto5.jpg"></figure>
          <figure class="shadow"><img src="img/foto6.jpg"></figure>
          <figure class="shadow"><img src="img/foto7.jpg"></figure>
          <figure class="shadow"><img src="img/foto8.jpg"></figure>
          <figure class="shadow"><img src="img/foto9.jpg"></figure>
        </div>
      </div>
    </section>
    <div class="container" >
            <div class="col-md-6" style="text-align: center">
                <img src="img/cadeira_mesas.png" alt="" style="width: 80%">
            </div>
            <div class="col-md-6">

                <h2>Locação de mesas e cadeiras</h2>


                <div class="row ficha">
                    <div class="col-md-12">
                        <fieldset>
                            <legend>Faça seu aluguel</legend>
                            <p class="textao">
                              O melhor jeito para fazer sua festa, simples e fácil, com o melhor preço da região!
				Alugue agora conosco, Não perca tempo!

                        </fieldset>
                    </div>
                </div>


            </div>
        </div>




        <div class="row rind">
            <div class="col-md-12">

            </div>
        </div>

    </div>

    <div class="container-fluid foot">

        <div class="row foot">

            <div class="col-md-4">
                <fieldset>
                    <legend class="lgfoot">Contato</legend>
                    <div class="row ritemfoot">
                        <div class="col-md-12">
                            <label><span class="glyphicon glyphicon-map-marker spancont"></span>Mongaguá - SP</label>
                        </div>
                    </div>
                    <div class="row ritemfoot">
                        <div class="col-md-12">
                            <label for=""><span class="glyphicon glyphicon-earphone spancont"></span>(13)3507-3362</label>
                        </div>
                    </div>
                    <div class="row ritemfoot">
                        <div class="col-md-12">
                            <label><span class="glyphicon glyphicon-envelope spancont"></span>isaqueborin@hotmail.com</label>
                        </div>
                    </div>

                </fieldset>
            </div>

            <div class="col-md-4">
                <fieldset>
                    <legend class="lgfoot">Minha conta</legend>
                    <?php
                        if($varLogin != true){
                            echo '
                                <div class="row ritemfoot">
                                    <div class="col-md-12">
                                        <label for=""><a href="login.php">Login</a></label>
                                    </div>
                                </div>
                                <div class="row ritemfoot">
                                    <div class="col-md-12">
                                        <label for=""><a href="cadastro.php">Cadastro</a></label>
                                    </div>
                                </div>
                            ';
                        }
                        else{
                            echo '
                                <div class="row ritemfoot">
                                    <div class="col-md-12">
                                        <label for=""><a href="conta.php">Conta</a></label>
                                    </div>
                                </div>
                                <div class="row ritemfoot">
                                    <div class="col-md-12">
                                        <label for=""><a href="https://rentalsystempm.000webhostapp.com/php/conta/logout.php">Sair</a></label>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                </fieldset>

            </div>

            <div class="col-md-4">
                <fieldset>
                    <legend class="lgfoot">Sede</legend>

                    <div class="row ritemfoot">
                        <div class="col-md-12">
                            <label><span class="glyphicon glyphicon-map-marker spancont"></span>  Mongaguá - SP</label>
                        </div>
                    </div>

                </fieldset>
            </div>


        </div>

    </div>

</body>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</html>
