<?php
    session_start();
    $_SESSION['erro'] = null;
    $varLogin = $_SESSION['varLogin'];
?>
<!DOCTYPE html>
<html lang="br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/styleVenda.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>RentalSystem - Contato</title>
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



  <div class="contato-box">
    <h2>Entre em contato</h2>
    <div class="textbox">
      <i class="fa fa-envelope-square"></i>
      <input type="text" placeholder="Email" name="" value="" id="emailContato">

    </div>
    <div class="textbox">

       <textarea class="form-control" id="comments" name="comments" placeholder="Digite..." rows="7"></textarea>

    </div>



    <div class="row">
      <form>
        <input class="btnContato" type="button" name="" value="Enviar Mensagem" id="btnEnviarMensagem">
      </form>
      <form>
        <input class="btnContato" type="button" name="" value="Cancelar" id="btnCancelarMensagem">
      </form>

    </div>

  </div>









</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    
    $(document).on("click", "#btnCancelarMensagem", function(){
        location.reload(); 
    });
    
    $(document).on("click", "#btnEnviarMensagem", function(){
        if(($("#emailContato").val() == '') || ($("#comments").val() == '')){
            alert("Preencha ambos os campos.");
        }
        else{
            var form_data = new FormData();
            form_data.append("email", $("#emailContato").val());
            form_data.append("mensagem", $("#comments").val());
            $.ajax({
                type: "post",
                url: "../../php/conta/enviarEmail.php",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data){
                    alert(data);
                },
                error: function(data){
                    alert(data);
                }
            });
        }
    });
    
</script>

</html>
