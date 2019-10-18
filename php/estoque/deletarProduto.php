<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codProduto = $_POST['codProduto'];

    $query = "DELETE FROM tb_Produto WHERE cd_produto = '$codProduto';";

    mysqli_query($conecta, $query);
    echo "Deleção realizada com sucesso";

  } catch (Exception $e) {
    echo "Erro ao deletar: ".$e;
  }
