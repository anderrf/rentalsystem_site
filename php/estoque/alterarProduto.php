<?php
  try{
    include('../conexao.php');

    $codProduto = $_POST['codProduto'];
    $produto = $_POST['produto'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];

    if($_FILES['foto']['name'] != ''){
      $test = explode('.', $_FILES['foto']['name']);
      $extensao = end($test);
      if($extensao == "jpg" || $extensao == "png"){
        $nome = rand(100, 9999).'.'.$extensao;
        $local = '../../php/foto/produto/'.$nome;
        move_uploaded_file($_FILES['foto']['tmp_name'], $local);
      }
    }

    $query = "UPDATE tb_Produto SET nm_produto = '$produto', ds_produto = '$descricao', vl_produto = '$valor', uri_imagem = '$local' WHERE cd_produto = '$codProduto';";

    mysqli_query($conecta, $query);
    echo "Alteração realizada com sucesso";

  } catch (Exception $e) {
    echo "Erro ao cadastrar: ".$e;
  }
