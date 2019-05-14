<?php
require 'conexao.php';
    date_default_timezone_set('America/Sao_Paulo');
    $data=$_GET['data'];
    $vendedor=$_GET['vendedor'];
    $produto=$_GET['produto'];
    $quantidade=$_GET['quantidade'];
    $cliente=$_GET['cliente'];
    $pagamento=$_GET['formapgto'];
    $parcela=isset($_GET['parcelas']) ? $_GET['parcelas'] : '';
    $valor=$_GET['valor'];  
    $total=$_GET['total'];
    $observacao=$_GET['observacao'];
    $contagem=count($produto);

    $count=$dbn->query("INSERT INTO vendas (datavenda,idvendedor,idcliente,pgto,parcelas,valorvenda,total,obs) VALUES ('$data','$vendedor','$cliente','$pagamento','$parcela','$valor','$total','$observacao')");

    $id=$dbn->lastInsertId();
    for($i=0;$i<$contagem;$i++){
        $count2=$dbn->query("INSERT INTO itensvendidos (idvenda,idproduto,qtdvendida) VALUES ($id,$produto[$i],$quantidade[$i])");
         $count5=$dbn->query("SELECT * FROM produtos WHERE idproduto=$produto[$i]");
         foreach($count5 as $row){
        $qtd=$row['quantidade'];
        $sub=$qtd-$quantidade[$i];
        $count3=$dbn->query("UPDATE produtos SET quantidade=$sub WHERE idproduto=$produto[$i]");
         $count4=$dbn->query("INSERT INTO estoque (idproduto,qtdanterior,qtdatual,op,datamov) VALUES ($produto[$i],$qtd,$sub,'Venda','$data')");
         }
        }

    if($count && $count2 && $count3 && $count4){
        header("location:sucesso.php");
        }
        else{
             header("location:falha.php");
             }
?>