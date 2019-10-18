<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codProduto = $_POST['codProduto'];
    $qtAddProduto = $_POST['qtAddProduto'];

    $query = "UPDATE tb_Produto SET qt_produto = (qt_produto + $qtAddProduto) WHERE cd_produto = '$codProduto';";

    mysqli_query($conecta, $query);
    echo "Adição realizada com sucesso";

  } catch (Exception $e) {
    echo "Erro ao adicionar: ".$e;
  }
