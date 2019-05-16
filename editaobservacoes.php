<?php
require 'conexao.php';
$id=$_POST['id'];
$observacao=$_POST['observacao'];

$count=$dbn->query("UPDATE vendas SET obs='$observacao' WHERE idvenda='$id'");
if($count){
    header("location:sucesso.php");
}
else{
    header("location:falha.php");
}
?>