

/*Cadastro de clientes*/
$(document).on("click", "#btnCadastrarCliente", function () {

    var form_data = new FormData();
    form_data.append("nome", $("#cadNome").val());
    form_data.append("senha", $("#cadSenha").val());
    form_data.append("endereco", $("#cadEndereco").val());
    form_data.append("bairro", $("#cadBairro").val());
    form_data.append("cidadeUF", $("#cadCidadeUF").val());
    form_data.append("referencia", $("#cadReferencia").val());
    form_data.append("telefone", $("#cadTelefone").val());
    form_data.append("celular", $("#cadCelular").val());
    form_data.append("email", $("#cadEmail").val());
    form_data.append("CPF", $("#cadCPF").val());
    form_data.append("RG", $("#cadRG").val());

    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/cliente/cadCliente.php",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            alert(data);
        },
        error: function(data){
            alert(data);
        }
    });
});