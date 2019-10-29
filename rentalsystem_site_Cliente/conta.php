<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styleVenda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>RentalSystem - Conta</title>
</head>

<body>

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
          </div>

          <ul class="nav navbar-nav">

            <li><a href="index.php">Home</a></li>
            <li><a href="quemsomos.php">Quem somos</a></li>
            <li><a href="pedido.php">Pedido</a></li>
            <li><a href="contato.php">Contato</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="" id="notification"><i class="fa fa-bell"></i></a></li>
              <li><a href="cadastro.php"><i class="fa fa-power-off">  Sair</i></a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid divContent" style="min-height: 60vh">

        <div class="row">
            <div class="col-xs-3">
                <div class="card">
                    <h2>Sua conta</h2>
                    <img src="img/pessoa.jpg" alt="John" style="width:100%">
                    <h2>Nome</h2>
                    <p class="title">Conta Cliente</p>
                    <p>Telefone: </p>
                    <p>Endereço: </p>
                </div>
            </div>
            <div class="col-xs-8" style="background-color: white; border-radius: 5px">
                <h2>Recentes:</h2>
                <hr>
                <div class="row">

                </div>
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

                    <div class="row ritemfoot">
                        <div class="col-md-12">
                            <label for="">Login</label>
                        </div>
                    </div>
                    <div class="row ritemfoot">
                        <div class="col-md-12">
                            <label for="">Cadastro</label>
                        </div>
                    </div>

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