<?php
    session_start();
    $varLogin = $_SESSION['varLogin'];
?>
<!DOCTYPE html>
<html lang="pt" dir="ltr">

<head>
  <meta charset="utf-8">

  <link rel="stylesheet" href="css/styleVenda.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <script src="js\jquery-3.3.1.min.js"></script>
  <script src="js\bootstrap.min.js"></script>
  <script src="js\action.js"></script>
  <script src="js\cliente.js"></script>
  <script>

    $(document).ready(function () {
      indexCadCliente = 1;
      divideCadCliente();
    });

  </script>

  <title>RentalSystem - Cadastro</title>
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

  <div class="pedido-box">
    <h2>Cadastre-se</h2>

    <div id="cadcli1">
      <div class="textbox">
        <i class="fa fa-user"></i>
        <input type="text" placeholder="Nome" name="nome" id="cadNome" maxlength="50">
      </div>
      <div class="textbox">
        <i class="fa fa-key"></i>
        <input type="password" placeholder="Senha" name="senha" id="cadSenha" maxlength="20">
      </div>
      <div class="textbox">
        <i class="fa fa-key"></i>
        <input type="password" placeholder="Confirmar Senha" name="senha" id="confSenha" maxlength="20">
      </div>
    </div>

    <div id="cadcli2">
      <div class="row">
        <div class="col-md-9">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="text" placeholder="Endereço" name="endereco" id="cadEndereco" maxlength="50">
          </div>
        </div>
        <div class="col-md-3">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="number" placeholder="Nº" name="numero" id="cadNumero" maxlength="4">
          </div>
        </div>
      </div>
      <div class="textbox">
        <i class="fa fa-home"></i>
        <input type="text" placeholder="Bairro" name="bairro" id="cadBairro" maxlength="50">
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="text" placeholder="Cidade" name="cidade" id="cadCidade" maxlength="50">
          </div>
        </div>
        <div class="col-md-3">
          <div class="textbox">
            <i class="fa fa-home"></i>
            <input type="text" placeholder="UF" name="UF" id="cadUF" maxlength="2">
          </div>
        </div>
      </div>

      <div class="textbox">
        <i class="fa fa-map-signs"></i>
        <input type="text" placeholder="Referência" name="referencia" id="cadReferencia" maxlength="50">
      </div>
    </div>

    <div id="cadcli3">
      <div class="textbox">
        <i class="fa fa-phone"></i>
        <input type="text" placeholder="Telefone" name="telefone" id="cadTelefone" maxlength="15">
      </div>
      <div class="textbox">
        <i class="fa fa-phone"></i>
        <input type="text" placeholder="Celular" name="celular" id="cadCelular" maxlength="15">
      </div>
      <div class="textbox">
        <i class="fa fa-user"></i>
        <input type="text" placeholder="E-mail" name="email" id="cadEmail" maxlength="200">
      </div>
    </div>

    <div id="cadcli4">
      <div class="textbox">
        <i class="fa fa-id-card"></i>
        <input type="text" placeholder="CPF" name="CPF" id="cadCPF" maxlength="14">
      </div>
      <div class="textbox">
        <i class="fa fa-id-card"></i>
        <input type="text" placeholder="RG" name="RG" id="cadRG" maxlength="12">
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
          <input class="btnContato" type="button" name="" value="Avançar" id="Next">
        </form>
        <form>
          <input class="btnContato" type="button" name="" value="Cadastrar" id="btnCadastrarCliente">
        </form>
      </div>
    </div>





  </div>
</body>

</html>