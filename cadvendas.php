<?php
require 'conexao.php';
 $dataLocal = date('d/m/Y H:i', time());
    $data=$_GET['data'];
    $vendedor=$_GET['vendedor'];
    $produto=$_GET['produto'];
    $quantidade=$_GET['quantidade'];
    $produtoaux=isset($_GET['produtoaux']) ? $_GET['produtoaux'] : '';
    $quantidadeaux=isset($_GET['qtdaux']) ? $_GET['qtdaux'] : '';
    $cliente=$_GET['cliente'];
    $pagamento=$_GET['formapgto'];
    $parcela=isset($_GET['parcelas']) ? $_GET['parcelas'] : '';
    $valor=$_GET['valor'];  
    $total=$_GET['total'];
    echo "<pre>";
    var_dump($_GET['produtoaux']);exit;
    echo "</pre>";

$count=$dbn->query("INSERT INTO vendas (datavenda,idvendedor,idproduto,quantidade,produtoaux,quantidadeaux,idcliente,pgto,parcelas,valor,total) VALUES ('$data','$vendedor','$produto','$quantidade','$produtoaux','$quantidadeaux','$cliente','$pagamento','$parcela','$valor','$total')");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>