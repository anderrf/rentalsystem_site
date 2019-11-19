<?php
  try{
    include('../conexao.php');

    $status = $_POST['status'];

    $query = "SELECT pe.cd_pedido, pe.nm_endereco, pe.nr_numeroEndereco, pe.nm_bairro, pe.nm_cidade, pe.nm_UF, 
      pe.ds_referencia, pe.dt_pedido, pe.dt_entrega, pe.dt_retirada, pe.vl_pedido, cl.nm_cliente, 
      pe.id_statusPedido FROM tb_Pedido pe INNER JOIN tb_Cliente cl ON pe.id_cliente = cl.cd_cliente 
      WHERE pe.id_statusPedido = '$status';";
    
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