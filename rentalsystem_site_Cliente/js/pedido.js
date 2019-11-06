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
            else if ($("#pedMesas").val() === '') {
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

        case 3:
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
            break;

    }
}

function dividePedido() {
    switch (indexPedido) {

        case 1:
            document.getElementById('descPedido').textContent = 'AVISO: O endereço descrito deverá ser do local de entrega e retirada do pedido.';
            $("#ped1").prop("hidden", false);
            $("#ped2").prop("hidden", true);
            $("#ped3").prop("hidden", true);
            $("#ped4").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
            break;

        case 2:
            document.getElementById('descPedido').textContent = 'AVISO: Os jogos são formados por 4 cadeiras e 1 mesa, na qual o valor da mesa é de R$5,00 e a cadeira R$2,00, dando um total por jogo de R$13,00. Você tera a opção de alugar cadeiras e mesas adicionais nos campos "Mesas" e "Cadeiras" caso necessario. TODO VALOR PODERÁ SER NEGOCIADO COM OS PROPRIETÁRIOS.';
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", false);
            $("#ped3").prop("hidden", true);
            $("#ped4").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
            break;

        case 3:
            document.getElementById('descPedido').textContent = 'AVISO: Você poderá alugar toalhas para decoração das mesas, TODO VALOR PODERÁ SER NEGOCIADO COM OS PROPRIETÁRIOS.';
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", true);
            $("#ped3").prop("hidden", false);
            $("#ped4").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
            break;

        case 4:
            document.getElementById('descPedido').textContent = 'AVISO: Você poderá realizar o pedido com no mínimo 01 dia de antecedência.';
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", true);
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
            alert("Certo: "+ form_data);
           // location.reload();
        },
        error: function(data){
            alert("Erro: "+data);
        }
    });
}