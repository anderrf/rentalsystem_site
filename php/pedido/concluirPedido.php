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
    
    
    if($dataRetirada < date('Y-m-d H:i:s')){
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
        //Repor no estoque as quantidades de produtos usadas nas entregas
        $queryAddMesas = "UPDATE tb_Produto SET qt_produto = (qt_produto + $numQtMesa) WHERE nm_produto = 'Mesa';";
        mysqli_query($conecta, $queryAddMesas);
        $queryAddCadeiras = "UPDATE tb_Produto SET qt_produto = (qt_produto + $numQtCadeira) WHERE nm_produto = 'Cadeira';";
        mysqli_query($conecta, $queryAddCadeiras);
        $queryAddToalhas = "UPDATE tb_Produto SET qt_produto = (qt_produto + $numQtToalha) WHERE nm_produto = 'Toalha' AND ds_produto = (SELECT pr.ds_produto FROM tb_Produto pr INNER JOIN ProdutosDoPedido pp ON pp.id_produto = pr.cd_produto WHERE pr.nm_produto = 'Toalha' AND pp.id_pedido = '$codigo');";
        mysqli_query($conecta, $queryAddToalhas);
        
        //Conclusão do pedido
        $queryConcluir = "UPDATE tb_Pedido SET id_statusPedido = 3 WHERE cd_pedido = $codigo;";
        mysqli_query($conecta, $queryConcluir);
        echo "Pedido concluído";
    }
    else{
        echo "Não se pode concluir o pedido antes da data de retirada.";
    }

  } catch (Exception $e) {
    echo "Erro ao agendar: ".$e;
  }