function carregaPagConta(){
    var codigo = $("#suaConta").data('id');
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/cliente/mostrarClienteBasico.php",
        data: "codCliente="+codigo,
        dataType: "json",
        success: function(data){
            document.getElementById('nome').textContent = data.cliente.nome;
            document.getElementById('telefone').textContent += ("\n" + data.cliente.telefone);
            document.getElementById('endereco').textContent += ("\n" + data.cliente.endereco);
        },
        error: function(data){
            alert(data);
        }
    });
}

$(document).on("click", "#btnDeslogar", function(){
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/conta/logout.php",
        dataType: "json",
        success: function(data){
        },
        error: function(data){
            
        }
    });
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
    $("#btnEditarConta").prop("hidden", false);
    $("#btnSalvarEditar").prop("hidden", true);
    $("#btnCancelar").prop("hidden", true);
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
    $("#btnEditarConta").prop("hidden", true);
    $("#btnSalvarEditar").prop("hidden", false);
    $("#btnCancelar").prop("hidden", false);
}

$(document).on("click", "#btnDados", function(){
    desabilita();
});