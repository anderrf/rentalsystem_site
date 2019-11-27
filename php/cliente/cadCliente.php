<?php
  try{
    include('../conexao.php');
    date_default_timezone_set("America/Sao_Paulo");

    $nome = $_POST['nome'];
    $senha = crypt('$2$55vdv51ds', $_POST['senha']);
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $UF = $_POST['UF'];
    $referencia = $_POST['referencia'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $CPF = $_POST['CPF'];
    $RG = $_POST['RG'];

    $query = "INSERT INTO tb_Cliente values (NULL, '$nome', '$senha', '$endereco', '$numero', '$bairro', '$cidade', '$UF', '$referencia', '$telefone', '$celular', '$email', '$CPF', '$RG', null, true, 2, CURDATE());";

    mysqli_query($conecta, $query);
    echo "Cadastro realizado com sucesso";

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
