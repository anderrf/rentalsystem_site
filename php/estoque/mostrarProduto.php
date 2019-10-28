<?php
  try{
    $conecta = mysqli_connect("localhost", "id10822138_rentalsystem", "programmastery", "id10822138_rentalsystem");
                              //servidor, usuário banco, senha, nome do banco

    $codProduto = $_POST['codProduto'];

    $query = "SELECT * FROM tb_Produto WHERE cd_produto = '$codProduto'";
    $resultado = mysqli_query($conecta, $query);
    
    
    while($linha = mysqli_fetch_assoc($resultado)){
        $registro = array(
            'produto' => array(
                'codigo' => $linha['cd_produto'],
                'produto' => $linha['nm_produto'],
                'descricao' => $linha['ds_produto'],
                'quantidade' => $linha['qt_produto'],
                'valor' => $linha['vl_produto'],
                'foto' => $linha['uri_imagem']
            )
        );
    }
    
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao mostrar: ".$e;
  }
