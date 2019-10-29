var indexCadCliente;
/*Divisão do cadastro de clientes*/

$(document).on("click", "#Next", function () {
    verificaCadCliente();
});

function verificaCadCliente() {
    switch (indexCadCliente) {

        case 1:
            if ($("#cadNome").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadNome").prop("focus", true);
            }
            else if ($("#cadSenha").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadSenha").prop("focus", true);
            }
            else if ($("#confSenha").val() === '') {
                alert("Preencha todos os campos.");
                $("#confSenha").prop("focus", true);
            }
            else {
                if ($("#cadSenha").val() == $("#confSenha").val()) {
                    indexCadCliente++;
                    divideCadCliente(indexCadCliente);
                }
                else {
                    alert("As senhas devem ser as mesmas.");
                    $("#cadSenha").prop("focus", true);
                    $("#confSenha").prop("focus", true);
                }
            }
            break;

        case 2:
            if ($("#cadEndereco").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadEndereco").prop("focus", true);
            }
            else if ($("#cadNumero").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadNumero").prop("focus", true);
            }
            else if ($("#cadBairro").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadBairro").prop("focus", true);
            }
            else if ($("#cadCidade").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadCidade").prop("focus", true);
            }
            else if ($("#cadUF").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadUF").prop("focus", true);
            }
            else if ($("#cadReferencia").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadReferencia").prop("focus", true);
            }
            else {
                indexCadCliente++;
                divideCadCliente(indexCadCliente);
            }
            break;

        case 3:
            if ($("#cadTelefone").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadTelefone").prop("focus", true);
            }
            else if ($("#cadCelular").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadCelular").prop("focus", true);
            }
            else if ($("#cadEmail").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadEmail").prop("focus", true);
            }
            else {
                indexCadCliente++;
                divideCadCliente(indexCadCliente);
            }
            break;

    }
}

function divideCadCliente() {
    switch (indexCadCliente) {
        case 1:
            $("#cadcli1").prop("hidden", false);
            $("#cadcli2").prop("hidden", true);
            $("#cadcli3").prop("hidden", true);
            $("#cadcli4").prop("hidden", true);
            $("#Next").prop("hidden", false);
            $("#btnCadastrarCliente").prop("hidden", true);
            break;

        case 2:
            $("#cadcli1").prop("hidden", true);
            $("#cadcli2").prop("hidden", false);
            $("#cadcli3").prop("hidden", true);
            $("#cadcli4").prop("hidden", true);
            $("#Next").prop("hidden", false);
            $("#btnCadastrarCliente").prop("hidden", true);
            break;

        case 3:
            $("#cadcli1").prop("hidden", true);
            $("#cadcli2").prop("hidden", true);
            $("#cadcli3").prop("hidden", false);
            $("#cadcli4").prop("hidden", true);
            $("#Next").prop("hidden", false);
            $("#btnCadastrarCliente").prop("hidden", true);
            break;

        case 4:
            $("#cadcli1").prop("hidden", true);
            $("#cadcli2").prop("hidden", true);
            $("#cadcli3").prop("hidden", true);
            $("#cadcli4").prop("hidden", false);
            $("#Next").prop("hidden", true);
            $("#btnCadastrarCliente").prop("hidden", false);
            break;
    }
}

/*Cadastro de clientes*/
$(document).on("click", "#btnCadastrarCliente", function () {
    if ($("#cadCPF").val() === '') {
        alert("Preencha todos os campos.");
        $("#cadCPF").prop("focus", true);
    }
    else if ($("#cadRG").val() === '') {
        alert("Preencha todos os campos.");
        $("#cadRG").prop("focus", true);
    }
    else {
        enviarCadCliente();
    }
});

function enviarCadCliente(){
    var form_data = new FormData();
    form_data.append("nome", $("#cadNome").val());
    form_data.append("senha", $("#cadSenha").val());
    form_data.append("endereco", $("#cadEndereco").val());
    form_data.append("numero", $("#cadNumero").val());
    form_data.append("bairro", $("#cadBairro").val());
    form_data.append("cidade", $("#cadCidade").val());
    form_data.append("UF", $("#cadUF").val());
    form_data.append("referencia", $("#cadReferencia").val());
    form_data.append("telefone", $("#cadTelefone").val());
    form_data.append("celular", $("#cadCelular").val());
    form_data.append("email", $("#cadEmail").val());
    form_data.append("CPF", $("#cadCPF").val());
    form_data.append("RG", $("#cadRG").val());
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/cliente/cadCliente.php",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data){
            alert(data);
            location.reload();
        },
        error: function(data){
            alert(data);
        }
    });
}