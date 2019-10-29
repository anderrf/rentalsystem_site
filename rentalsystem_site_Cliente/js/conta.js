$(document).on("click", "#btnEntrar", function(){
    var form_data = new FormData();
    form_data.append("nome", $("#inpNome").val());
    form_data.append("senha", $("#inpSenha").val());
    $.ajax({
        type: "post",
        url: "https://rentalsystempm.000webhostapp.com/php/conta/login.php",
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