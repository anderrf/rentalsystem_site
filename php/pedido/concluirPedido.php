<?php
  try{
    include('../conexao.php');
    
    $codigo = $_POST['codigo'];

    $query = "UPDATE tb_Pedido SET id_statusPedido = 3 WHERE cd_pedido = $codigo;";
    
    mysqli_query($conecta, $query);
    
    echo "Pedido realizado.";

  } catch (Exception $e) {
    echo "Erro ao listar: ".$e;
  }