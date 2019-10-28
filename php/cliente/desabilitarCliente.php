<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco
    
    $codigo = $_POST['codigo'];

    $query = "UPDATE tb_Cliente SET ds_status = false WHERE cd_cliente = $codigo;";
    
    mysqli_query($conecta, $query);
    
    echo "Desabilitação concluída.";

  } catch (Exception $e) {
    echo "Erro ao listar: ".$e;
  }