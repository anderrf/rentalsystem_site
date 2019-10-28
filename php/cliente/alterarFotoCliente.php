<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codCliente = $_POST['codCliente'];

    if($_FILES['foto']['name'] != ''){
      $test = explode('.', $_FILES['foto']['name']);
      $extensao = end($test);
      if($extensao == "jpg" || $extensao == "png"){
        $nome = rand(100, 9999).'.'.$extensao;
        $local = '../foto/'.$nome;
        move_uploaded_file($_FILES['foto']['tmp_name'], $local);
      }
    }

    $query = "UPDATE tb_Cliente SET uri_imagem = '$local' WHERE cd_cliente = '$codCliente';";

    mysqli_query($conecta, $query);
    echo "Alteração realizada com sucesso";

  } catch (Exception $e) {
    echo "Erro ao atualizar foto: ".$e;
  }
