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
                'codigo' => $linha['cd_cliente'],
                'nome' => $linha['nm_cliente'],
                'endereco' => $linha['nm_endereco'],
                'numero' => $linha['nr_numeroEndereco'],
                'bairro' => $linha['nm_bairro'],
                'cidade' => $linha['nm_cidade'],
                'UF' => $linha['nm_UF'],
                'referencia' => $linha['nm_referencia'],
                'telefone' => $linha['nr_telefone'],
                'celular' => $linha['nr_celular'],
                'email' => $linha['ds_email'],
                'CPF' => $linha['nr_CPF'],
                'RG' => $linha['nr_RG'],
                'foto' => $linha['uri_imagem']
            )
        );
    }
    
    echo json_encode($registro);

  } catch (Exception $e) {
    echo "Erro ao mostrar: ".$e;
  }