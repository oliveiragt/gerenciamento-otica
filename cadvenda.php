<?php 
require 'conexao.php';
    date_default_timezone_set('America/Sao_Paulo');
    $dataLocal = date('d/m/Y H:i', time());
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
    <title>Cadastrar Venda</title>
</head>
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                            integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g=" crossorigin="anonymous">
                        </script>
<script>
var input = 1;
function mais() {
    var nova = document.getElementById("aqui");
    var novadiv = document.createElement("div");
    var nomediv = "div";
    novadiv.innerHTML = "Produto " + input +
        "<?php $count=$dbn->query('SELECT * FROM produtos'); ?>
        <select name='produto[]' id='inputProduto' class='form-control' required>  <?php  foreach($count as $row){ ?>  <option value='<?php echo $row['idproduto']; ?>'><?php echo $row['descricao'] . " - R$" . number_format($row['valorproduto'], 2, ',', '.'); ?></option> <?php } ?></select>" + "Quantidade "  + input +
        "<input name='quantidade[]'  class='form-control col-md-12' id='inputQTD'  placeholder='Digite aqui a quantidade do produto " +
        input + "' required>";
    nova.appendChild(novadiv);
    input++;
}
</script>

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
                <h2 class="text-center">Cadastro de Venda</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <form name="cadusuarios" method="GET" action="checkout.php">
                    <div class="form-row">
                    <div class="col-sm-12 bg-warning text-center text-black"><h5>Informações Gerais</h5></div>
                        <div class="form-group col-md-6">
                            <label for="inputDate">Data da Venda</label>
                            <input name="datavenda" class="form-control" id="inputDate" placeholder="Digite aqui a data da venda" value="<?php  echo $dataLocal;  ?>"
                                required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputVendedor">Vendedor</label>
                            <?php $count=$dbn->query("SELECT * FROM vendedores"); ?>
                            <select name="vendedor" id="inputVendedor" class="form-control" required>
                                <?php  foreach($count as $row){ ?>
                                <option value="<?php echo $row['idvendedor']; ?>"><?php echo $row['nomevendedor']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 bg-warning text-center text-black"><h5>Produtos</h5></div>
                         <div class="form-group col-md-6">
                            <label for="inputProduto">Produtos<input class="bg-white" type="button"
                                    value="Adicionar Produto" onClick="mais()"></label>
                            <?php $count=$dbn->query("SELECT * FROM produtos"); ?>
                            <select name="produto[]" id="inputProduto" class="form-control" required>
                                <?php  foreach($count as $row){ ?>
                                <option value="<?php echo $row['idproduto']; ?>"><?php echo $row['descricao'] . " - R$" . number_format($row['valorproduto'], 2, ',', '.'); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputQTD">Quantidade</label>
                            <input autocomplete="off" name="quantidade[]" class="form-control" id="inputQTD"
                                placeholder="Digite aqui a quantidade do produto" required>
                        </div>
                          <div class="form-group col-md-12">
                            <div id="aqui"></div>
                        </div>
                        <div class="col-sm-12 bg-warning text-center text-black"><h5>Cliente</h5></div>
                          <div class="form-group col-md-12">
                            <label for="inputProduto">Cliente</label>
                            <?php $count=$dbn->query("SELECT * FROM clientes"); ?>
                            <select name="cliente" id="inputCliente" class="form-control" required>
                                <?php  foreach($count as $row){ 
                                     $nomefull= $row['nomecliente']." ".$row['sobrenomecliente'];
                                    ?>
                                <option value="<?php echo $row['idcliente']; ?>"><?php echo $nomefull; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-sm-12 bg-warning text-center text-black"><h5>Pagamento</h5></div>
                        <div class="form-group col-md-6">
                            <label>Formas de Pagamento</label>
                            <select class="form-control" id="formapgto" name="formapgto" required>
                                <option value="">Selecione uma forma de pagamento</option>
                                <option value="Dinheiro">Dinheiro</option>
                                <option value="Crédito">Cartão de Crédito</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6" id="parcelas" style="display:none;">
                                    <label for="nrparcelas">Número de Parcelas</label>
                             <select class="form-control" id="nrparcelas" name="parcelas">
                                <option value="1">1x</option>
                                <option value="2">2x</option>
                            </select>
                        </div>
                         <div class="form-group col-md-6" id="valorpago" style="display:none;">
                                    <label for="valor">Valor Pago</label>
                                     <input autocomplete="off" name="valor" class="form-control" id="inputValor">
                        </div>
                    </div>
                    <script>
                    $("#formapgto").change(function() {
                        $('#parcelas').hide();
                        $('#valorpago').hide();
                        if (this.value == "Crédito")
                            $('#parcelas').show();
                            else
                             $('#valorpago').show();
                    });
                    </script>
                      
                       <button class="btn btn-outline-success"> Cadastrar</a></button>
                        <a href="listarvendas.php"><button type="button" class="btn btn-outline-info">Visualizar
                                vendas cadastradas</button></a>
                        <a href="sistema.php"><button type="button" class="btn btn-outline-secondary">Voltar a página
                                principal</button></a>
                </form>
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