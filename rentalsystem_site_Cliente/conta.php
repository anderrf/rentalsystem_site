<?php
    session_start();

    $varLogin = $_SESSION['varLogin'];

    $codigo = $_SESSION['codigo'];

    if($varLogin != true){
        header('Location: https://rentalsystempm.000webhostapp.com/rentalsystem_site_cliente/cadastro.php');
        echo "Cadastre-se e entre para acessar a página de conta.";
    }
    else{
    }
?>

<!DOCTYPE html>
<html lang="br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styleVenda.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>RentalSystem - Conta</title>
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
                <li><a id="notification"><i class="fa fa-bell"></i></a></li>
                <li><a href="https://rentalsystempm.000webhostapp.com/php/conta/logout.php" id="btnDeslogar"><i class="fa fa-power-off">  Sair</i></a></li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid divContent" style="min-height: 60vh; margin-top: 10vh">

        <div class="row">
            <div class="col-md-3">
                <div class="card" style="padding-bottom: 10px;">
                    <h2 data-id="<?php echo $_SESSION['codigo'] ?>" id="suaConta">Sua conta</h2>
                    <img src="" style="max-height:200px; max-width: 90%" id="fotoCliente">
                    <h2 id="nome">Nome</h2>
                    <p class="title" id="contaCliente">Conta Cliente</p>
                    <p id="telefone">Telefone: </p>
                    <p id="endereco">Endereço: </p>
                </div>
            </div>

            <div class="col-md-8" style="background-color: white; border-radius: 5px; padding: 10px">

                <button type="button" class="btn" id="btnSelPedidos">Pedidos</button>
                <button type="button" class="btn" id="btnSelDados">Dados</button>

                <div id="divPedidos">
                    <h2>Recentes:</h2>
                    <hr>
                    <div class="row">

                    </div>
                </div>

                <div id="divDados">
                
                    <h2>Dados</h2>
                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Nome:</label>
                            <input class="form-control" type="text" id="moNome" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <label for="">Endereço:</label>
                            <input class="form-control" type="text" id="moEndereco" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="">Número:</label>
                            <input class="form-control" type="number" id="moNumero" readonly>
                        </div>
                    </div>
                        
                    <div class="row">
                        <div class="col-md-5">
                            <label for="">Bairro:</label>
                            <input class="form-control" type="text" id="moBairro" readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="">Cidade:</label>
                            <input class="form-control" type="text" id="moCidade" readonly>
                        </div>
                        <div class="col-md-2">
                            <label for="">UF:</label>
                            <input class="form-control" type="text" id="moUF" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Referência:</label>
                            <input class="form-control" type="text" id="moReferencia" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Telefone:</label>
                            <input class="form-control" type="text" id="moTelefone" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Celular:</label>
                            <input class="form-control" type="text" id="moCelular" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label for="">E-mail:</label>
                            <input class="form-control" type="text" id="moEmail" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">CPF:</label>
                            <input class="form-control" type="text" id="moCPF" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">RG:</label>
                            <input class="form-control" type="text" id="moRG" readonly>
                        </div>
                    </div>

                    <div class="row" id="rFoto">
                        <div class="col-md-12">
                            <label for="">Selecione uma foto:</label>
                            <input type="file" id="foto">
                        </div>
                    </div>

                    <hr>

                    <div id="divBtnEditar">
                        <button class="btn btn-primary" id="btnEditarConta">Editar</button>
                    </div>
                    <div id="divEditar">
                        <button class="btn btn-success" id="btnSalvarEditar">Salvar</button>
                        <button class="btn btn-danger" id="btnCancelar">Cancelar</button>
                    </div>

                </div>

            </div>
        </div>

    </div>


</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/action.js"></script>
<script src="js/conta.js"></script>
<script>

    var opt;
    opt = "Pedidos";

    $(document).ready(function(){

        carregaPagConta();
        mostraOP();

    });

    function mostraOP(){
            if(opt == "Pedidos"){
                $("#divPedidos").prop("hidden", false);
                $("#divDados").prop("hidden", true);
            }
            else if(opt == "Dados"){
                $("#divPedidos").prop("hidden", true);
                $("#divDados").prop("hidden", false);
                desabilita();
                mostrarDados();
            }
        }
    
    $(document).on("click", "#btnSelPedidos", function(){
        opt = "Pedidos";
        mostraOP();
    });

    $(document).on("click", "#btnSelDados", function(){
        opt = "Dados";
        mostraOP();
    });

        function desabilita(){
        $("#moEndereco").prop("readonly", true);
        $("#moNumero").prop("readonly", true);
        $("#moBairro").prop("readonly", true);
        $("#moCidade").prop("readonly", true);
        $("#moUF").prop("readonly", true);
        $("#moReferencia").prop("readonly", true);
        $("#moTelefone").prop("readonly", true);
        $("#moCelular").prop("readonly", true);
        $("#moEmail").prop("readonly", true);
        $("#rFoto").prop("hidden", true);
        $("#divBtnEditar").prop("hidden", false);
        $("#divEditar").prop("hidden", true);
    }

    function habilita(){
        $("#moEndereco").prop("readonly", false);
        $("#moNumero").prop("readonly", false);
        $("#moBairro").prop("readonly", false);
        $("#moCidade").prop("readonly", false);
        $("#moUF").prop("readonly", false);
        $("#moReferencia").prop("readonly", false);
        $("#moTelefone").prop("readonly", false);
        $("#moCelular").prop("readonly", false);
        $("#moEmail").prop("readonly", false);
        $("#rFoto").prop("hidden", false);
        $("#divBtnEditar").prop("hidden", true);
        $("#divEditar").prop("hidden", false);
    }

    

    $(document).on("click", "#btnDados", function(){
        desabilita();
    });

    $(document).on("click", "#btnEditarConta", function(){
        habilita();
    });

    $(document).on("click", "#btnCancelar", function(){
        desabilita();
    });

    $(document).on("click", "#btnSalvarEditar", function(){
        var form_data = new FormData();
        form_data.append("codCliente", $("#suaConta").data('id'));
        form_data.append("endereco", $("#moEndereco").val());
        form_data.append("numero", $("#moNumero").val());
        form_data.append("bairro", $("#moBairro").val());
        form_data.append("cidade", $("#moCidade").val());
        form_data.append("UF", $("#moUF").val());
        form_data.append("referencia", $("#moReferencia").val());
        form_data.append("telefone", $("#moTelefone").val());
        form_data.append("celular", $("#moCelular").val());
        form_data.append("email", $("#moEmail").val());
        if(document.getElementById('foto').value != ''){
            var prop = document.getElementById('foto').files[0];
            var nome_imagem = prop.name;
            var extensao_imagem = nome_imagem.split('.').pop().toLowerCase();

            if (jQuery.inArray(extensao_imagem, ['png', 'jpg', 'jpeg']) == -1) {
            navigator.notification.alert("Imagem inválida");
            } else {
                form_data.append("foto", prop);
            }
        }
        $.ajax({
            type: "post",
            url: "../../php/cliente/alterarCliente.php",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: function(data){
                location.reload();
            },
            error: function(data){
                alert(data);
            }
        });
    });

</script>

</html>
