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
        <li><a href="pedido.php">Pedido</a></li>
        <li><a href="contato.php">Contato</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login</a></li>
        <li><a href="cadastro.php">Cadastrar</a></li>
      </ul>
    </div>
  </nav>

  <div class="container" id="cont">
    <div class="col-md-12">
      <div class="row ficha">
        <div class="col-md-12">
          <fieldset>
            <p class="textao" id="descPedido">
              AVISO: O endereço descrito deverá ser do local de entrega e retirada do pedido.
            </p>
          </fieldset>
        </div>
      </div>


    </div>
  </div>

  <div class="pedido-box">
    <h2>Faça seu pedido</h2>

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
                      <option value="Roxa">Roxa</option>
                      <option value="Preta">Preta</option>
                      <option value="vermelha">vermelha</option>
                      <option value="Rosa">Rosa</option>
                      <option value="Azul">Azul</option>
                      <option value="Dourado">Dourado</option>
                      <option value="Bege">Bege</option>
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
        <form>
          <input class="btnContato" type="button" name="" value="Cancelar" onclick="location.reload()">
        </form>
      </div>
      <div class="col-md-6">
        <form>
          <input class="btnContato" type="button" name="" value="Avançar" id="cadPedidoProx">
        </form>
        <form>
          <input class="btnContato" type="button" name="" value="Enviar" id="btnEnviarPedido">
        </form>
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
  });

</script>

</html>