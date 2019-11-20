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
            if($("#adicional").val() === ''){
                alert("Informe sua escolha.");
            }
            else{
                var adicional = $("#adicional").val();
                if(adicional == "Sim"){
                    indexPedido++;
                    dividePedido(indexPedido);
                }
                else if(adicional == "Não"){
                    indexPedido = indexPedido + 2;
                    dividePedido(indexPedido);
                }
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
            if(document.getElementById('negarToalhas').checked === true){
                indexPedido++;
                dividePedido(indexPedido);
            }
            else{
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
        break;

    }
}

function dividePedido() {
    switch (indexPedido) {

        case 1:
            document.getElementById('hCodigo').textContent = "Informe seu endereço:";
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
            document.getElementById('hCodigo').textContent = "Informe quantos jogos deseja:";
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
            document.getElementById('hCodigo').textContent = "Deseja mesas e/ou cadeiras adicionais?";
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
            document.getElementById('hCodigo').textContent = "Informe a quantidade de mesas e/ou cadeiras adicionais:";
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
            document.getElementById('hCodigo').textContent = "Informe a cor e a quantidade das toalhas:";
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
            document.getElementById('hCodigo').textContent = "Informe as datas e horários de entrega e retirada de seu pedido:";
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
    /*var data = new Date();
    var dataAtual = new Date(data.getFullYear()+"-"+(data.getMonth()+1)+"-"+data.getDate()+" "+data.getHours()+":"+data.getMinutes());*/
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
        //data de entrega
        var dataEntrega = $("#pedDataEntrega").val();
        var horaEntrega = $("#pedHoraEntrega").val();
        var dt_entrega = new Date(dataEntrega+" "+horaEntrega);
        //data atual
        var dataAtual = new Date();
        var dataMinima = new Date(dataAtual.getFullYear()+"-"+(dataAtual.getMonth()+1)+"-"+(dataAtual.getDate()+2));
        if(dt_entrega < dataMinima){
            alert("A data para este pedido não pode ser anterior a: "+dataMinima.getDate()+"/"+(dataMinima.getMonth()+1)+"/"+dataMinima.getFullYear()+". A antecedência mínima é de 24 horas.");
        }
        else{
            //data de retirada
            var dataRetirada = $("#pedDataRetirada").val();
            var horaRetirada = $("#pedHoraRetirada").val();
            var dt_retirada = new Date(dataRetirada+" "+horaRetirada);
            //comparação
            var diferencaData = ((dt_retirada - dt_entrega) / 1000);
            diferencaData /= (60 * 60);
            diferencaData = Math.abs(Math.round(diferencaData));
            if(diferencaData < 4){
                alert("A diferença mínima de horário deve ser de 04 horas");
            }
            else{
                enviarPedido();
            }
        }
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