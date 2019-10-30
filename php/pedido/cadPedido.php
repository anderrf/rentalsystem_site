<?php

  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codCliente = $_POST['codCliente'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $UF = $_POST['UF'];
    $referencia = $_POST['referencia'];

    $dataEntrega = strval($_POST['dataEntrega']);
    $horaEntrega = strval($_POST['horaEntrega']);
    list($hEntrega, $minEntrega) = explode(":", $horaEntrega);
    $dhEntrega = date_create($dataEntrega);
    $dhEntrega = date_time_set($dhEntrega, $hEntrega, $minEntrega);

    $dataRetirada = $_POST['dataRetirada'];
    $horaRetirada = $_POST['horaRetirada'];
    list($hRetirada, $minRetirada) = explode(":", $horaRetirada);
    $dhRetirada = date_create($dataRetirada);
    $dhRetirada = date_time_set($dhRetirada, $hRetirada, $minRetirada);

    $dataPedido = localtime();

    $query = "INSERT INTO tb_Pedido VALUES 
      (NULL, '$endereco', '$numero', '$bairro', '$cidade', '$UF', '$referencia', $dataPedido, $dhEntrega, $dhRetirada, NULL, '$codCliente', 1);";

    mysqli_query($conecta, $query);

    $jogos = $_POST['jogos'];
    $mesas = $_POST['mesas'];
    $cadeiras = $_POST['cadeiras'];
    $corToalha = $_POST['corToalha'];
    $qtToalha = $_POST['qtToalha'];
    $numMesas = ($jogos + $mesas);
    $numCadeiras = (($jogos * 4) + $cadeiras);

    $query2 = "INSERT INTO ProdutosDoPedido VALUES 
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Mesa'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $numMesas),
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Cadeira'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $numCadeiras),
      (NULL, (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Toalha' AND ds_produto = '$corToalha'), (SELECT MAX(cd_pedido) FROM tb_Pedido), $qtToalha)";

    mysqli_query($conecta, $query2);
    

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
