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
    <title>RentalSystem - Quem Somos</title>
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
        <h1>Quem Somos?</h1>
        <p></p>
    </div>

    <div class="container">
        <div class="col-md-6">
            <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="img/donos.jpg" id="donos" alt="Avatar" style="width:300px;height:300px;">
                    </div>
                    <div class="flip-card-back">
                        <h1>Tati & Isaque</h1>
                        <p>Autônomo</p>
                        <p>Bem Vindos!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>Informações sobre a empresa</h2>


            <div class="row ficha">
                <div class="col-md-12">
                    <fieldset>
                        <legend></legend>
                        <p class="textao">
                            A empresa de aluguel Tati & Isaque - aluguel de mesas e cadeiras, conta com diversos jogos
                            para seu aluguel, tendo mais de 5 anos no mercado de locação, a empresa tenta buscar o
                            melhor custo beneficio do ramo de aluguel para eventos.

                    </fieldset>
                </div>
            </div>


        </div>
    </div>

    <br>
    <br>
    <br>

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
                            <label for=""><span
                                    class="glyphicon glyphicon-earphone spancont"></span>(13)3507-3362</label>
                        </div>
                    </div>
                    <div class="row ritemfoot">
                        <div class="col-md-12">
                            <label><span
                                    class="glyphicon glyphicon-envelope spancont"></span>isaqueborin@hotmail.com</label>
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
                                        <label for=""><a href="login.html">Login</a></label>
                                    </div>
                                </div>
                                <div class="row ritemfoot">
                                    <div class="col-md-12">
                                        <label for=""><a href="cadastro.html">Cadastro</a></label>
                                    </div>
                                </div>
                            ';
                        }
                        else{
                            echo '
                                <div class="row ritemfoot">
                                    <div class="col-md-12">
                                        <label for=""><a href="conta.html">Conta</a></label>
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
                            <label><span class="glyphicon glyphicon-map-marker spancont"></span> Mongaguá - SP</label>
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