<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $nome = $_POST['nome'];
    $senha = crypt('$2$55vdv51ds', $_POST['senha']);
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $cidadeUF = $_POST['cidadeUF'];
    $referencia = $_POST['referencia'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $CPF = $_POST['CPF'];
    $RG = $_POST['RG'];

    $query = "INSERT INTO tb_Cliente values (null, '$nome', '$senha', '$endereco', '$bairro', '$cidadeUF', '$referencia', '$telefone', '$celular', '$email', '$CPF', '$RG');";

    mysqli_query($conecta, $query);
    echo "Cadastro realizado com sucesso";

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
