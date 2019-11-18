<?php
  try{
    include('../conexao.php');
    $senha = crypt('$2$55vdv51ds', $_POST['senha']);
    $codigo = $_POST['codigo'];
    
    $query = "SELECT * FROM tb_Cliente WHERE ds_senha = '$senha' AND ds_status = true AND id_nivel = 1";
    $resultado = mysqli_query($conecta, $query);
    
    while($linha = mysqli_fetch_assoc($resultado)){
            $senhaVerificar = $linha['ds_senha'];
            
    }
    if($senha == $senhaVerificar){
        $query2 = "UPDATE tb_Cliente SET ds_status = false WHERE cd_cliente = $codigo;";
        mysqli_query($conecta, $query2);
        echo "Desabilitação concluída.";
    }
    else{
        echo "Erro ao deletar.";
    }

  } catch (Exception $e) {
    echo "Erro ao desabilitar: ".$e;
  }