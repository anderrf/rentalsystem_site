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

                <li><a href="" id="notification"><i class="fa fa-bell"></i></a></li>
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
                <table>
                    <tr>
                        <th>Cliente:</th>
                        <th>Endereço:</th>
                        <th>Data:</th>
                        <th>Valor:</th>
                    </tr>
                    <tr>
                        <td class="clPedido">Lucas</td>
                        <td class="endPedido">Av Monteiro Lobato</td>
                        <td class="dtPedido">2019-10-02</td>
                        <td class="vlPedido">500</td>
                    </tr>
                    <tr>
                        <td class="clPedido">Diana</td>
                        <td class="endPedido">Rua S</td>
                        <td class="dtPedido">2019-11-20</td>
                        <td class="vlPedido">250</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>





</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>