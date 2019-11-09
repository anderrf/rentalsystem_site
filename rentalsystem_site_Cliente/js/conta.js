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

