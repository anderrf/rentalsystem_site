<?php
  try{
    include('../conexao.php');

    $codCliente = $_POST['codCliente'];

    $query = "SELECT cd_cliente, nm_cliente, nr_telefone, CONCAT(nm_endereco, ', ', nr_numeroEndereco, ', ', nm_bairro, ', ', nm_cidade, ', ', nm_UF) AS ds_endereco, ds_email, uri_imagem, dt_cadastro FROM tb_Cliente WHERE cd_cliente = '$codCliente' AND ds_status = true AND id_nivel = 2";
    $resultado = mysqli_query($conecta, $query);
    
    
    while($linha = mysqli_fetch_assoc($resultado)){
        $registro = array(
            'cliente' => array(
                'codigo' => $linha['cd_cliente'],
                'nome' => $linha['nm_cliente'],
                'telefone' => $linha['nr_telefone'],
                'endereco' => $linha['ds_endereco'],
                'email' => $linha['ds_email'],
                'foto' => $linha['uri_imagem'],
                'dataCadastro' => $linha['dt_cadastro']
            )
        );
    }
    
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao mostrar: ".$e;
  }