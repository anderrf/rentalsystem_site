<?php
  try{
    include('../conexao.php');
    date_default_timezone_set("America/Sao_Paulo");
    
    $codigo = $_POST['codigo'];
    
    $query1 = "SELECT dt_entrega FROM tb_Pedido WHERE cd_pedido = $codigo;";
    
    $resultado1 = mysqli_query($conecta, $query1);
    
    while($linha = mysqli_fetch_assoc($resultado1)){
        $dataEntrega = $linha['dt_entrega'];
    }
    
    if($dataEntrega > date('Y-m-d H:i:s')){
        //Busca pela quantidade de produtos do pedido
        $queryQtMesa = "SELECT pp.qtd_produtosPedido FROM ProdutosDoPedido pp INNER JOIN tb_Produto pr ON pp.id_produto = pr.cd_produto WHERE pr.nm_produto = 'Mesa' AND pp.id_pedido = '$codigo';";
        $resultadoQtMesa = mysqli_query($conecta, $queryQtMesa);
        while($linha = mysqli_fetch_assoc($resultadoQtMesa)){
          $numQtMesa = $linha['qtd_produtosPedido'];
        }
        
        $queryQtCadeira = "SELECT pp.qtd_produtosPedido FROM ProdutosDoPedido pp INNER JOIN tb_Produto pr ON pp.id_produto = pr.cd_produto WHERE pr.nm_produto = 'Cadeira' AND pp.id_pedido = '$codigo';";
        $resultadoQtCadeira = mysqli_query($conecta, $queryQtCadeira);
        while($linha = mysqli_fetch_assoc($resultadoQtCadeira)){
          $numQtCadeira = $linha['qtd_produtosPedido'];
        }
        
        $queryQtToalha = "SELECT pp.qtd_produtosPedido FROM ProdutosDoPedido pp INNER JOIN tb_Produto pr ON pp.id_produto = pr.cd_produto WHERE pr.nm_produto = 'Toalha' AND pr.ds_produto = (SELECT pr.ds_produto FROM tb_Produto pr INNER JOIN ProdutosDoPedido pp ON pp.id_produto = pr.cd_produto WHERE pr.nm_produto = 'Toalha' AND pp.id_pedido = '$codigo') AND pp.id_pedido = '$codigo';";
        $resultadoQtToalha = mysqli_query($conecta, $queryQtToalha);
        while($linha = mysqli_fetch_assoc($resultadoQtToalha)){
          $numQtToalha = $linha['qtd_produtosPedido'];
        }
        
        //Busca pela quantidade original de produtos no estoque
        $queryMesaOriginal = "SELECT pr.qt_produto FROM tb_Produto pr WHERE pr.nm_produto = 'Mesa';";
        $resultadoMesaOriginal = mysqli_query($conecta, $queryMesaOriginal);
        while($linha = mysqli_fetch_assoc($resultadoMesaOriginal)){
          $numMesaOriginal = $linha['qt_produto'];
        }
        
        $queryCadeiraOriginal = "SELECT pr.qt_produto FROM tb_Produto pr WHERE pr.nm_produto = 'Cadeira';";
        $resultadoCadeiraOriginal = mysqli_query($conecta, $queryCadeiraOriginal);
        while($linha = mysqli_fetch_assoc($resultadoCadeiraOriginal)){
          $numCadeiraOriginal = $linha['qt_produto'];
        }
        
        $queryToalhaOriginal = "SELECT pr.qt_produto FROM tb_Produto pr WHERE pr.nm_produto = 'Toalha' AND pr.ds_produto = (SELECT pr.ds_produto FROM tb_Produto pr INNER JOIN ProdutosDoPedido pp ON pp.id_produto = pr.cd_produto WHERE pr.nm_produto = 'Toalha' AND pp.id_pedido = '$codigo');";
        $resultadoToalhaOriginal = mysqli_query($conecta, $queryToalhaOriginal);
        while($linha = mysqli_fetch_assoc($resultadoToalhaOriginal)){
          $numToalhaOriginal = $linha['qt_produto'];
        }
        
        if($numQtMesa > $numMesaOriginal){
            echo "O pedido não pode ser agendado por falta de estoque.";
        }
        else{
            if($numQtCadeira > $numCadeiraOriginal){
                echo "O pedido não pode ser agendado por falta de estoque.";
            }
            else{
                if($numQtToalha > $numToalhaOriginal){
                    echo "O pedido não pode ser agendado por falta de estoque.";
                }
                else{
                    //Baixar a quantidade de produtos no estoque
                    $queryBaixarMesa = "UPDATE tb_Produto SET qt_produto = (qt_produto - $numQtMesa) WHERE nm_produto = 'Mesa';";
                    mysqli_query($conecta, $queryBaixarMesa);
                    $queryBaixarCadeira = "UPDATE tb_Produto SET qt_produto = (qt_produto - $numQtCadeira) WHERE nm_produto = 'Cadeira';";
                    mysqli_query($conecta, $queryBaixarCadeira);
                    $queryBaixarToalha = "UPDATE tb_Produto SET qt_produto = (qt_produto - $numQtToalha) WHERE nm_produto = 'Toalha' AND ds_produto = (SELECT pr.ds_produto FROM tb_Produto pr INNER JOIN ProdutosDoPedido pp ON pp.id_produto = pr.cd_produto WHERE pr.nm_produto = 'Toalha' AND pp.id_pedido = '$codigo');";
                    mysqli_query($conecta, $queryBaixarToalha);
                    
                    //Agendar o pedido
                    
                    $queryAgendar = "UPDATE tb_Pedido SET id_statusPedido = 2 WHERE cd_pedido = $codigo;";
    
                    mysqli_query($conecta, $queryAgendar);
                
                    echo "Pedido agendado.";
                    
                }
            }
        }
    }
    else{
        echo "Não se pode agendar um pedido cuja data de entrega já foi ultrapassada.";
    }
    

  } catch (Exception $e) {
    echo "Erro ao agendar: ".$e;
  }