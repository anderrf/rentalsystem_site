<!DOCTYPE html>
<html lang="pt" dir="ltr">

<head>
  <meta charset="utf-8">

  <link rel="stylesheet" href="css/styleVenda.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>RentalSystem - Login</title>
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
  <div class="login-box">
    <h1>Login</h1>


    <div class="textbox">
      <i class="fa fa-user"></i>
      <input type="text" placeholder="Nome" name="" value="" id="inpNome">

    </div>
    <div class="textbox">
      <i class="fa fa-key"></i>
      <input type="password" placeholder="Senha" name="" value="" id="inpSenha">

    </div>
    <form>
      <input class="btnContato" type="button" name="" value="Entrar" id="btnEntrar">
    </form>
  </div>



</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/action.js"></script>
<script src="js/conta.js"></script>

</html>
