<?php 
session_start();
if(isset($_SESSION['login']) == true &&  !empty($_SESSION['login']))
{   
    $nome=$_SESSION['nome'];
  }
  else{
    header('Location:falhaacesso.html');
  }
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
    <title>Cadastrar Cliente</title>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="./assets/js/cep.js" type="text/javascript">
    </script>
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
                <h2 class="text-center">Cadastro de Cliente</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <form name="cadusuarios" method="post" action="cadclientes.php">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputName">Nome</label>
                            <input name="nome" type="text" class="form-control" id="inputName"
                                placeholder="Digite aqui o primeiro nome" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputLasName">Sobrenome</label>
                            <input name="sobrenome" type="text" class="form-control" id="inputLastName"
                                placeholder="Digite aqui o sobrenome" required autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="cep">CEP</label>
                            <input name="cep" id="cep" maxlength="9" type="text" class="form-control"
                                placeholder="Digite aqui o CEP"  autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="rua">Rua</label>
                            <input name="rua" id="rua" type="text" class="form-control"
                                placeholder="Digite aqui a rua"  autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="numero">Número</label>
                            <input name="numero" id="numero" type="text" class="form-control"
                                placeholder="Digite aqui o número"  autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bairro">Bairro</label>
                            <input name="bairro" id="bairro" type="text" class="form-control"
                                placeholder="Digite aqui o bairro"  autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input name="cidade" id="cidade" type="text" class="form-control"
                                placeholder="Digite aqui a cidade"  autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="uf">Estado</label>
                            <input name="uf" id="uf" type="text" class="form-control"
                                placeholder="Digite aqui o estado" autocomplete="off">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPhone">Telefone</label>
                            <input type="tel" name="telefone" class="form-control" id="inputPhone"
                                placeholder="Digite aqui um telefone"  autocomplete="off">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="inputBirthdate">Data de Nascimento</label>
                            <input type="date" name="datanasc" class="form-control" id="inputBirthdate"
                                placeholder="Digite aqui a data de nascimento"  autocomplete="off">
                        </div>
                        <button type="submit" class="btn btn-outline-success">Cadastrar</button>
                        <a href="listarclientes.php"><button type="button" class="btn btn-outline-info">Visualizar
                                clientes
                                cadastrados</button></a>
                        <a href="sistema.php"><button type="button" class="btn btn-outline-secondary">Voltar a página
                                principal</button></a>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</body>

</html>