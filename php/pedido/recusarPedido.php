<?php
  try{
    include('../conexao.php');
    
    $codigo = $_POST['codigo'];
    $motivoRecusa = $_POST['motivoRecusa'];

    $query1 = "UPDATE tb_Pedido SET id_statusPedido = 4 WHERE cd_pedido = $codigo;";
    
    mysqli_query($conecta, $query1);
    
    $query2 = "INSERT INTO tb_MotivoRecusa VALUES (NULL, '$motivoRecusa', '$codigo')";
    
    mysqli_query($conecta, $query2);
    
    echo "Pedido recusado.";

  } catch (Exception $e) {
    echo "Erro ao listar: ".$e;
  }