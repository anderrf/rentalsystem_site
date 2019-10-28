<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codCliente = $_POST['codCliente'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidadeUF = $_POST['cidadeUF'];
    $referencia = $_POST['referencia'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];

    $query = "UPDATE tb_Cliente SET nm_endereco = '$endereco', nm_bairro = '$bairro', nm_cidadeUF = '$cidadeUF', nm_referencia = '$referencia', nr_telefone = '$telefone', nr_celular = '$celular', ds_email = '$email' WHERE cd_cliente = '$codCliente';";

    mysqli_query($conecta, $query);
    echo "Alteração realizada com sucesso";

  } catch (Exception $e) {
    echo "Erro ao alterar: ".$e;
  }
