<?php 
require 'conexao.php';
    date_default_timezone_set('America/Sao_Paulo');
    $data=$_GET['datavenda'];
    $vendedor=$_GET['vendedor'];
    $produto=$_GET['produto'];
    $quantidade=$_GET['quantidade'];
    $produtoaux=isset($_GET['produtoaux']) ? $_GET['produtoaux'] : '';
    $quantidadeaux=isset($_GET['qtdaux']) ? $_GET['qtdaux'] : '';
    $cliente=$_GET['cliente'];
    $pagamento=$_GET['formapgto'];
    $parcela=isset($_GET['parcelas']) ? $_GET['parcelas'] : '';
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
                <a href="sistema.php"><button type="button" class="btn btn-warning"><i class="fas fa-home"></i>
                        Início</button></a>
                <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Vendas</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadvenda.php">Cadastrar Venda</a>
                        <a class="dropdown-item" href="listarvendas.php">Listar Vendas</a>
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
                <!-- <div class="btn-group">
                    <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">Relatórios</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Completo</a>
                        <a class="dropdown-item" href="#">Vendas</a>
                        <a class="dropdown-item" href="#">Produtos vendidos</a>
                    </div>
                </div> -->
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
                <form method="GET" action="cadvendas.php">
                <table class="table table-bordered table-hover table-sm">
                        <thead>
                            <th class="bg-warning" colspan="4">Informações da venda</th>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- Informações da venda -->
                                <td>Data da venda</td>
                                <td colspan="3"><?php echo $data; ?></td>
                            </tr>

                            <tr>
                                <td>Vendedor</td>
                                <td colspan="3"><?php    
                            $count=$dbn->query("SELECT * FROM vendedores WHERE idvendedor='$vendedor'");
                                foreach($count as $row){
                                    echo $row['nomevendedor'] . "<br>";
                                }  ?></td>
                            </tr><!-- Fim informações venda -->
                            <tr>
                                <td class="bg-warning" colspan="4"><strong>Produtos</strong></td>
                            </tr>
                            <!-- Produto principal --->
                            <?php  
                            $contagem=count($produto);
                            $soma=0;
                            for($i=0;$i<$contagem;$i++){
                            $count=$dbn->query("SELECT * FROM produtos WHERE idproduto='$produto[$i]'");
                                foreach($count as $row){
                                    echo "<tr><td>" . $row['descricao'] . "</td>";
                                    $subtotal=$quantidade[$i]*$row['valorproduto'];
                                    $soma=$soma+$subtotal;
                                    echo "<td>" .  $quantidade[$i] . "</td>";
                                    echo "<td> R$". number_format($row['valorproduto'], 2, ',', '.') . "</td>";
                                    echo "<td> R$". number_format($subtotal, 2, ',', '.') . "</td></tr>";
                                }
                            } 
                                ?>
                            <!-- Fim produto principal -->
                            <tr>
                                <td class="bg-warning" colspan="4"><strong>Informações do cliente</strong></td>
                            </tr>
                            <tr>
                                <!-- Informações do cliente -->
                                <?php $count=$dbn->query("SELECT * FROM clientes WHERE idcliente='$cliente'");
                            foreach($count as $row){ ?>
                            <tr>
                                <td>Nome</td>
                                <td colspan="3">
                                    <?php $nomefull=$row['nomecliente'] . " " .  $row['sobrenomecliente'];
                                echo $nomefull; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Endereço</td>
                                <td colspan="3"><?php
                                echo $row['endereco'];
                             ?></td>
                            </tr>
                            <tr>
                                <td>Data de Nascimento</td>
                                <td colspan="3"><?php
                                echo date('d/m/Y', strtotime($row['datanasc'])); 
                             ?></td>
                            </tr>
                            <tr>
                                <td>Telefone</td>
                                <td colspan="3"><?php
                                echo $row['telefone'];
                             ?></td>
                            </tr>
                            <?php } ?>
                            </tr><!-- Fim informações cliente -->
                            <tr>
                                <td class="bg-warning" colspan="4"><strong>Informações de Pagamento</strong></td>
                            </tr>
                            <tr>
                                <!-- Informações de pagamento -->
                                <td>Pagamento</td>
                                <td colspan="3">
                                    <?php if($pagamento=="Dinheiro")
                                    {
                                        $pagamento="Dinheiro";
                                        
                                        }elseif($pagamento=="Débito")
                                        {
                                            $pagamento="Débito";
                                            }else{
                                                $pagamento="Crédito";
                                                }  echo $pagamento; ?>
                                </td>
                            </tr>
                            <!-- Verificando se $valor existe para exibir o valor pago em dinheiro ou parcelas se for crédito -->
                            <?php if($valor){ ?>
                            <tr>
                                <td>Valor Pago</td>
                                <td colspan="3"><?php echo " R$" . number_format($valor, 2, ',', '.'); ?></td>
                            </tr>
                            <?php }else{ ?>
                            <tr>
                                <?php if($pagamento=="Crédito"){
                            echo
                            '<td>Parcelas</td>
                            <td colspan="3">' . $parcela . '</td>';
                            }}?>
                            <tr>
                                <!-- Fim verificação $valor -->
                                <td>Total a pagar</td>
                                <td colspan="3"><?php 
                                 //Verifica a forma de pagamento para exibir o valor a pagar em dinheiro ou parcelado
                            if($pagamento=="Crédito"){
                                $valor=$soma;
                                echo  "R$" . number_format($valor, 2, ',', '.') . " parcelado em " . $parcela . "x de R$" . number_format($soma/$parcela, 2, ',', '.');
                            }
                            elseif($pagamento=="Débito"){
                                $valor=$soma;
                                echo  "R$" . number_format($valor, 2, ',', '.');
                            }
                            else{
                                echo " R$" . number_format($soma, 2, ',', '.'); 
                            }
                            ?></td>
                            </tr>
                            <tr>
                                <td>Observações</td>
                                <td colspan="3"><textarea name="observacao" class="form-control"></textarea></td>
                                <input type="hidden" name="data" value="<?php echo $data; ?>">
                                <input type="hidden" name="vendedor" value="<?php echo $vendedor; ?>">
                                <?php 
                                $contagem=count($produto);
                                for($i=0;$i<$contagem;$i++){ ?>
                                <input type="hidden" name="produto[]" value="<?php
                                    print_r ($produto[$i]);
                                ?>">
                                <input type="hidden" name="quantidade[]" value="<?php
                                    print_r ($quantidade[$i]);
                                ?>">
                                <?php } ?>

                                <input type="hidden" name="cliente" value="<?php echo $cliente; ?>">
                                <input type="hidden" name="formapgto" value="<?php echo $pagamento; ?>">
                                <input type="hidden" name="parcelas" value="<?php echo $parcela; ?>">
                                <input type="hidden" name="valor" value="<?php echo $valor; ?>">
                                <input type="hidden" name="total" value="<?php echo $soma; ?>">

                        </tbody>
                    </table>
                    <?php if($valor<$soma){ ?>
                    <button class="btn btn-outline-success" href="checkout.php">Finalizar Venda com valor pago menor que
                        o total</a></button>
                    <?php } elseif($valor>$soma) { ?>
                    <button class="btn btn-outline-success" href="checkout.php" disabled>Valor pago maior que o
                        total</a></button>
                    <?php }
                else{ ?>
                    <button class="btn btn-outline-success" href="checkout.php">Finalizar Venda</a></button>
                    <?php
                }
                ?>
                </form>
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