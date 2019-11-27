<?php
  try{
    include('../conexao.php');
    $query = "SELECT * FROM tb_Cliente WHERE ds_status = true AND id_nivel = 2 ORDER BY dt_cadastro;";
    $resultado = mysqli_query($conecta, $query);
    $registro = array(
      'cliente'=>array()
    );
    $i = 0;
    while($linha = mysqli_fetch_assoc($resultado)){
      $registro['cliente'][$i] = array(
        'codigo' => $linha['cd_cliente'],
        'nome' => $linha['nm_cliente'],
        'endereco' => $linha['nm_endereco'],
        'numero' => $linha['nr_numeroEndereco'],
        'bairro' => $linha['nm_bairro'],
        'cidade' => $linha['nm_cidade'],
        'UF' => $linha['nm_UF'],
        'referencia' => $linha['ds_referencia'],
        'telefone' => $linha['nr_telefone'],
        'celular' => $linha['nr_celular'],
        'email' => $linha['ds_email'],
        'CPF' => $linha['nr_CPF'],
        'RG' => $linha['nr_RG']
      );
      $i++;
    }
    echo json_encode($registro);
  } catch (Exception $e) {
    echo "Erro ao listar: ".$e;
  }