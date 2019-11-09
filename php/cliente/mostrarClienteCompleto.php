<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codCliente = $_POST['codCliente'];

    $query = "SELECT * FROM tb_Cliente WHERE cd_cliente = '$codCliente' AND ds_status = true AND id_nivel = 2";
    $resultado = mysqli_query($conecta, $query);
    
    
    while($linha = mysqli_fetch_assoc($resultado)){
        $registro = array(
            'cliente' => array(
                'codigo' => strval($linha['cd_cliente']),
                'nome' => strval($linha['nm_cliente']),
                'endereco' => strval($linha['nm_endereco']),
                'numero' => strval($linha['nr_numeroEndereco']),
                'bairro' => strval($linha['nm_bairro']),
                'cidade' => strval($linha['nm_cidade']),
                'UF' => strval($linha['nm_UF']),
                'referencia' => strval($linha['ds_referencia']),
                'telefone' => strval($linha['nr_telefone']),
                'celular' => strval($linha['nr_celular']),
                'email' => strval($linha['ds_email']),
                'CPF' => strval($linha['nr_CPF']),
                'RG' => strval($linha['nr_RG'])
            )
        );
    }
    
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao mostrar: ".$e;
  }