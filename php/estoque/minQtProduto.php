<?php
  try{
    include('../conexao.php');

    $codProduto = $_POST['codProduto'];
    $qtAddProduto = $_POST['qtAddProduto'];

    $query = "UPDATE tb_Produto SET qt_produto = (qt_produto - $qtAddProduto) WHERE cd_produto = '$codProduto';";

    mysqli_query($conecta, $query);
    echo "Subtração realizada com sucesso";

  } catch (Exception $e) {
    echo "Erro ao subtrair: ".$e;
  }
