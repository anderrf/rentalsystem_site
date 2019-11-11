<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codCliente = $_POST['codCliente'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $UF = $_POST['UF'];
    $referencia = $_POST['referencia'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    if($_POST['foto'] != ''){
      $foto = $_POST['foto'];
    }
    

    $query = "UPDATE tb_Cliente SET nm_endereco = '$endereco', nr_numeroEndereco = '$numero', nm_bairro = '$bairro', nm_cidade = '$cidade', nm_UF = '$UF', nm_referencia = '$referencia', nr_telefone = '$telefone', nr_celular = '$celular', ds_email = '$email' WHERE cd_cliente = '$codCliente';";

    mysqli_query($conecta, $query);

    include('alterarFotoCliente.php');

    echo "Alteração realizada com sucesso";

  } catch (Exception $e) {
    echo "Erro ao alterar: ".$e;
  }
