<?php
  try{
    include('../conexao.php');
    date_default_timezone_set("America/Sao_Paulo");
    
    $codigo = $_POST['codigo'];
    
    $query1 = "SELECT dt_retirada FROM tb_Pedido WHERE cd_pedido = '$codigo'";
    
    $resultado1 = mysqli_query($conecta, $query1);
    
    while($linha = mysqli_fetch_assoc($resultado1)){
        $dataRetirada = $linha['dt_retirada'];
    }
    
    $query2 = "SELECT GETDATE();";
    
    $resultado2 = mysqli_query($conecta, $query2);
    
    if($dataRetirada < date('Y-m-d H:i:s')){
        $query2 = "UPDATE tb_Pedido SET id_statusPedido = 3 WHERE cd_pedido = $codigo;";
        mysqli_query($conecta, $query2);
        echo "Pedido concluído";
    }
    else{
        echo "Não se pode concluir o pedido antes da data de retirada.";
    }

  } catch (Exception $e) {
    echo "Erro ao agendar: ".$e;
  }