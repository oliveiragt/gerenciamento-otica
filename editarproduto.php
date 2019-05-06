<?php 
require 'conexao.php';
?>
<!doctype html>
<html lang="PT-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="./assets/img/oticaeva.jpg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Editar Produto</title>
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
                        aria-haspopup="true" aria-expanded="false">Produtos</button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="cadproduto.php">Cadastrar Produtos</a>
                        <a class="dropdown-item" href="#">Listar Produtos</a>
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
                <h2 class="text-center">Editar Produto</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <?php 
                $id=$_GET['id'];
                $count=$dbn->query("SELECT * FROM produtos WHERE idproduto='$id'");
                foreach($count as $resultado){
                    ?>
                <form name="cadusuarios" method="post" action="editarprodutos.php">
                    <div class="form-row">
                        <input name="id" type="hidden" class="form-control"
                            value="<?php echo $resultado['idproduto']; ?>" required>
                        <div class="form-group col-md">
                            <label for="inputRef">Referência</label>
                            <input name="referencia" type="text" class="form-control" id="inputRef"
                                placeholder="Digite aqui o número de referência"
                                value="<?php echo $resultado['referencia']; ?>" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="inputDescription">Descrição</label>
                            <input name="descricao" type="text" class="form-control" id="inputDescription"
                                placeholder="Digite aqui o segundo nome" value="<?php echo $resultado['descricao']; ?>"
                                required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputLevel">Unidade</label>
                            <select name="unidade" id="inputUN" class="form-control" required>
                                <option value="kt" <?=($resultado['unidade'] == 'kt')?'selected':''?>>Kit</option>
                                <option value="pr" <?=($resultado['unidade'] == 'pr')?'selected':''?>>Par</option>
                                <option value="pc" <?=($resultado['unidade'] == 'pc')?'selected':''?>>Peça</option>
                                <option value="un" <?=($resultado['unidade'] == 'un')?'selected':''?>>Unidade</option>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="inputValue">Valor</label>
                            <input name="valor" type="text" class="form-control" id="inputValue"
                                placeholder="Digite aqui o valor do produto" value="<?php echo $resultado['valor']; ?>"
                                required>
                        </div>
                        <div class="form-group col-md">
                            <label for="inputQTD">Quantidade</label>
                            <input name="quantidade" type="text" class="form-control" id="inputQTD"
                                placeholder="Digite aqui a quantidade do produto"
                                value="<?php echo $resultado['quantidade']; ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Editar</button>
                    <a href="listarprodutos.php"><button type="button" class="btn btn-outline-secondary">Voltar a
                            lista de
                            produtos</button></a>
                </form>
                <?php } ?>
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