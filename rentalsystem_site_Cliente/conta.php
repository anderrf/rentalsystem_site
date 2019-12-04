<?php
    session_start();
    $_SESSION['erro'] = null;
    $varLogin = $_SESSION['varLogin'];
    $codigo = $_SESSION['codigo'];

    if($varLogin != true){
        header('Location: ../../rentalsystem_site_cliente/cadastro.php');
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
    <style>
        .row{
            margin-top: 5px;
        }
    </style>
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
                <li><a href="../../php/conta/logout.php" id="btnDeslogar"><i class="fa fa-power-off">  Sair</i></a></li>
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
                        <div class="col-md-6">
                            
                        </div>
                        <div class="col-md-6" style="text-align: rigth">
                            <span class="glyphicon glyphicon-stop" style="color: #eee"></span>
                            Novo
                            <span class="glyphicon glyphicon-stop" style="color: #ffff5e"></span>
                            Agendado
                            <span class="glyphicon glyphicon-stop" style="color: #99ff66"></span>
                            Realizado
                            <span class="glyphicon glyphicon-stop" style="color: #F08080"></span>
                            Recusado
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="tabelaPedidos" style="width: 100%"></table>
                        </div>
                    </div>
                </div>

                <div id="divDados">
                
                    <h2>Dados</h2>
                    <hr>

                    <div class="row">
                        <div class="col-md-9">
                            <label for="">Nome:</label>
                            <input class="form-control" type="text" id="moNome" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="">Cadastrado em:</label>
                            <input class="form-control" type="text" id="moDataCadastro" readonly>
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
                            <select class="form-control" type="text" id="moUF" readonly disabled>
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

        <!-- Modal de consultar pedido -->
        <div id="modalPedido" class="modal fade" role="dialog" value="">
            <div class="modal-dialog">
        <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title" id="hPedido">Pedido:</h3>
                    </div>
                    <div class="modal-body">
                        <div id="moInner">
                            
                            <div class='row'>
                                <div class='col-md-9'>
                                    <label for=''>Endereço:</label>
                                    <input class='form-control endereco' type='text' id='endereco' readonly>
                                </div>
                                <div class='col-md-3'>
                                    <label for=''>Número:</label>
                                    <input class='form-control' type='number' id='numero' readonly>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-md-5'>
                                    <label for=''>Bairro:</label>
                                    <input class='form-control' type='text' id='bairro' readonly>
                                </div>
                                <div class='col-md-5'>
                                    <label for=''>Cidade:</label>
                                    <input class='form-control' type='text' id='cidade' readonly>
                                </div>
                                <div class='col-md-2'>
                                    <label for=''>UF:</label>
                                    <input class='form-control' type='text' id='UF' readonly>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-md-12'>
                                    <label for=''>Referência:</label>
                                    <input class='form-control' type='text' id='referencia' readonly>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h3>Entrega:</h3>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label for=''>Data:</label>
                                            <input class='form-control' type='date' id='dataEntrega' readonly>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for=''>Horário:</label>
                                            <input class='form-control' type='time' id='horaEntrega' readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h3>Retirada:</h3>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label for=''>Data:</label>
                                            <input class='form-control' type='date' id='dataRetirada' readonly>
                                        </div>
                                        <div class='col-md-6'>
                                            <label for=''>Horário:</label>
                                            <input class='form-control' type='time' id='horaRetirada' readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-md-12'>
                                    <h3>Produtos:</h3>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <label>Mesas:</label>
                                        </div>
                                        <div class='col-md-4'></div>
                                        <div class='col-md-4'>
                                            <input class='form-control' type='number' id='mesas' readonly>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <label>Cadeiras:</label>
                                        </div>
                                        <div class='col-md-4'></div>
                                        <div class='col-md-4'>
                                            <input class='form-control' type='number' id='cadeiras' readonly>
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-4'>
                                            <label>Toalhas:</label>
                                        </div>
                                        <div class='col-md-4'>
                                            <input class='form-control' type='text' id='corToalha' readonly>
                                        </div>
                                        <div class='col-md-4'>
                                            <input class='form-control' type='number' id='toalhas' readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class='row'>
                                <div class='col-md-6'>
                                    <label for=''>Feito em:</label>
                                    <input class='form-control' type='date' id='dataPedido' readonly>
                                </div>
                                <div class='col-md-6'>
                                    <label for=''>Valor:</label>
                                    <input class='form-control' type='text' id='valor' readonly>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer" id="moFooter">
                        
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
                listarPedidosConta();
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

    function listarPedidosConta(){
        var codigo = $("#suaConta").data('id');
        $.ajax({
            type: "post",
            url: "../../../php/pedido/listarPedidoConta.php",
            data: "codigo="+codigo,
            dataType: "json",
            success: function(data){
                var regPedido = "<tr><th>Endereço:</th><th>Feito em:</th><th>Entrega:</th><th>Valor:</th></tr>";
                $.each(data.pedido, function (i, dados) {
                    if(dados.status == 1){
                        regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #eee' data-toggle='modal' data-target='#modalPedido'><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                    }
                    else if(dados.status == 2){
                        regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #ffff5e' data-toggle='modal' data-target='#modalPedido'><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                    }
                    else if(dados.status == 3){
                        regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #99ff66' data-toggle='modal' data-target='#modalPedido'><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                    }
                    else if(dados.status == 4){
                        regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #F08080' data-toggle='modal' data-target='#modalPedido'><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                    }
                    
                });
                $("#tabelaPedidos").html(regPedido);
            },
            error: function(data){
                alert(data);
            }
        });
    }

$(document).on("click", ".itemPedido", function(){
    var codigo = $(this).data('id');
    var status = $(this).attr('value');
        $.ajax({
        type: "post",
        url: "../../../php/pedido/mostrarPedidoCompleto.php",
        data: "codigo="+codigo,
        dataType: "json",
        success: function(data){
            $(".endereco").val(data.pedido.endereco);
            $("#numero").val(data.pedido.numero);
            $("#bairro").val(data.pedido.bairro);
            $("#cidade").val(data.pedido.cidade);
            $("#UF").val(data.pedido.UF);
            $("#referencia").val(data.pedido.referencia);
            //Entrega
            var dataEntrega = (data.pedido.dataEntrega).toString();
            var dateEntrega = new Date(dataEntrega);
            if(dateEntrega.getDate() < 10){
                var datEntrega = dateEntrega.getFullYear() + "-" + (dateEntrega.getMonth() + 1) + "-0" + dateEntrega.getDate();
            }
            else{
                var datEntrega = dateEntrega.getFullYear() + "-" + (dateEntrega.getMonth() + 1) + "-" + dateEntrega.getDate();
            }
            $("#dataEntrega").val(datEntrega);
            if(dateEntrega.getHours() < 10){
                if(dateEntrega.getMinutes() < 10){
                    var horaEntrega = "0"+dateEntrega.getHours() + ":0" + dateEntrega.getMinutes();
                }
                else{
                    var horaEntrega = "0"+dateEntrega.getHours() + ":" + dateEntrega.getMinutes();
                }
            }
            else{
                if(dateEntrega.getMinutes() < 10){
                    var horaEntrega = dateEntrega.getHours() + ":0" + dateEntrega.getMinutes();
                }
                else{
                    var horaEntrega = dateEntrega.getHours() + ":" + dateEntrega.getMinutes();
                }
            }
            $("#horaEntrega").val(horaEntrega);
            //Retirada
            var dataRetirada = (data.pedido.dataRetirada).toString();
            var dateRetirada = new Date(dataRetirada);
            if(dateRetirada.getDate() < 10){
                var datRetirada = dateRetirada.getFullYear() + "-" + (dateRetirada.getMonth() + 1) + "-0" + dateRetirada.getDate();
            }
            else{
                var datRetirada = dateRetirada.getFullYear() + "-" + (dateRetirada.getMonth() + 1) + "-" + dateRetirada.getDate();
            }
            $("#dataRetirada").val(datRetirada);
            if(dateRetirada.getHours() < 10){
                if(dateRetirada.getMinutes() < 10){
                    var horaRetirada = "0"+dateRetirada.getHours() + ":0" + dateRetirada.getMinutes();
                }
                else{
                    var horaRetirada = "0"+dateRetirada.getHours() + ":" + dateRetirada.getMinutes();
                }
            }
            else{
                if(dateRetirada.getMinutes() < 10){
                    var horaRetirada = dateRetirada.getHours() + ":0" + dateRetirada.getMinutes();
                }
                else{
                    var horaRetirada = dateRetirada.getHours() + ":" + dateRetirada.getMinutes();
                }
            }
            $("#horaRetirada").val(horaRetirada);
            //Produtos
            $("#mesas").val(data.pedido.qt_mesas);
            $("#cadeiras").val(data.pedido.qt_cadeiras);
            if(((data.pedido.corToalha) != null) && ((data.pedido.corToalha) != '')){
                $("#corToalha").val(data.pedido.corToalha);
            }
            else{
                $("#corToalha").val("Nenhuma");
            }
            if(((data.pedido.qt_toalhas) != null) && ((data.pedido.qt_toalhas) != '')){
                $("#toalhas").val(data.pedido.qt_toalhas);
            }
            else{
                $("#toalhas").val(0);
            }
            //pedido e valor
            $("#dataPedido").val(data.pedido.dataPedido);
            $("#valor").val(data.pedido.valor);
            if(status == 4){
                var ftMR = "<div class='row' style='text-align: left'><div class='col-md-6'><label>Motivo da recusa: </label></div><div class='col-md-6'><label id='lblMotivoRecusa'></label></div></div>";
                $("#moFooter").html(ftMR);
                if(((data.pedido.motivoRecusa) != null) && ((data.pedido.motivoRecusa) != '')){
                    document.getElementById('lblMotivoRecusa').textContent = (data.pedido.motivoRecusa);
                }
            }
            else{
                var ftMR = "";
                $("#moFooter").html(ftMR);
            }
        },
        error: function(data){
            alert(data);
        }
    });
});

        function desabilita(){
        $("#moEndereco").prop("readonly", true);
        $("#moNumero").prop("readonly", true);
        $("#moBairro").prop("readonly", true);
        $("#moCidade").prop("readonly", true);
        $("#moUF").prop("disabled", true);
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
        $("#moUF").prop("disabled", false);
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
        carregaPagConta();
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
