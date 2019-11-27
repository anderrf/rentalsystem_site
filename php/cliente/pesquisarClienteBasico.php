<?php
  try{
    include('../conexao.php');

    $pesquisa = $_POST['pesquisa'];

    $query = "SELECT cd_cliente, nm_cliente, nr_telefone, CONCAT(nm_endereco, ', ', nr_numeroEndereco, ', ', nm_bairro, ', ', nm_cidade, ', ', nm_UF) AS ds_endereco, ds_email FROM tb_Cliente WHERE ds_status = true AND id_nivel = 2 AND nm_cliente LIKE '%$pesquisa%' ORDER BY dt_cadastro;";
    $resultado = mysqli_query($conecta, $query);
    $registro = array(
      'cliente'=>array()
    );
    $i = 0;
    while($linha = mysqli_fetch_assoc($resultado)){
      $registro['cliente'][$i] = array(
        'codigo' => $linha['cd_cliente'],
        'nome' => $linha['nm_cliente'],
        'telefone' => $linha['nr_telefone'],
        'endereco' => $linha['ds_endereco'],
        'email' => $linha['ds_email']
      );
      $i++;
    }
    echo json_encode($registro);
  } catch (Exception $e) {
    echo "Erro ao pesquisar: ".$e;
  }