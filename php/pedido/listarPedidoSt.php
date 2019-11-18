<?php
  try{
    include('../conexao.php');

    $status = $_POST['status'];

    $query = "SELECT *, (SELECT nm_cliente FROM tb_Cliente cl INNER JOIN tb_Pedido pe ON pe.id_cliente = cl.cd_cliente) AS nm_cliente
    FROM tb_Pedido WHERE id_statusPedido = '$status';";
    
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
        'dataPedido' => strval($linha['dt_pedido']),
        'dataEntrega' => strval($linha['dt_entrega']),
        'dataRetirada' => strval($linha['dt_retirada']),
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