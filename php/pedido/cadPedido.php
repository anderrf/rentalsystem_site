<?php

  try{
    include('../conexao.php');
    date_default_timezone_set("America/Sao_Paulo");

    $codCliente = $_POST['codCliente'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $UF = $_POST['UF'];
    $referencia = $_POST['referencia'];
    $dhEntrega = date($_POST['dataEntrega'] . ' ' . $_POST['horaEntrega']);
    $dhRetirada = date($_POST['dataRetirada'] . ' ' . $_POST['horaRetirada']);

    //Produtos
    $jogos = $_POST['jogos'];
    $mesas = $_POST['mesas'];
    $cadeiras = $_POST['cadeiras'];
    $corToalha = $_POST['corToalha'];
    $qtToalha = $_POST['qtToalha'];
    if(isset($mesas) == true){
        $numMesas = ($jogos + $mesas);
    }
    else{
        $numMesas = $jogos;
    }
    if(isset($cadeiras) == true){
        $numCadeiras = (($jogos * 4) + $cadeiras);
    }
    else{
        $numCadeiras = ($jogos * 4);
    }
        
    
    //Queries de valor
    $queryM = "SELECT vl_produto FROM tb_Produto WHERE cd_produto =  (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Mesa')";
    $resultadoM = mysqli_query($conecta, $queryM);
    while($linha = mysqli_fetch_assoc($resultadoM)){
      $valMesa = $linha['vl_produto'];
    }
    
    $queryC = "SELECT vl_produto FROM tb_Produto WHERE cd_produto =  (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Cadeira')";
    $resultadoC = mysqli_query($conecta, $queryC);
    while($linha = mysqli_fetch_assoc($resultadoC)){
        $valCadeira = $linha['vl_produto'];
    }
    
    if((isset($corToalha) == true) && (isset($qtToalha) == true)){
        $queryT = "SELECT vl_produto FROM tb_Produto WHERE cd_produto =  (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Toalha' AND ds_produto = '$corToalha')";
        $resultadoT = mysqli_query($conecta, $queryT);
        while($linha = mysqli_fetch_assoc($resultadoT)){
            $valToalha = $linha['vl_produto'];
        }
    }
    else{
        $valToalha = 00;
    }
    
    //Somas do valor
    $valMesa = ($valMesa * $numMesas);
    $valCadeira = ($valCadeira * $numCadeiras);
    if(isset($valToalha) == true){
        $valToalha = ($valToalha * $qtToalha);
    }
    else{
        $valToalha = 0;
    }
    $valor = ($valMesa + $valCadeira + $valToalha);

    //Inserção de pedido
    $query2 = "INSERT INTO tb_Pedido VALUES 
      (NULL, '$endereco', '$numero', '$bairro', '$cidade', '$UF', '$referencia', CURDATE(), '$dhEntrega', '$dhRetirada', '$valor', '$codCliente', 1);";

    mysqli_query($conecta, $query2);

    //Ligação de pedido e produtos
    $query3 = "INSERT INTO ProdutosDoPedido VALUES 
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Mesa'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $numMesas),
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Cadeira'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $numCadeiras),
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Toalha' AND ds_produto = '$corToalha'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $qtToalha)";
    
    if(isset($numMesas) == true){
        $query3 = "INSERT INTO ProdutosDoPedido VALUES 
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Mesa'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $numMesas);";
        mysqli_query($conecta, $query3);
    }
    if(isset($numCadeiras) == true){
        $query3 = "INSERT INTO ProdutosDoPedido VALUES 
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Cadeira'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $numCadeiras);";
        mysqli_query($conecta, $query3);
    }
    if((isset($corToalha) == true) && (isset($qtToalha) == true)){
        $query3 = "INSERT INTO ProdutosDoPedido VALUES 
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Toalha' AND ds_produto = '$corToalha'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $qtToalha);";
        mysqli_query($conecta, $query3);
    }

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
