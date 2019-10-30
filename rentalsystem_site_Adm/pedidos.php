<?php
    session_start();

    $varLogin = $_SESSION['varLogin'];

    if($varLogin != true){
        $varLogin = false;
        $_SESSION['nome'] = "";
        $_SESSION['senha'] = "";
        $_SESSION['nivel'] = 0;
        $_SESSION['codigo'] = 0;
        echo "Acesso negado.";
        header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/index.php');
    }
    else{
        $nivel =  $_SESSION['nivel'];
        if($nivel != 1){
            echo "Acesso negado.";
            header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/index.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/pedidos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>RentalSystem - Admin</title>
</head>

<body>

    <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            </div>

            <ul class="nav navbar-nav">

                <li><a href="index.php">Home</a></li>
                <li><a href="pedidos.php">Pedidos</a></li>
                <li><a href="clientes.php">Clientes</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php
                    echo '
                        <li><a href="" id="notification"><i class="fa fa-bell"></i></a></li>
                        <li><a href="https://rentalsystempm.000webhostapp.com/php/conta/logout.php" id="btnDeslogar"><i class="fa fa-power-off">  Sair</i></a></li>
                    ';
                ?>
            </ul>
        </div>
    </nav>


    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h2>Pedidos</h2>
            </div>
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquise por pedidos">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <table id="tbPedidos">
                </table>
            </div>
        </div>

    </div>





</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/pedido.js"></script>
</html>