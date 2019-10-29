<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/clientes.css">
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

                <li><a href="" id="notification" data-toggle="modal" data-target="#moNotif"><i
                            class="fa fa-bell"></i></a></li>
            </ul>
        </div>
    </nav>


    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <h2>Clientes</h2>
            </div>
            <div class="col-md-6">
                <form>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Pesquise por clientes">
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
                        <th>Nome:</th>
                        <th>Telefone:</th>
                        <th>Endereço:</th>
                    </tr>
                    <tr>
                        <td class="nmCliente">Geraldo</td>
                        <td class="telCliente">4002-8922</td>
                        <td class="endCliente">Av São Paulo</td>
                    </tr>
                    <tr>
                        <td class="nmCliente">Viviane</td>
                        <td class="telCliente">2244-1000</td>
                        <td class="endCliente">Av Marina</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="modal fade" id="moNotif">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Notificações</h3>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <label for="">A</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="">B</label>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>





</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>