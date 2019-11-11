<?php
  try{

    if($_FILES['foto']['name'] != ''){
      $test = explode('.', $_FILES['foto']['name']);
      $extensao = end($test);
      if($extensao == "jpg" || $extensao == "png"){
        $nome = rand(100, 9999).'.'.$extensao;
        $local = '../../php/foto/cliente/'.$nome;
        move_uploaded_file($_FILES['foto']['tmp_name'], $local);
      }
    }

    $query2 = "UPDATE tb_Cliente SET uri_imagem = '$local' WHERE cd_cliente = '$codCliente';";

    mysqli_query($conecta, $query2);

    echo "Alteração realizada com sucesso";

  } catch (Exception $e) {
    echo "Erro ao atualizar foto: ".$e;
  }
