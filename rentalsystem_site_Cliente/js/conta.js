function carregaPagConta(){
    var codigo = $("#suaConta").data('id');
    $.ajax({
        type: "post",
        url: "../../../php/cliente/mostrarClienteCompleto.php",
        data: "codCliente="+codigo,
        dataType: "json",
        success: function(data){
            document.getElementById('nome').textContent = data.cliente.nome;
            document.getElementById('telefone').textContent = "Telefone : "+("\n" + data.cliente.telefone);
            document.getElementById('endereco').textContent = "Endereço: "+("\n" + data.cliente.endereco + ", " + data.cliente.numero + ", " + data.cliente.bairro + ", " + data.cliente.cidade + ", " + data.cliente.UF);
            //Dados
            $("#moNome").val(data.cliente.nome);
            var dataCadastro = new Date(data.cliente.dataCadastro);
            $("#moDataCadastro").val((dataCadastro.getDate()+1)+"/"+(dataCadastro.getMonth()+1)+"/"+dataCadastro.getFullYear());
            $("#moEndereco").val(data.cliente.endereco);
            $("#moNumero").val(data.cliente.numero);
            $("#moBairro").val(data.cliente.bairro);
            $("#moCidade").val(data.cliente.cidade);
            $("#moUF").val(data.cliente.UF);
            $("#moReferencia").val(data.cliente.referencia);
            $("#moTelefone").val(data.cliente.telefone);
            $("#moCelular").val(data.cliente.celular);
            $("#moEmail").val(data.cliente.email);
            $("#moCPF").val(data.cliente.CPF);
            $("#moRG").val(data.cliente.RG);
            if((data.cliente.foto !== '') && (data.cliente.foto !== null)){
                $("#fotoCliente").attr("src", "https://rentalsystempm.000webhostapp.com/" + data.cliente.foto);
            }
            else{
                $("#fotoCliente").attr("src", "img/pessoa.png");
            }
            $("#foto").val('');
        },
        error: function(data){
            alert(data);
        }
    });
}

function mostrarDados(){
    var codCliente = $("#suaConta").data('id');
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/cliente/mostrarClienteCompleto.php",
        data: "codCliente="+codCliente,
        dataType: "json",
        success: function(data){
            
        },
        error: function(data){
            alert('Error:', data);
        }
    });
}

$(document).on("click", "#btnDeslogar", function(){
    $.ajax({
        type: "post",
        url: "../../../php/conta/logout.php",
        dataType: "json",
        success: function(data){
        },
        error: function(data){
            
        }
    });
});

