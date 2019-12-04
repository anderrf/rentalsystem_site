<?php
    session_start();
    $_SESSION['erro'] = null;
    $varLogin = $_SESSION['varLogin'];

    if($varLogin != true){
      header('Location: ../../rentalsystem_site_cliente/cadastro.php');
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
            echo '<li><a href="conta.php"><i class="fa fa-user">  Conta</i></a></li>
            <li><a href="../../php/conta/logout.php" id="btnDeslogar"><i class="fa fa-power-off">  Sair</i></a></li>';
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
    <h2 id="hCodigo" data-id="<?php echo $codigo ?>" style="padding-bottom: 20px">Faça seu pedido</h2>

    <div id="ped1">
      <div class="row">
        <div class="col-md-9">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="text" placeholder="Endereço" name="" value="" id="pedEndereco" maxlength="50" class="pedText">
          </div>
        </div>
        <div class="col-md-3">
          <div class="textbox">
            <input type="number" placeholder="Nº" name="" value="" id="pedNumero" maxlength="5" min="1" max="99999">
          </div>
        </div>
      </div>
      <div class="textbox">
        <i class="fa fa-home"></i>
        <input type="text" placeholder="Bairro" name="" value="" id="pedBairro" maxlength="50" class="pedText">
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="text" placeholder="Cidade" name="" value="" id="pedCidade" maxlength="50" class="pedText">
          </div>
        </div>
        <div class="col-md-3">
          <div class="textbox">
            <select style="margin-top:-7px;" class="form-control" type="text" placeholder="UF" name="" value="" id="pedUF" maxlength="2">
                <option value="">Escolha a UF</option>
                <option value="AC">AC</option>
                <option value="AL">AL</option>
                <option value="AP">AP</option>
                <option value="AM">AM</option>
                <option value="BA">BA</option>
                <option value="CE">CE</option>
                <option value="DF">DF</option>
                <option value="ES">ES</option>
                <option value="GO">GO</option>
                <option value="MA">MA</option>
                <option value="MT">MT</option>
                <option value="MS">MS</option>
                <option value="MG">MG</option>
                <option value="PA">PA</option>
                <option value="PB">PB</option>
                <option value="PR">PR</option>
                <option value="PE">PE</option>
                <option value="PI">PI</option>
                <option value="RJ">RJ</option>
                <option value="RN">RN</option>
                <option value="RS">RS</option>
                <option value="RO">RO</option>
                <option value="RR">RR</option>
                <option value="SC">SC</option>
                <option value="SP">SP</option>
                <option value="SE">SE</option>
                <option value="TO">TO</option>
            </select>
          </div>
        </div>
      </div>
      <div class="textbox">
        <i class="fa fa-map-signs"></i>
        <input type="text" placeholder="Referência" name="" value="" id="pedReferencia" maxlength="50" class="pedText">
      </div>
    </div>

    <div id="ped2">
      <div class="textbox">
        <i class="fa fa-list-ol"></i>
        <input type="number" placeholder="Jogos (conjunto de 01 mesa e 04 cadeiras)" name="" value="" id="pedJogos" maxlength="2">
      </div>
    </div>

    <div id="ped2_1">
      <select class="form-control" name="adicional" id="adicional" style="color: black">
        <option value="Sim">Sim</option>
        <option value="Não">Não</option>
      </select>
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
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Toalhas:</label>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cor</label>
                                    <select class="form-control" name="lista" id="pedCorToalha">
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="textbox">
                                        <input style="margin-top:15px;" type="number" placeholder="Quantidade" name="" value="" id="pedQtToalha" maxlength="2">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <input type="checkbox" name="negarToalhas" value="negarToalhas" id="negarToalhas" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label style="margin-top: 5px;">Não quero / não preciso de toalhas</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="ped4">
      <div class="textbox">
        <label for="" style="padding-bottom: 20px">Entrega</label>
        <div class="row">
          <div class="col-md-6">
            <label for="">Data:</label>
            <input type="date" placeholder="Entrega" name="" value="" id="pedDataEntrega">
          </div>
          <div class="col-md-6">
            <label for="">Horário:</label>
            <input type="time" placeholder="Horário" name="" value="" id="pedHoraEntrega">
          </div>
        </div>

      </div>
      <div class="textbox">
        <label for="" style="padding-bottom: 20px">Retirada</label>
        <div class="row">
          <div class="col-md-6">
            <label for="">Data:</label>
            <input type="date" placeholder="Retirada" name="" value="" id="pedDataRetirada">
          </div>
          <div class="col-md-6">
            <label for="">Horário:</label>
            <input type="time" placeholder="Horário" name="" value="" id="pedHoraRetirada">
          </div>
        </div>
      </div>
    </div>
    
    <div id="ped5">
      <div class="textbox">
        <i class="fa fa-calculator"></i>
        <input type="text" placeholder="R$ " name="" value="" id="pedValor" maxlength="2" disabled>
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
  
    $('.pedText').on('change keyup', function() {
        // Remove invalid characters
        var sanitized = $(this).val().replace(/[^A-Za-z ^~-´`.ÂâÊêÎîÔôÛûÁáÉéÍíÓóÚúÀàÈèÌìÒòÙùÃãÕõÄäËëÏïÖöÜü]/g, '');
        // Update value
        $(this).val(sanitized);
    });

</script>

</html>