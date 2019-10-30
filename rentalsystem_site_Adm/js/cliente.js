function listarCliente(){
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/cliente/listarClienteBasico.php",
        dataType: "json",
        success: function(data){
            var regCliente = "<tr><th>Nome:</th><th>Telefone:</th><th>Endereço:</th><th>E-mail:</th></tr>";
            $.each(data.cliente, function (i, dados) {
            regCliente += "<tr data-id='"+dados.codigo+"' data-toggle='modal' data-target='#modalCliente' onclick='setModal("+dados.codigo+")'><td class='nmCliente'>"+dados.nome+"</td><td class='telCliente'>"+dados.telefone+"</td><td class='endCliente'>"+dados.endereco+"</td><td class='emCliente'>"+dados.email+"</td></tr>";
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
                    regCliente += "<tr data-id='"+dados.codigo+"' data-toggle='modal' data-target='#modalCliente' onclick='setModal("+dados.codigo+")'><td class='nmCliente'>"+dados.nome+"</td><td class='telCliente'>"+dados.telefone+"</td><td class='endCliente'>"+dados.endereco+"</td><td class='emCliente'>"+dados.email+"</td></tr>";
                });
                $("#tbClientes").html(regCliente);
            },
            error: function(data){
                alert(data);
            }
        });
    }
});

function setModal(codCliente){
    document.getElementById('hCliente').textContent = "Cliente:";
    var contCliente = "";
    contCliente += "<div class='row'><div class='col-md-12'><label for=''>Nome:</label><input readonly class='form-control' type='text' id='nome'></div></div><div class='row'><div class='col-md-9'><label for=''>Endereço:</label><input readonly class='form-control' type='text' id='endereco'></div><div class='col-md-3'><label for=''>Nº:</label><input readonly class='form-control' type='number' id='numero'></div></div><div class='row'><div class='col-md-5'><label for=''>Bairro:</label><input readonly class='form-control' type='text' id='bairro'></div><div class='col-md-5'><label for=''>Cidade:</label><input readonly class='form-control' type='text' id='cidade'></div><div class='col-md-2'><label for=''>UF:</label><input readonly class='form-control' type='text' id='UF'></div></div><div class='row'><div class='col-md-12'><label for=''>Referência:</label><input readonly class='form-control' type='text' id='referencia'></div></div><div class='row'><div class='col-md-6'><label for=''>Telefone:</label><input readonly class='form-control' type='text' id='telefone'></div><div class='col-md-6'><label for=''>Celular:</label><input readonly class='form-control' type='text' id='celular'></div></div><div class='row'><div class='col-md-12'><label for=''>E-mail:</label><input readonly class='form-control' type='text' id='email'></div></div><div class='row'><div class='col-md-6'><label for=''>CPF:</label><input readonly class='form-control' type='text' id='CPF'></div><div class='col-md-6'><label for=''>RG:</label><input readonly class='form-control' type='text' id='RG'></div></div>";
    $("#moInner").html(contCliente);
    var ftCliente = "";
    ftCliente += "<button class='btn btn-danger' id='btnDeletar' onclick='deletarCliente("+codCliente+")'>Deletar</button>"
    $("#moFooter").html(ftCliente);
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/cliente/mostrarClienteCompleto.php",
        data: "codCliente=" + codCliente,
        dataType: "json",
        success: function (data) {
          document.getElementById('nome').textContent = (data.cliente.nome);
          $("#endereco").val(data.cliente.endereco);
          $("#numero").val(data.cliente.numero);
          $("#bairro").val(data.cliente.bairro);
          $("#cidade").val(data.cliente.cidade);
          $("#UF").val(data.cliente.UF);
          $("#referencia").val(data.cliente.referencia);
          $("#telefone").val(data.cliente.telefone);
          $("#celular").val(data.cliente.celular);
          $("#email").val(data.cliente.email);
          $("#RG").val(data.cliente.RG);
          $("#CPF").val(data.cliente.CPF);
        },
        error: function (data) {
    
        }
      });
}

function deletarCliente(codCliente){

}