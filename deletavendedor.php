<?php
require 'conexao.php';
$id = $_GET['id'];
$count = $dbn->exec("DELETE FROM vendedores WHERE idvendedor=$id");
if ($count){
    header("location:sucesso.php");
    }
    else {
        header("location:falha.php");
    }
?>