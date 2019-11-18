<?php
  try{
    include('../conexao.php');

    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    if($_FILES['foto']['name'] != ''){
      $test = explode('.', $_FILES['foto']['name']);
      $extensao = end($test);
      if($extensao == "jpg" || $extensao == "png"){
        $nome = rand(100, 9999).'.'.$extensao;
        $local = '../../php/foto/produto/'.$nome;
        move_uploaded_file($_FILES['foto']['tmp_name'], $local);
      }
    }

    $query = "insert into tb_Produto values (null, '$produto', '$descricao', '$quantidade', '$valor', '$local');";

    mysqli_query($conecta, $query);
    echo "Cadastro realizado com sucesso";

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
