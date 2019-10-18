<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $valor = $_POST['valor'];

    if($_FILES['foto']['name'] != ''){
      $test = explode('.', $_FILES['foto']['name']);
      $extensao = end($test);
      if($extensao == "jpg" || $extensao == "png"){
        $nome = rand(100, 9999).'.'.$extensao;
        $local = '../foto/'.$nome;
        move_uploaded_file($_FILES['foto']['tmp_name'], $local);
      }
    }

    $query = "insert into tb_Produto values (null, '$produto', '$descricao', '$quantidade', '$valor', '$local');";

    mysqli_query($conecta, $query);
    echo "Cadastro realizado com sucesso";

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
