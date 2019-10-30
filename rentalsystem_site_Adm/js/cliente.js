function listarCliente(){
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/cliente/listarClienteBasico.php",
        dataType: "json",
        success: function(data){
            var regCliente = "<tr><th>Nome:</th><th>Telefone:</th><th>Endereço:</th><th>E-mail:</th></tr>";
            $.each(data.cliente, function (i, dados) {
            regCliente += "<tr data-id='"+dados.codigo+"'><td class='nmCliente'>"+dados.nome+"</td><td class='telCliente'>"+dados.telefone+"</td><td class='endCliente'>"+dados.endereco+"</td><td class='emCliente'>"+dados.email+"</td></tr>";
            });
            $("#tbClientes").html(regCliente);
        },
        error: function(data){
            alert(data);
        }
    });
}

$(document).on("click", "#btnPesqCliente", function(){
    var pesquisa = $("#pesqCliente").val();
    if(pesquisa.length < 3){
        alert("Conteúdo digitado é insuficiente para a pesquisa.");
    }
    else{
        $.ajax({
            type: "post",
            url: "https://rentalsystempm.000webhostapp.com/php/cliente/pesquisarClienteBasico.php",
            data: "pesquisa="+pesquisa,
            dataType: "json",
            success: function(data){
                var regCliente = "<tr><th>Nome:</th><th>Telefone:</th><th>Endereço:</th><th>E-mail:</th></tr>";
                $.each(data.cliente, function (i, dados) {
                    regCliente += "<tr><td class='nmCliente'>"+dados.nome+"</td><td class='telCliente'>"+dados.telefone+"</td><td class='endCliente'>"+dados.endereco+"</td><td class='emCliente'>"+dados.email+"</td></tr>";
                });
                $("#tbClientes").html(regCliente);
            },
            error: function(data){
                alert(data);
            }
        });
    }
});