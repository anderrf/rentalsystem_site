var indexCadCliente;
var indexPedido;

/*Divisão do cadastro de clientes*/

$(document).on("click", "#Next", function(){
    indexCadCliente++;
    divideCadCliente(indexCadCliente);
});

function divideCadCliente()
{
    switch(indexCadCliente)
    {
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
$(document).on("click", "#btnCadastrarCliente", function ()
{
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

/*Divisão de pedido*/

$(document).on("click", "#cadPedidoProx", function(){
    indexPedido++;
    dividePedido();
});

function dividePedido()
{
    switch(indexPedido)
    {

        case 1:
            document.getElementById('descPedido').textContent = 'AVISO: O endereço descrito deverá ser do local de entrega e retirada do pedido.';
            $("#ped1").prop("hidden", false);
            $("#ped2").prop("hidden", true);
            $("#ped3").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
        break;

        case 2:
            document.getElementById('descPedido').textContent = 'AVISO: Os jogos são formados por 4 cadeiras e 1 mesa, na qual o valor da mesa é de R$5,00 e a cadeira R$2,00, dando um total por jogo de R$13,00. Você tera a opção de alugar cadeiras e mesas adicionais nos campos "Mesas" e "Cadeiras" caso necessario. TODO VALOR PODERÁ SER NEGOCIADO COM OS PROPRIETÁRIOS.';
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", false);
            $("#ped3").prop("hidden", true);
            $("#cadPedidoProx").prop("hidden", false);
            $("#btnEnviarPedido").prop("hidden", true);
        break;

        case 3:
            document.getElementById('descPedido').textContent = 'AVISO: Você poderá alugar toalhas para decoração das mesas, TODO VALOR PODERÁ SER NEGOCIADO COM OS PROPRIETÁRIOS.';
            $("#ped1").prop("hidden", true);
            $("#ped2").prop("hidden", true);
            $("#ped3").prop("hidden", false);
            $("#cadPedidoProx").prop("hidden", true);
            $("#btnEnviarPedido").prop("hidden", false);
        break;

    }
}