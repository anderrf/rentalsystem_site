function listarPedido(){
    $.ajax({
        type: "post",
        url: "../../../php/pedido/listarPedidoTd.php",
        dataType: "json",
        success: function(data){
            var regPedido = "<tr><th>Cliente:</th><th>Endereço:</th><th>Feito em:</th><th>Entrega:</th><th>Valor:</th></tr>";
            $.each(data.pedido, function (i, dados) {
                if(dados.status == 1){
                    regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #eee' data-toggle='modal' data-target='#modalPedido'><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                }
                else if(dados.status == 2){
                    regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #ffff5e' data-toggle='modal' data-target='#modalPedido'><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                }
                else if(dados.status == 3){
                    regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #99ff66' data-toggle='modal' data-target='#modalPedido'><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                }
                else if(dados.status == 4){
                    regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #F08080' data-toggle='modal' data-target='#modalPedido'><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                }
            });
            $("#tbPedidos").html(regPedido);
        },
        error: function(data){
            alert(data);
        }
    });
}

$(document).on("click", "#btnPesqPedido", function(){
    var pesquisa = $("#pesqPedido").val();
    if(pesquisa.length < 3){
        alert("Conteúdo digitado é insuficiente para a pesquisa.");
    }
    else{
        $.ajax({
            type: "post",
            url: "../../../php/pedido/pesquisarPedidoAdm.php",
            data: "pesquisa="+pesquisa,
            dataType: "json",
            success: function(data){
                var regPedido = "<tr><th>Cliente:</th><th>Endereço:</th><th>Feito em:</th><th>Entrega:</th><th>Valor:</th></tr>";
                $.each(data.pedido, function (i, dados) {
                    if(dados.status == 1){
                        regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #eee' data-toggle='modal' data-target='#modalPedido'><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                    }
                    else if(dados.status == 2){
                        regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #ffff5e' data-toggle='modal' data-target='#modalPedido'><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                    }
                    else if(dados.status == 3){
                        regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #99ff66' data-toggle='modal' data-target='#modalPedido'><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                    }
                    else if(dados.status == 4){
                        regPedido += "<tr class='itemPedido' data-id='"+dados.codigo+"' value='"+dados.status+"' style='background-color: #F08080' data-toggle='modal' data-target='#modalPedido'><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+", "+dados.numero+", "+dados.bairro+", "+dados.cidade+", "+dados.UF+"</td><td class='dtPedido'>"+dados.dataPedido+"</td><td class='dtEntrega'>"+dados.dataEntrega+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                    }
                });
                $("#tbPedidos").html(regPedido);
            },
            error: function(data){
                alert(data);
            }
        });
    }
});

$(document).on("click", ".itemPedido", function(){
    var codigo = $(this).data('id');
    var status = $(this).attr("value");
    var contPedido = "";
    document.getElementById('hPedido').textContent = "Pedido:";
    $("#hPedido").attr("value", codigo);
    contPedido += "<div class='row'><div class='col-md-12'><label for=''>Nome do cliente:</label><input class='form-control' type='text' id='nome' readonly></div></div><div class='row'><div class='col-md-9'><label for=''>Endereço:</label><input class='form-control' type='text' id='endereco' readonly></div><div class='col-md-3'><label for=''>Número:</label><input class='form-control' type='number' id='numero' readonly></div></div><div class='row'><div class='col-md-5'><label for=''>Bairro:</label><input class='form-control' type='text' id='bairro' readonly></div><div class='col-md-5'><label for=''>Cidade:</label><input class='form-control' type='text' id='cidade' readonly></div><div class='col-md-2'><label for=''>UF:</label><input class='form-control' type='text' id='UF' readonly></div></div><div class='row'><div class='col-md-12'><label for=''>Referência:</label><input class='form-control' type='text' id='referencia' readonly></div></div><div class='row'><div class='col-md-12'><h3>Entrega:</h3><div class='row'><div class='col-md-6'><label for=''>Data:</label><input class='form-control' type='date' id='dataEntrega' readonly></div><div class='col-md-6'><label for=''>Horário:</label><input class='form-control' type='time' id='horaEntrega' readonly></div></div></div></div><div class='row'><div class='col-md-12'><h3>Retirada:</h3><div class='row'><div class='col-md-6'><label for=''>Data:</label><input class='form-control' type='date' id='dataRetirada' readonly></div><div class='col-md-6'><label for=''>Horário:</label><input class='form-control' type='time' id='horaRetirada' readonly></div></div></div></div><div class='row'><div class='col-md-12'><h3>Produtos:</h3><div class='row'><div class='col-md-4'><label>Mesas:</label></div><div class='col-md-4'></div><div class='col-md-4'><input class='form-control' type='number' id='mesas' readonly></div></div><div class='row'><div class='col-md-4'><label>Cadeiras:</label></div><div class='col-md-4'></div><div class='col-md-4'><input class='form-control' type='number' id='cadeiras' readonly></div></div><div class='row'><div class='col-md-4'><label>Toalhas:</label></div><div class='col-md-4'><input class='form-control' type='text' id='corToalha' readonly></div><div class='col-md-4'><input class='form-control' type='number' id='toalhas' readonly></div></div></div></div><div class='row'><div class='col-md-6'><label for=''>Feito em:</label><input class='form-control' type='date' id='dataPedido' readonly></div><div class='col-md-6'><label for=''>Valor:</label><input class='form-control' type='text' id='valor' readonly></div></div>";
    $("#moInner").html(contPedido);
    var ftPedido = "";
    if(status == 1){
        ftPedido += "<button class='btn btn-success' type='button' id='btnAceitarPedido'>Aceitar</button><button class='btn btn-danger' type='button' id='btnRecusarPedido'>Recusar</button>";
        $("#moFooter").html(ftPedido);
    }
    else if(status == 2){
        ftPedido += "<button class='btn btn-success' type='button' id='btnConcluirPedido'>Concluir</button>";
        $("#moFooter").html(ftPedido);
    }
    else if(status == 4){
        ftPedido += "<div class='row' style='text-align: left'><div class='col-md-6'><label>Motivo da recusa: </label></div><div class='col-md-6'><label id='lblMotivoRecusa'></label></div></div>";
        $("#moFooter").html(ftPedido);
    }
    else{
        $("#moFooter").html('');
    }
    setModal(codigo, status);
});

function setModal(codigo){
    $.ajax({
        type: "post",
        url: "../../../php/pedido/mostrarPedidoCompleto.php",
        data: "codigo="+codigo,
        dataType: "json",
        success: function(data){
            $("#nome").val(data.pedido.cliente);
            $("#endereco").val(data.pedido.endereco);
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
            if(((data.pedido.corToalha) !== null) && ((data.pedido.corToalha) !== '')){
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
            if(((data.pedido.motivoRecusa) != null) && ((data.pedido.motivoRecusa) != '')){
                document.getElementById('lblMotivoRecusa').textContent = (data.pedido.motivoRecusa);
            }
        },
        error: function(data){
            alert(data);
        }
    });
}

$(document).on("click", "#btnAceitarPedido", function(){
    var codigo = $("#hPedido").attr("value");
    $.ajax({
        type: "post",
        url: "../../../php/pedido/agendarPedido.php",
        data: "codigo="+codigo,
        success: function(data){
            alert(data);
            location.reload();
        },
        error: function(data){
            alert(data);
        }
    })
});

$(document).on("click", "#btnConcluirPedido", function(){
    var codigo = $("#hPedido").attr("value");
    $.ajax({
        type: "post",
        url: "../../../php/pedido/concluirPedido.php",
        data: "codigo="+codigo,
        success: function(data){
            alert(data);
            location.reload();
        },
        error: function(data){
            alert(data);
        }
    })
});

$(document).on("click", "#btnRecusarPedido", function(){
    document.getElementById('hPedido').textContent = "Informe o motivo da recusa:";
    var contRecusa = "";
    contRecusa += "<div class='row'><div class='col-md-12'><select class='form-control' name='motivoRecusa' id='motivoRecusa'><option value=''></option><option value='Indisponibilidade de tempo'>Indisponibilidade de tempo</option><option value='Indisponibilidade de estoque'>Indisponibilidade de estoque</option></select></div></div>";
    $("#moInner").html(contRecusa);
    var ftRecusa = "";
    ftRecusa += "<button type='button' class='btn btn-danger' id='btnConfirmarRecusar'>Recusar</button>";
    $("#moFooter").html(ftRecusa);
});

$(document).on("click", "#btnConfirmarRecusar", function(){
    var codigo = $("#hPedido").attr("value");
    var motivoRecusa = document.getElementById('motivoRecusa').value;
    if((motivoRecusa != '') && (motivoRecusa != null) && (motivoRecusa != ' ')){
        var form_data = new FormData();
        form_data.append("codigo", codigo);
        form_data.append("motivoRecusa", motivoRecusa);
        $.ajax({
            type: "post",
            url: "../../../php/pedido/recusarPedido.php",
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
    }
    else{
        alert("Informe o motivo da recusa.");
    }
});