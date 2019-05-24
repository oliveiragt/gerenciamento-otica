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
    <title>Informações do Cliente</title>
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
                <h2 class="text-center">Informações do Cliente</h2>
            </div>
        </div>
        <div class="row">
            <div class="text-center col-sm-12">
                <table name="cliente" class="table table-bordered table-hover table-sm">
                    <thead>
                        <th class="bg-warning" colspan="2">Informações do Cliente</th>
                    </thead>
                    <?php 
                $id=$_GET['id'];
                $sql=$dbn->query("SELECT * FROM clientes WHERE idcliente='$id'");
                foreach($sql as $row){
                    ?>
                    <tbody>
                        <tr>
                            <td>Nome do Cliente</td>
                            <td><?php echo $row['nomecliente'] . " " . $row['sobrenomecliente']; ?></td>
                        </tr>
                        <tr>
                            <td>Endereço</td>
                            <td><?php echo $row['rua'] . " - " . $row['numero'] . " - " . $row['bairro'] . " - " . $row['cidade'] . " - " . $row['estado'] . " - " . $row['cep']; ?></td>
                        </tr>
                        <tr>
                            <td>Data de Nascimento</td>
                            <td><?php  echo date('d/m/Y', strtotime($row['datanasc']));  ?></td>
                        </tr>
                        <tr>
                            <td>Telefone</td>
                            <td><?php echo $row['telefone']; ?></td>
                        </tr>
                    </tbody>
                    <?php
                }

            ?>
                </table>
                <table name="medicao" class="col-sm-6 table table-bordered table-hover table-sm">
                    <thead>
                        <th class="bg-warning text-center" colspan="2">Ações</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="cadmedicao.php?id=<?php echo $id; ?>"><button type="button"
                                        class="btn btn-outline-success">Cadastrar Nova Medição</button></a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <table name="medicao" class="col-sm-6 table table-bordered table-hover table-sm">
                    <thead>
                        <th class="bg-warning text-center" colspan="2">Medições por ano</th>
                    </thead>
                    <?php 
                $id=$_GET['id'];
                $sql=$dbn->query( "SELECT medicao.*,clientes.* FROM medicao  INNER JOIN clientes ON medicao.idcliente=clientes.idcliente WHERE clientes.idcliente='$id'");
                foreach($sql as $row){
                    ?>
                    <tbody>
                        <tr>
                            <td><a
                                    href="visualizarmedicao.php?id=<?php echo $row['idmedicao']; ?>"><?php echo $row['anomedicao']; ?></a>
                            </td>
                        </tr>
                    </tbody>
                    <?php
                }

            ?>
                </table>

                <table name="vendas" class="col-sm-6 table table-bordered table-hover table-sm">
                    <thead>
                        <th class="bg-warning text-center" colspan="2">Vendas Associadas</th>
                    </thead>
                    <?php 
                $id=$_GET['id'];
                $sql=$dbn->query( "SELECT vendas.*,clientes.* FROM vendas  INNER JOIN clientes ON vendas.idcliente=clientes.idcliente WHERE vendas.idcliente='$id'");
                $soma=0;
                foreach($sql as $row){
                    $soma=$soma+$row['total'];
                    ?>
                    <tbody>
                        <tr>
                            <td colspan="2"><a
                                    href="visualizarvenda.php?id=<?php echo $row['idvenda']; ?>"><?php echo "Venda nº ".$row['idvenda']; ?></a>
                            </td>
                        </tr>

                        <?php
                }

            ?>
                        <td class="bg-warning"><strong>Total Gasto</strong> </td>
                        <td><?php echo 'R$' . number_format($soma, 2, ',', '.'); ?></td>
                    </tbody>
                </table>

                <a href="listarclientes.php"><button type="button" class="btn btn-outline-info">Voltar a página
                        anterior</button></a>
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