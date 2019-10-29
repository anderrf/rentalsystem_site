<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $pesquisa = $_POST['pesquisa'];

    $query = "SELECT cd_cliente, nm_cliente, nr_telefone, CONCAT(nm_endereco, ', ', nr_numeroEndereco, ', ', nm_bairro, ', ', nm_cidade, ', ', nm_UF) AS ds_endereco, ds_email FROM tb_Cliente WHERE ds_status = true AND id_nivel = 2 AND nm_cliente LIKE '%$pesquisa%';";
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