<?php
require 'conexao.php';
$id = $_GET['id'];
$count = $dbn->exec("DELETE FROM produtos WHERE idproduto=$id");
$count2= $dbn->exec("DELETE FROM estoque WHERE idproduto='$id'");
if ($count && $count2){
    header("location:sucesso.php");
    }
    else {
        header("location:falha.php");
    }
?>