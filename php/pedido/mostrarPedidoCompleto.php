<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codigo = $_POST['codigo'];

    $query = "SELECT * tb_Pedido WHERE cd_pedido = '$codigo';";
    $resultado = mysqli_query($conecta, $query);
    
    
    while($linha = mysqli_fetch_assoc($resultado)){
        $registro = array(
            'pedido' => array(
                'codigo' => $linha['cd_pedido'],
                'nome' => $linha['nm_cliente'],
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
                'cliente' => $linha['id_cliente'],
                'status' => $linha['id_statusPedido']
            )
        );
    }
    
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao mostrar: ".$e;
  }