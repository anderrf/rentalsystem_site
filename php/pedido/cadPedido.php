<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $UF = $_POST['UF'];
    $referencia = $_POST['referencia'];
    $jogos = $_POST['jogos'];
    $celular = $_POST['celular'];
    $mesas = $_POST['mesas'];
    $cadeiras = $_POST['cadeiras'];
    $corToalha = $_POST['corToalha'];
    $qtToalha = $_POST['qtToalha'];
    $dataEntrega = $_POST['dataEntrega'];
    $horaEntrega = $_POST['horaEntrega'];
    $dataRetirada = $_POST['dataRetirada'];
    $horaRetirada = $_POST['horaRetirada'];

    $query = "";

    mysqli_query($conecta, $query);
    echo "Pedido realizado com sucesso";

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
