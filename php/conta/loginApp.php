<?php

try{

    include('../conexao.php');

    $nome = $_POST['nome'];
    $senha = crypt('$2$55vdv51ds', $_POST['senha']);

    $query = "SELECT * FROM tb_Cliente WHERE nm_cliente = '$nome' AND ds_status = true";

    $resultado = mysqli_query($conecta, $query);

    while($linha = mysqli_fetch_assoc($resultado)){
        $registro = array(
            'cliente' => array(
                'nome' => $nome,
                'senha' => $senha,
                'nomeVerificar' => $linha['nm_cliente'],
                'senhaVerificar' => $linha['ds_senha'],
                'nivel' => $linha['id_nivel']
            )
        );
    }
    
    echo json_encode($registro);



  } catch (Exception $e) {
    echo "Erro ao entrar: ".$e;
  }