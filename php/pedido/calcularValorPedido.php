<?php

    try{
        include('../conexao.php');
        
        $jogos = $_POST['jogos'];
        $mesas = $_POST['mesas'];
        $cadeiras = $_POST['cadeiras'];
        $corToalha = $_POST['corToalha'];
        $qtToalha = $_POST['qtToalha'];
        if(isset($mesas) == true){
            $numMesas = ($jogos + $mesas);
        }
        else{
            $numMesas = $jogos;
        }
        if(isset($cadeiras) == true){
            $numCadeiras = (($jogos * 4) + $cadeiras);
        }
        else{
            $numCadeiras = ($jogos * 4);
        }
        
    
        //Queries de valor
        $queryM = "SELECT vl_produto FROM tb_Produto WHERE cd_produto =  (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Mesa')";
        $resultadoM = mysqli_query($conecta, $queryM);
        while($linha = mysqli_fetch_assoc($resultadoM)){
          $valMesa = $linha['vl_produto'];
        }
    
        $queryC = "SELECT vl_produto FROM tb_Produto WHERE cd_produto =  (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Cadeira')";
        $resultadoC = mysqli_query($conecta, $queryC);
        while($linha = mysqli_fetch_assoc($resultadoC)){
          $valCadeira = $linha['vl_produto'];
        }
    
        if((isset($corToalha) == true) && (isset($qtToalha) == true)){
            $queryT = "SELECT vl_produto FROM tb_Produto WHERE cd_produto =  (SELECT cd_produto FROM tb_Produto WHERE nm_produto = 'Toalha' AND ds_produto = '$corToalha')";
            $resultadoT = mysqli_query($conecta, $queryT);
            while($linha = mysqli_fetch_assoc($resultadoT)){
                $valToalha = $linha['vl_produto'];
            }
        }
        else{
            $valToalha = 00;
        }
    
        //Somas do valor
        $valMesa = ($valMesa * $numMesas);
        $valCadeira = ($valCadeira * $numCadeiras);
        if(isset($valToalha) == true){
            $valToalha = ($valToalha * $qtToalha);
        }
        else{
            $valToalha = 0;
        }
        $valor = ($valMesa + $valCadeira + $valToalha);
            
        echo($valor);
        
    }
    catch (Exception $e) {
        echo "Erro ao calcular: ".$e;
    }
    
?>