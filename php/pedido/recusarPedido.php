<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco
    
    $codigo = $_POST['codigo'];

    $query = "UPDATE tb_Pedido SET id_statusPedido = 4 WHERE cd_pedido = $codigo;";
    
    mysqli_query($conecta, $query);
    
    echo "Pedido recusado.";

  } catch (Exception $e) {
    echo "Erro ao listar: ".$e;
  }