<?php
  try{
    include('../conexao.php');

    $senha = crypt('$2$55vdv51ds', $_POST['senha']);
    $codProduto = $_POST['codProduto'];
    
    $query = "SELECT * FROM tb_Cliente WHERE ds_senha = '$senha' AND ds_status = true AND id_nivel = 1";
    $resultado = mysqli_query($conecta, $query);
    
    while($linha = mysqli_fetch_assoc($resultado)){
            $senhaVerificar = $linha['ds_senha'];
            
    }
    if($senha == $senhaVerificar){
        $query2 = "DELETE FROM tb_Produto WHERE cd_produto = '$codProduto';";
        mysqli_query($conecta, $query2);
            echo "Deleção realizada com sucesso";
        }
        else{
            echo "Erro ao deletar.";
        }
    

    

  } catch (Exception $e) {
    echo "Erro ao deletar: ".$e;
  }
