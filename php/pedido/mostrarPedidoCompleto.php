<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codigo = $_POST['codigo'];

    $query = "SELECT pe.cd_pedido, pe.nm_endereco, pe.nr_numeroEndereco, pe.nm_bairro, pe.nm_cidade, pe.nm_UF, 
    pe.ds_referencia, pe.dt_pedido, pe.dt_entrega, pe.dt_retirada, pe.vl_pedido, cl.nm_cliente, 
    pe.id_statusPedido FROM tb_Pedido pe INNER JOIN tb_Cliente cl ON pe.id_cliente = cl.cd_cliente WHERE cd_pedido = '$codigo';";
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
              'dataEntrega' => $linha['dt_entrega']->format("Y-m-d"),
              'horaEntrega' => $linha['dt_entrega']->format("H:i"),
              'dataRetirada' => $linha['dt_retirada']->format("Y-m-d"),
              'horaRetirada' => $linha['dt_retirada']->format("H:i"),
              'valor' => $linha['vl_pedido'],
              'cliente' => $linha['nm_cliente'],
              'status' => $linha['id_statusPedido']
            )
        );
    }
    
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao mostrar: ".$e;
  }