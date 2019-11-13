var indexPedido;

/*Divisão de pedido*/

$(document).on("click", "#cadPedidoProx", function () {
    verificaCadPedido();
});

function verificaCadPedido() {
    switch (indexPedido) {

        case 1:
            if ($("#pedEndereco").val() === '') {
                alert("Preencha todos os campos.");
                $("#pedEndereco").prop("focus", true);
            }
            else if ($("#pedNumero").val() === '') {
                alert("Preencha todos os campos.");
                $("#pedNumero").prop("focus", true);
            }
            else if ($("#pedBairro").val() === '') {
                alert("Preencha todos os campos.");
                $("#pedBairro").prop("focus", true);
            }
            else if ($("#pedCidade").val() === '') {
                alert("Preencha todos os campos.");
                $("#pedCidade").prop("focus", true);
            }
            else if ($("#pedUF").val() === '') {
                alert("Preencha todos os campos.");
                $("#pedUF").prop("focus", true);
            }
            else if ($("#pedReferencia").val() === '') {
                alert("Preencha todos os campos.");
                $("#pedReferencia").prop("focus", true);
            }
            else {
                indexPedido++;
                dividePedido(indexPedido);
            }
            break;

        case 2:
            if ($("#pedJogos").val() === '') {
                alert("Preencha todos os campos.");
                $("#pedJogos").prop("focus", true);
            }
            else {
                indexPedido++;
                dividePedido(indexPedido);
            }
            break;


            case 3:
                var btnAdd = document.getElementById('adicional').value;
                if(btnAdd == "sim"){
                    indexPedido++;
                    dividePedido(indexPedido);
                }
                else if(btnAdd == "nao") {
                    indexPedido = indexPedido + 2;
                    dividePedido(indexPedido);
                }
                else{
                    alert("Informe sua escolha.");
                }
                break;


            case 4:
                if ($("#pedMesas").val() === '') {
                    alert("Preencha todos os campos.");
                    $("#pedMesas").prop("focus", true);
                }
                else if ($("#pedCadeiras").val() === '') {
                    alert("Preencha todos os campos.");
                    $("#pedCadeiras").prop("focus", true);
                }
                else {
                    indexPedido++;
                    dividePedido(indexPedido);
                }
                break;

        case 5:
            if(document.getElementById('negarToalhas').checked){
                if ($("#pedCorToalha").val() === '') {
                    alert("Preencha todos os campos.");
                    $("#pedCorToalha").prop("focus", true);
                }
                else if ($("#pedQtToalha").val() === '') {
                    alert("Preencha todos os campos.");
                    $("#pedQtToalha").prop("focus", true);
                }
                else {
                    indexPedido++;
                    dividePedido(indexPedido);
                }
            }
            else{
                indexPedido++;
                dividePedido(indexPedido);
            }
        break;

    }
}

function dividePedido() {
    switch (indexPedido) {

        case 1:
            $("#ped1").prop("hidden", false);
            $("#ped2").prop("hidden", true);
            $("#ped2_1").prop("hidden", true);
            $("#ped2_2").prop("hidden", true);
            $("#ped3").prop("hidden", true);
            $("#ped4").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
            break;

        case 2:
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", false);
            $("#ped2_1").prop("hidden", true);
            $("#ped2_2").prop("hidden", true);
            $("#ped3").prop("hidden", true);
            $("#ped4").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
            break;

        case 3:
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", true);
            $("#ped2_1").prop("hidden", false);
            $("#ped2_2").prop("hidden", true);
            $("#ped3").prop("hidden", true);
            $("#ped4").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
            break;

        case 4:
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", true);
            $("#ped2_1").prop("hidden", true);
            $("#ped2_2").prop("hidden", false);
            $("#ped3").prop("hidden", true);
            $("#ped4").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
        break;

        case 5:
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", true);
            $("#ped2_1").prop("hidden", true);
            $("#ped2_2").prop("hidden", true);
            $("#ped3").prop("hidden", false);
            $("#ped4").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
        break;

        case 6:
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", true);
            $("#ped2_1").prop("hidden", true);
            $("#ped2_2").prop("hidden", true);
            $("#ped3").prop("hidden", true);
            $("#ped4").prop("hidden", false);
            $("#cadPedidoProx").prop("hidden", true);
            $("#btnEnviarPedido").prop("hidden", false);
        break;

    }
}

function listaCorToalha(){
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/estoque/listarCorToalha.php",
        dataType: "json",
        success: function(data){
            var itemProduto = "";
            $.each(data.produto, function (i, dados) {
                itemProduto +=
                "<option value='"+dados.descricao+"'>"+dados.descricao+"</option>";
            });
            $("#pedCorToalha").html(itemProduto);
        },
        error: function(data){

        }
    });
}

$(document).on("click", "#btnEnviarPedido", function(){
    if($("#pedDataEntrega").val() === ''){
        alert("Preencha todos os campos.");
        $("#pedDataEntrega").prop("focus", true);
    }
    else if($("#pedHoraEntrega").val() === ''){
        alert("Preencha todos os campos.");
        $("#pedHoraEntrega").prop("focus", true);
    }
    else if($("#pedDataRetirada").val() === ''){
        alert("Preencha todos os campos.");
        $("#pedDataRetirada").prop("focus", true);
    }
    else if($("#pedHoraRetirada").val() === ''){
        alert("Preencha todos os campos.");
        $("#pedHoraRetirada").prop("focus", true);
    }
    else{
        enviarPedido();
    }
});

function enviarPedido(){
    var form_data = new FormData();
    form_data.append("codCliente", $("#hCodigo").data('id'));
    form_data.append("endereco", $("#pedEndereco").val());
    form_data.append("numero", $("#pedNumero").val());
    form_data.append("bairro", $("#pedBairro").val());
    form_data.append("cidade", $("#pedCidade").val());
    form_data.append("UF", $("#pedUF").val());
    form_data.append("referencia", $("#pedReferencia").val());
    form_data.append("jogos", $("#pedJogos").val());
    form_data.append("mesas", $("#pedMesas").val());
    form_data.append("cadeiras", $("#pedCadeiras").val());
    form_data.append("corToalha", $("#pedCorToalha").val());
    form_data.append("qtToalha", $("#pedQtToalha").val());
    form_data.append("dataEntrega", $("#pedDataEntrega").val());
    form_data.append("horaEntrega", $("#pedHoraEntrega").val());
    form_data.append("dataRetirada", $("#pedDataRetirada").val());
    form_data.append("horaRetirada", $("#pedHoraRetirada").val());
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/pedido/cadPedido.php",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            alert("Certo: "+ data);
            location.reload();
        },
        error: function(data){
            alert("Erro: "+data);
        }
    });
}