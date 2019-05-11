<?php
require 'conexao.php';
$id = $_GET['id'];

$count = $dbn->exec("DELETE FROM estoque, produtos
USING estoque
INNER JOIN produtos USING(idproduto)
WHERE estoque.idproduto='$id'");
if ($count){
    header("location:sucesso.php");
    }
    else {
        header("location:falha.php");
    }
?>