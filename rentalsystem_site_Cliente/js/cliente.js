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
            else if($("#cadNome").val().length < 10){
                alert("O nome deve ter no mínimo 10 caracteres.");
                $("#cadNome").prop("focus", true);
            }
            else if ($("#cadSenha").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadSenha").prop("focus", true);
            }
            else if($("#cadSenha").val().length < 10){
                alert("A senha deve ter no mínimo 10 caracteres.");
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
            else if($("#cadEndereco").val().length < 5){
                alert("O endereço deve ter no mínimo 5 caracteres.");
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
            else if($("#cadBairro").val().length < 5){
                alert("O nome do bairro deve ter no mínimo 5 caracteres.");
                $("#cadBairro").prop("focus", true);
            }
            else if ($("#cadCidade").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadCidade").prop("focus", true);
            }
            else if($("#cadCidade").val().length < 5){
                alert("O nome da cidade deve ter no mínimo 5 caracteres.");
                $("#cadCidade").prop("focus", true);
            }
            else if (($("#cadUF").val() === '') || ($("#cadUF").val() === 'Escolha sua UF')) {
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
    else{
        var CPF = ($("#cadCPF").val()).toString();
        var numCPF = CPF.slice(0,3) + CPF.slice(4,7) + CPF.slice(8,11) + CPF.slice(12,14);
        var retornoCPF = TestaCPF(numCPF);
        if(retornoCPF === true){
            if ($("#cadRG").val() === '') {
                alert("Preencha todos os campos.");
                $("#cadRG").prop("focus", true);
            }
            else{
                var RG = $("#cadRG").val();
                var numRG = RG.slice(0,2) + RG.slice(3,6) + RG.slice(7,10) + RG.slice(11,12);
                var retornoRG = ValRG(numRG);
                if(retornoRG === true){
                    enviarCadCliente();
                }
                else{
                    alert("RG inválido.");
                }
            }
        }
        else{
            alert("CPF inválido.");
        }
    }
});

function TestaCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
  if (strCPF == "00000000000") return false;
  if (strCPF == "11111111111") return false;
  if (strCPF == "22222222222") return false;
  if (strCPF == "33333333333") return false;
  if (strCPF == "44444444444") return false;
  if (strCPF == "55555555555") return false;
  if (strCPF == "66666666666") return false;
  if (strCPF == "77777777777") return false;
  if (strCPF == "88888888888") return false;
  if (strCPF == "99999999999") return false;
     
  for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;
   
  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
    return true;
}

function ValRG(numero){
    var numero = numero.split("");
    tamanho = numero.length;
    vetor = new Array(tamanho);
 
    if(tamanho>=1)
    {
        vetor[0] = parseInt(numero[0]) * 2; 
    }
    if(tamanho>=2){
        vetor[1] = parseInt(numero[1]) * 3; 
    }
    if(tamanho>=3){
        vetor[2] = parseInt(numero[2]) * 4; 
    }
    if(tamanho>=4){
        vetor[3] = parseInt(numero[3]) * 5; 
    }
    if(tamanho>=5){
        vetor[4] = parseInt(numero[4]) * 6; 
    }
    if(tamanho>=6){
        vetor[5] = parseInt(numero[5]) * 7; 
    }
    if(tamanho>=7){
        vetor[6] = parseInt(numero[6]) * 8; 
    }
    if(tamanho>=8){
        vetor[7] = parseInt(numero[7]) * 9; 
    }
    if(tamanho>=9){
        vetor[8] = parseInt(numero[8]) * 100; 
    }
 
    var total = 0;
 
    if(tamanho>=1){
        total += vetor[0];
    }
    if(tamanho>=2){
     total += vetor[1]; 
    }
    if(tamanho>=3){
     total += vetor[2]; 
    }
    if(tamanho>=4){
     total += vetor[3]; 
    }
    if(tamanho>=5){
     total += vetor[4]; 
    }
    if(tamanho>=6){
     total += vetor[5]; 
    }
    if(tamanho>=7){
     total += vetor[6];
    }
    if(tamanho>=8){
     total += vetor[7]; 
    }
    if(tamanho>=9){
     total += vetor[8]; 
    }
 
 
    resto = total % 11;
    if(resto!=0){
    return false;
    }
    else{
    return true;
    }
}

function enviarCadCliente(){
    var form_data = new FormData();
    form_data.append("nome", $("#cadNome").val());
    form_data.append("senha", $("#cadSenha").val());
    form_data.append("endereco", $("#cadEndereco").val());
    form_data.append("numero", parseInt($("#cadNumero").val()));
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
        url: "../../../php/cliente/cadCliente.php",
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