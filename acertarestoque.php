<?php
session_start();
require 'conexao.php';
if(isset($_SESSION['login']) == true &&  !empty($_SESSION['login']))
{   
    $nome=$_SESSION['nome'];
  }
  else{
    header('Location:falhaacesso.html');
  }
    date_default_timezone_set('America/Sao_Paulo');
    $id=$_POST['id'];
    $tipomov=$_POST['tipomov'];
    $quantidade=$_POST['quantidade'];
    $motivo=$_POST['motivo'];    
    $data=date('d/m/Y H:i');
  

    $count1=$dbn->query("SELECT * FROM produtos WHERE idproduto=$id");
         foreach($count1 as $row){
            $qtd=$row['quantidade'];
            if($tipomov=="Saída"){
            $sub=$qtd-$quantidade;
            }
            else{
                $sub=$qtd+$quantidade;
                
            }
            
            $count2=$dbn->query("UPDATE produtos SET quantidade=$sub WHERE idproduto=$id");
            $count3=$dbn->query("INSERT INTO estoque (idproduto,qtdanterior,qtdatual,op,datamov) VALUES ($id,$qtd,$sub,'$motivo','$data')");
         }

    if($count1 && $count2 && $count3){
        header("location:sucesso.php");
        }
        else{
             header("location:falha.php");
             }
?>