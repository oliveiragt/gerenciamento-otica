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
    <title>Lista de Clientes</title>
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
                <h2 class="text-center">Clientes Cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="get" action="">
                    <div class="form-row">
                        <div class="col-sm-6">
                            Filtrar por nome/sobrenome: <input placeholder="Digite um nome para pesquisa"
                                class="form-control" name="pesquisa" type="text" class="form-group" autocomplete="off">
                        </div>
                        <div class="col-sm-6">
                            <button class="btn btn-outline-success">Filtrar</button>
                            <a href=""><button class="btn btn-outline-info">Limpar filtros</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-bordered table-hover table-sm text-center">
                    <thead class="bg-warning">
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th colspan="3">Ações</th>
                    </thead>
                    <tbody>
                        <?php 
                        $pesquisa=isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
                        $count=("SELECT * FROM clientes WHERE nomecliente LIKE '%$pesquisa%' OR sobrenomecliente LIKE '%$pesquisa%'");
                         foreach($dbn->query($count) as $row){
                             $nomefull= $row['nomecliente']." ".$row['sobrenomecliente'];
                        ?>
                        <tr>
                            <td><?php echo $nomefull; ?></td>
                            <td><?php echo $row['telefone']; ?></td>
                            <td><a title="Visualizar Informações"
                                    href="visualizarcliente.php?id=<?php echo $row['idcliente']; ?>"><i
                                        class="fas fa-eye"></i></a></td>
                            <td><a title="Editar" href="editarcliente.php?id=<?php echo $row['idcliente']; ?>"><i
                                        class="far fa-edit"></i></a></td>
                            <td><a title="Apagar" href="deletacliente.php?id=<?php echo $row['idcliente']; ?>"><i
                                        class="far fa-trash-alt"></i></a></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <a href="cadcliente.php"><button class="btn btn-outline-success">Cadastrar novo cliente</button></a>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
</body>

</html>