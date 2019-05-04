<?php
require 'conexao.php';
$id = $_GET['id'];
$count = $dbn->exec("DELETE FROM usuario WHERE idusuario=$id");
if ($count){
    echo "sucesso!";
    }
    else {
        echo "falha!";
    }
?>