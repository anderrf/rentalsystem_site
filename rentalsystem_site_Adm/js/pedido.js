function listarPedido(){
    $.ajax({
        type: "post",
        url: "../../../../php/pedido/listarPedidoTd.php",
        dataType: "json",
        success: function(data){
            var regPedido = "<tr><th>Cliente:</th><th>Endereço:</th><th>Data:</th><th>Valor:</th></tr>";
            $.each(data.cliente, function (i, dados) {
                regPedido += "<tr><td class='clPedido'>"+dados.cliente+"</td><td class='endPedido'>"+dados.endereco+"</td><td class='dtPedido'>"+dados.date+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
            });
            $("#tbPedidos").html(regPedido);
        },
        error: function(data){
            console.log('Error: ' +data);
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
            url: "",
            data: "pesquisa="+pesquisa,
            dataType: "json",
            success: function(data){
                var regPedido = "<tr><th>Cliente:</th><th>Endereço:</th><th>Data:</th><th>Valor:</th></tr>";
                $.each(data.cliente, function (i, dados) {
                    regPedido += "<tr><td class='clPedido'>"+dados.nome+"</td><td class='endPedido'>"+dados.endereco+"</td><td class='dtPedido'>"+dados.date+"</td><td class='vlPedido'>R$ "+dados.valor+"</td></tr>";
                });
                $("#tbPedidos").html(regPedido);
            },
            error: function(data){
                alert(data);
            }
        });
    }
});