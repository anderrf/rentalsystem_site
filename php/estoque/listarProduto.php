<?php
  try{
    include('../conexao.php');

    $query = "SELECT * FROM tb_Produto ORDER BY cd_produto ASC";
    $resultado = mysqli_query($conecta, $query);
    $registro = array(
      'produto'=>array()
    );
    $i = 0;
    while($linha = mysqli_fetch_assoc($resultado)){
      $registro['produto'][$i] = array(
        'codigo' => $linha['cd_produto'],
        'produto' => $linha['nm_produto'],
        'descricao' => $linha['ds_produto'],
        'quantidade' => $linha['qt_produto'],
        'valor' => $linha['vl_produto'],
        'foto' => $linha['uri_imagem']
      );
      $i++;
    }
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao listar: ".$e;
  }
