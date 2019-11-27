<?php
  try{
    include('../conexao.php');

    $codigo = $_POST['codigo'];

    $query = "SELECT pe.cd_pedido, pe.nm_endereco, pe.nr_numeroEndereco, pe.nm_bairro, pe.nm_cidade, pe.nm_UF, pe.ds_referencia, pe.dt_pedido, pe.dt_entrega, pe.dt_retirada, pe.vl_pedido, cl.nm_cliente, pe.id_statusPedido, mr.nm_motivoRecusa,
	(SELECT pp.qtd_produtosPedido FROM ProdutosDoPedido pp INNER JOIN tb_Produto pr ON pp.id_produto = pr.cd_produto INNER JOIN tb_Pedido pe ON pp.id_pedido = pe.cd_pedido WHERE pr.nm_produto = 'Mesa' AND pp.id_pedido = '$codigo') AS qt_mesas, 
    (SELECT pp.qtd_produtosPedido FROM ProdutosDoPedido pp INNER JOIN tb_Produto pr ON pp.id_produto = pr.cd_produto INNER JOIN tb_Pedido pe ON pp.id_pedido = pe.cd_pedido WHERE pr.nm_produto = 'Cadeira' AND pp.id_pedido = '$codigo') AS qt_cadeiras, 
    (SELECT pp.qtd_produtosPedido FROM ProdutosDoPedido pp INNER JOIN tb_Produto pr ON pp.id_produto = pr.cd_produto INNER JOIN tb_Pedido pe ON pp.id_pedido = pe.cd_pedido WHERE pr.nm_produto = 'Toalha' AND pp.id_pedido = '$codigo') AS qt_toalhas, 
    (SELECT pr.ds_produto FROM tb_Produto pr INNER JOIN ProdutosDoPedido pp ON pp.id_produto = pr.cd_produto INNER JOIN tb_Pedido pe ON pp.id_pedido = pe.cd_pedido WHERE pr.nm_produto = 'Toalha' AND pp.id_pedido = '$codigo') AS corToalha
    FROM tb_Cliente cl INNER JOIN tb_Pedido pe ON pe.id_cliente = cl.cd_cliente LEFT JOIN tb_MotivoRecusa mr ON mr.id_pedido = pe.cd_pedido WHERE cd_pedido = '$codigo';";
    $resultado = mysqli_query($conecta, $query);
    
    
    while($linha = mysqli_fetch_assoc($resultado)){
        $registro = array(
            'pedido' => array(
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
              'status' => $linha['id_statusPedido'],
              'qt_mesas' => $linha['qt_mesas'],
              'qt_cadeiras' => $linha['qt_cadeiras'],
              'qt_toalhas' => $linha['qt_toalhas'],
              'corToalha' => $linha['corToalha'],
              'motivoRecusa' => $linha['nm_motivoRecusa']
            )
        );
    }
    
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao mostrar: ".$e;
  }