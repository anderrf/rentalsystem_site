<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codCliente = $_POST['codCliente'];

    $query = "SELECT cd_cliente, nm_cliente, nr_telefone, CONCAT(nm_endereco, ', ',nm_bairro, ', ', nm_cidadeUF) AS ds_endereco, ds_email FROM tb_Cliente WHERE cd_cliente = '$codCliente' AND ds_status = true";
    $resultado = mysqli_query($conecta, $query);
    
    
    while($linha = mysqli_fetch_assoc($resultado)){
        $registro = array(
            'cliente' => array(
                'codigo' => $linha['cd_cliente'],
                'nome' => $linha['nm_cliente'],
                'telefone' => $linha['nr_telefone'],
                'endereco' => $linha['ds_endereco'],
                'email' => $linha['ds_email']
            )
        );
    }
    
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao mostrar: ".$e;
  }