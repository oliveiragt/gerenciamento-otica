<?php 
require 'conexao.php';
    date_default_timezone_set('America/Sao_Paulo');
    $dataLocal = date('d/m/Y H:i', time());
     $data=$_GET['datavenda'];
    $vendedor=$_GET['vendedor'];
    $produto=$_GET['produto'];
    $quantidade=$_GET['quantidade'];
    $produtoaux=isset($_GET['produtoaux']) ? $_GET['produtoaux'] : '';
    $quantidadeaux=isset($_GET['qtdaux']) ? $_GET['qtdaux'] : '';
    $cliente=$_GET['cliente'];
    $pagamento=$_GET['formapgto'];
    $parcela=isset($_GET['parcelas']) ? $_GE['parcelas'] : '';
    $valor=$_GET['valor'];  
?>
<!doctype html>
<html lang="PT-BR">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./assets/img/oticaeva.jpg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Checkout</title>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <div class="bg-warning col-sm-12">
                <a href="sistema.php"><button type="button" class="btn btn-warning"><i
                            class="fas fa-home"></i>Início</button></a>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Vendas</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Cadastrar Venda</a>
                        <a class="dropdown-item" href="#">Listar Vendas</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Vendedores</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadvendedor.php">Cadastrar Vendedores</a>
                        <a class="dropdown-item" href="listarvendedores.php">Listar Vendedores</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Clientes</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadcliente.php">Cadastrar Clientes</a>
                        <a class="dropdown-item" href="listarclientes.php">Listar Clientes</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Produtos</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadproduto.php">Cadastrar Produtos</a>
                        <a class="dropdown-item" href="listarprodutos.php">Listar Produtos</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Usuários</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadusuario.php">Cadastrar Usuários</a>
                        <a class="dropdown-item" href="listarusuarios.php">Listar Usuários</a>
                    </div>
                </div>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Relatórios</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Completo</a>
                        <a class="dropdown-item" href="#">Vendas</a>
                        <a class="dropdown-item" href="#">Produtos vendidos</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center">Checkout</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-1">
            </div>
            <div class="text-center col-sm-10">
                <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <th class="bg-warning" colspan="4">Informações da venda</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Data da venda</td>
                            <td colspan="3"><?php echo $data; ?></td>
                        </tr>
                        <tr>
                            <td>Vendedor</td>
                            <td colspan="3"><?php    
                            $count=$dbn->query("SELECT * FROM vendedores WHERE idvendedor='$vendedor'");
                                foreach($count as $row){
                                    echo $row['nome'] . "<br>";
                                }  ?></td>
                        </tr>
                        <tr>
                            <td class="bg-warning" colspan="4"><strong>Produtos</strong></td>
                        </tr>
                        <tr>
                            <td><?php   $count=$dbn->query("SELECT * FROM produtos WHERE idproduto='$produto'");
                             $soma=0;
                                foreach($count as $row){
                                    echo $row['descricao'] . "<br>";
                                    $soma=$soma+$row['valor'];
                                    $subtotal=$quantidade*$row['valor'];
                                    echo "<td>" .  $quantidade . "</td>";
                                    echo "<td> R$". number_format($row['valor'], 2, ',', '.') . "</td>";
                                    echo "<td> R$". number_format($subtotal, 2, ',', '.') . "</td>";
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                            $length = count($produtoaux);
                            $somaaux=0;
                            for($i=0;$i<$length;$i++){
                                $count=$dbn->query("SELECT * FROM produtos WHERE idproduto='$produtoaux[$i]'");
                                foreach($count as $row){
                                    echo $row['descricao'] . "<br>";
                                     $somaaux=$somaaux+$row['valor'];
                                }
                            }; ?></td>
                            <td><?php
                            $length = count($quantidadeaux);
                            for($i=0;$i<$length;$i++){
                                echo $quantidadeaux[$i] . "<br>";
                            }; ?></td>
                            <td>
                                <?php
                            $length = count($produtoaux);
                            $somaaux=0;
                            for($i=0;$i<$length;$i++){
                                $count=$dbn->query("SELECT * FROM produtos WHERE idproduto='$produtoaux[$i]'");
                                foreach($count as $row){
                                    echo " R$" . number_format($row['valor'], 2, ',', '.') . "<br>";
                                     $somaaux=$somaaux+$row['valor'];
                                }
                            }; ?>
                            </td>
                            <td>
                                <?php
                            $length = count($produtoaux);
                            $somaaux=0;
                            for($i=0;$i<$length;$i++){
                                $count=$dbn->query("SELECT * FROM produtos WHERE idproduto='$produtoaux[$i]'");
                                foreach($count as $row){
                                     $subtotal=$quantidadeaux[$i]*$row['valor'];
                                     echo " R$". number_format($subtotal, 2, ',', '.') . "<br>";
                                }
                            }; ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-warning" colspan="4"><strong>Informações do cliente</strong></td>
                        </tr>
                        <tr>
                            <td>Cliente</td>
                            <td colspan="3"><?php $count=$dbn->query("SELECT * FROM clientes WHERE idcliente='$cliente'");
                            foreach($count as $row){
                                $nomefull=$row['nome'] . " " .  $row['sobrenome'];
                                echo $nomefull;
                            } ?></td>
                        </tr>
                        <tr>
                            <td class="bg-warning" colspan="4"><strong>Informações de Pagamento</strong></td>
                        </tr>
                        <tr>
                            <td>Pagamento</td>
                            <td colspan="3"><?php echo ($pagamento=="dinheiro") ? "Dinheiro" : "Cartão de Crédito"; ?>
                            </td>
                        </tr>
                        <tr>
                            <?php if($pagamento=="credito"){
                            echo
                            '<td>Parcelas</td>
                            <td>' . $parcela . '</td>';
                            }?>
                        </tr>
                        <tr>
                            <td>Valor Pago</td>
                            <td colspan="3"><?php echo " R$" . number_format($valor, 2, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td>Total a pagar</td>
                            <td colspan="3"><?php 
                            $total=$soma+$somaaux;
                            echo " R$" . number_format($total, 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-outline-success" href="checkout.php">Finalizar Venda</a></button>
                <a href="listarprodutos.php"><button type="button" class="btn btn-outline-info">Visualizar
                        vendas cadastradas</button></a>
                <a href="sistema.php"><button type="button" class="btn btn-outline-secondary">Voltar a página
                        principal</button></a>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</body>

</html>