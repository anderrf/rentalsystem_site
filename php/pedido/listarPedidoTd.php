<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $query = "SELECT cd_pedido, ds_endereco, nr_numeroEndereco, nm_bairro, nm_cidade, nm_UF, ds_referencia, 
      CONVERT(VARCHAR(10), dt_pedido, 103) AS dt_pedido, CONVERT(VARCHAR(10), dt_entrega, 103) AS dt_entrega, CONVERT(VARCHAR(10), dt_retirada, 103) AS dt_retirada, vl_pedido, 
      (SELECT nm_cliente FROM tb_Cliente cl INNER JOIN tb_Pedido pe ON pe.id_cliente = cl.cd_cliente) AS nm_cliente, id_statusPedido 
    FROM tb_Pedido;";
    
    $resultado = mysqli_query($conecta, $query);
    $registro = array(
      'pedido'=>array()
    );
    $i = 0;
    while($linha = mysqli_fetch_assoc($resultado)){
      $registro['pedido'][$i] = array(
        'codigo' => $linha['cd_pedido'],
        'endereco' => $linha['nm_endereco'],
        'numero' => $linha['nr_numeroEndereco'],
        'bairro' => $linha['nm_bairro'],
        'cidade' => $linha['nm_cidade'],
        'UF' => $linha['nm_UF'],
        'referencia' => $linha['ds_referencia'],
        'dataPedido' => $linha['dt_pedido'],
        'dataEntrega' => $linha['dt_entrega'],
        'dataRetirada' => $linha['dt_retirada'],
        'valor' => $linha['vl_pedido'],
        'cliente' => $linha['nm_cliente'],
        'status' => $linha['id_statusPedido']
      );
      $i++;
    }
    echo json_encode($registro);
  } catch (Exception $e) {
    echo "Erro ao listar: ".$e;
  }