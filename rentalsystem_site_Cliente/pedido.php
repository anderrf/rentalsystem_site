<?php
    session_start();
    $varLogin = $_SESSION['varLogin'];

    if($varLogin != true){
      header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/cadastro.php');
      echo "Cadastre-se e entre para acessar a página de pedido.";
    }
    else{
    }

    $codigo = $_SESSION['codigo'];
?>
<!DOCTYPE html>
<html lang="br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styleVenda.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>RentalSystem - Pedido</title>
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

  <div class="container" id="cont" style="background-color: transparent">
    <div class="col-md-12">
      <div class="row ficha">
        <div class="col-md-12">
          <fieldset>
            <p class="textao" id="descPedido">
            </p>
          </fieldset>
        </div>
      </div>


    </div>
  </div>

  <div class="pedido-box" style="min-width: 50vw">
    <h2 id="hCodigo" data-id="<?php echo $codigo ?>">Faça seu pedido</h2>

    <div id="ped1">
      <div class="row">
        <div class="col-md-9">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="text" placeholder="Endereço" name="" value="" id="pedEndereco" maxlength="50">
          </div>
        </div>
        <div class="col-md-3">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="number" placeholder="Nº" name="" value="" id="pedNumero" maxlength="4">
          </div>
        </div>
      </div>
      <div class="textbox">
        <i class="fa fa-home"></i>
        <input type="text" placeholder="Bairro" name="" value="" id="pedBairro" maxlength="50">
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="text" placeholder="Cidade" name="" value="" id="pedCidade" maxlength="50">
          </div>
        </div>
        <div class="col-md-3">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="text" placeholder="UF" name="" value="" id="pedUF" maxlength="2">
          </div>
        </div>
      </div>
      <div class="textbox">
        <i class="fa fa-map-signs"></i>
        <input type="text" placeholder="Referência" name="" value="" id="pedReferencia" maxlength="50">
      </div>
    </div>

    <div id="ped2">
      <div class="textbox">
        <i class="fa fa-list-ol"></i>
        <input type="number" placeholder="Jogos" name="" value="" id="pedJogos" maxlength="2">
      </div>
    </div>

    <div id="ped2_1">
      <h1>Deseja cadeiras e mesas adicionais?</h1>
      <div class="col-md-6">
        <input class="btnContato" type="radio" name="adicional" value="sim" id="adicional">Sim
        <input class="btnContato" type="radio" name="adicional" value="nao" id="adicional">Não
      </div>
    </div>


    <div id="ped2_2">
      <div class="textbox">
        <i class="fa fa-calculator"></i>
        <input type="number" placeholder="Mesas" name="" value="" id="pedMesas" maxlength="2">
      </div>
      <div class="textbox">
        <i class="fa fa-calculator"></i>
        <input type="number" placeholder="Cadeiras" name="" value="" id="pedCadeiras" maxlength="2">
      </div>

    </div>

    <div id="ped3">
      <div class="textbox">
        <div class="row linha">
          <div class="col-xs-12">
            <div class="form-group">
              <label for="">Toalhas:</label>
              <div class="row">

                <div class="col-xs-6">
                  <div class="form-group">
                    <label for="">Cor</label>
                    <select class="form-control" name="lista" id="pedCorToalha">
                      <option value=""></option>
                    </select>
                  </div>
                </div>

                <div class="col-xs-6">
                  <div class="form-group">
                    <div class="textbox">
                      <input type="number" placeholder="Quantidade" name="" value="" id="pedQtToalha" maxlength="2">
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <input type="checkbox" value="negarToalhas" id="negarToalhas" name="negarToalhas">Não preciso de toalhas
              </div>
            </div>

          </div>



        </div>
      </div>
    </div>

    <div id="ped4">
      <div class="textbox">
        <label for="">Entrega</label>
        <div class="row">
          <div class="col-md-6">
            <label for="">Data:</label>
            <input type="date" placeholder="Entrega" name="" value="" id="pedDataEntrega">
          </div>
          <div class="col-md-6">
            <label for="">Horário</label>
            <input type="time" placeholder="Horário" name="" value="" id="pedHoraEntrega">
          </div>
        </div>

      </div>
      <div class="textbox">
        <label for="">Retirada</label>
        <div class="row">
          <div class="col-md-6">
            <label for="">Data:</label>
            <input type="date" placeholder="Retirada" name="" value="" id="pedDataRetirada">
          </div>
          <div class="col-md-6">
            <label for="">Horário</label>
            <input type="time" placeholder="Horário" name="" value="" id="pedHoraRetirada">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
          <input class="btnContato" type="button" name="" value="Cancelar" onclick="location.reload()">
      </div>
      <div class="col-md-6">
          <input class="btnContato" type="button" name="" value="Avançar" id="cadPedidoProx">
          <input class="btnContato" type="button" name="" value="Enviar" id="btnEnviarPedido">
      </div>
    </div>





  </div>
</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/action.js"></script>
<script src="js/pedido.js"></script>
<script>
  $(document).ready(function () {
    indexPedido = 1;
    dividePedido();
    listaCorToalha();
  });

</script>

</html>