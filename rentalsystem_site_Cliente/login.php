<?php
    session_start();
    if(($_SESSION['erro'] == null) || ($_SESSION['erro'] == '')){
        $erro = null;
    }
    else{
        $erro = $_SESSION['erro'];
    }
    $varLogin = $_SESSION['varLogin'];
?>
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

    <div class="login-box">
        <h1 id="hLogin" value="<?php
        
        if(($erro == null) || ($erro == '')){
            echo null;
        }
        else{
            echo $erro;
        }
        
        ?>">Login</h1>
        <form action="../../php/conta/efetuarLogin.php" method="POST">
            <div class="textbox">
                <i class="fa fa-user"></i>
                <input type="text" placeholder="Nome" name="nome" value="" id="inpNome" class="logText" required>
            </div>
            <div class="textbox">
                <i class="fa fa-key"></i>
                <input type="password" placeholder="Senha" name="senha" value="" id="inpSenha" required>
            </div>
            <input class="btnContato" type="submit" name="" value="Entrar" id="btnEntrar">
        </form>
    </div>



</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/action.js"></script>
<script>

    $(document).ready(function(){
        if(($("#hLogin").attr("value") != null) && ($("#hLogin").attr("value") != '')){
            alert($("#hLogin").attr("value"));
        }
    });

    $('.logText').on('change keyup', function() {
        // Remove invalid characters
        var sanitized = $(this).val().replace(/[^A-Za-z ^~-´`.ÂâÊêÎîÔôÛûÁáÉéÍíÓóÚúÀàÈèÌìÒòÙùÃãÕõÄäËëÏïÖöÜü]/g, '');
        // Update value
        $(this).val(sanitized);
    });
    
    
</script>

</html>
