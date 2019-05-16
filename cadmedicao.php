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
    <title>Cadastro de Medição</title>
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
                <h2 class="text-center">Cadastro de Medição</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <?php $id=$_GET['id']; ?>
                <form name="cadmedicao" method="post" action="cadmedicoes.php">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label for="ano">Ano de Referência</label>
                            <select class="form-control" id="ano" name="ano" required>
                            <option value="">Selecione um ano</option>
                                <?php
                                for($i=2015;$i<=2030;$i++){
                            ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <h2 class="text-center">Longe</h2>
                        </div>
                        <div class="form-group col-md-2">
                            <h2 class="text-center">OD</h2>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEsf">Esf.</label>
                            <input name="lodesf" type="text" class="form-control" id="inputEsf"
                                placeholder="Digite o Esf." required autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCil">Cil.</label>
                            <input name="lodcil" type="text" class="form-control" id="inputCil"
                                placeholder="Digite o Cil." required autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEixo">Eixo</label>
                            <input name="lodeixo" type="text" class="form-control" id="inputEixo"
                                placeholder="Digite o Eixo" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-2">
                            <h2 class="text-center">OE</h2>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEsf">Esf.</label>
                            <input name="loeesf" type="text" class="form-control" id="inputEsf"
                                placeholder="Digite o Esf." required autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCil">Cil.</label>
                            <input name="loecil" type="text" class="form-control" id="inputCil"
                                placeholder="Digite o Cil." required autocomplete="off"> 
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEixo">Eixo</label>
                            <input name="loeeixo" type="text" class="form-control" id="inputEixo"
                                placeholder="Digite o Eixo" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <h2 class="text-center">Perto</h2>
                        </div>
                        <div class="form-group col-md-2">
                            <h2 class="text-center">OD</h2>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEsf">Esf.</label>
                            <input name="podesf" type="text" class="form-control" id="inputEsf"
                                placeholder="Digite o Esf."  autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCil">Cil.</label>
                            <input name="podcil" type="text" class="form-control" id="inputCil"
                                placeholder="Digite o Cil."  autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEixo">Eixo</label>
                            <input name="podeixo" type="text" class="form-control" id="inputEixo"
                                placeholder="Digite o Eixo"  autocomplete="off">
                        </div>
                        <div class="form-group col-md-2">
                            <h2 class="text-center">OE</h2>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputEsf">Esf.</label>
                            <input name="poeesf" type="text" class="form-control" id="inputEsf"
                                placeholder="Digite o Esf."  autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputCil">Cil.</label>
                            <input name="poecil" type="text" class="form-control" id="inputCil"
                                placeholder="Digite o Cil."  autocomplete="off">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEixo">Eixo</label>
                            <input name="poeeixo" type="text" class="form-control" id="inputEixo"
                                placeholder="Digite o Eixo"  autocomplete="off">
                        </div>
                        <div class="form-group col-md-2">
                            <h2 class="text-center">Adição</h2>
                        </div>
                         <div class="form-group col-md-10">
                            <label for="inputAdicao">Adição</label>
                            <input name="adicao" type="text" class="form-control" id="inputAdicao"
                                placeholder="Digite a adição"  autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Cadastrar Adição</button>
                    <a href="visualizarcliente.php?id=<?php echo $id; ?>"><button type="button"
                            class="btn btn-outline-secondary">Voltar a página anterior</button></a>
                </form>
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