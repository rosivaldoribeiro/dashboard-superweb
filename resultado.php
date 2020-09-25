<?php
session_start();
include('app/database.php');
include(__DIR__ . '../../login/controller/auth.php');

//If POST nao houver valor retorna para a busca
if(empty($_POST['username'])) {
    header("Location: pesquisar.php");
exit();
}

//VARIABLES GLOBAIS
$site['titulo'] = "Todos os Projetos";
$site['descricao'] = "Projeto - Descricao";
include(__DIR__ . '../../login/views/header.php');

$username = $_POST['username'];

$query = "SELECT * FROM accounts WHERE username LIKE '%{$username}%';";
$result = mysqli_query($connect_db, $query);

?>
<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row">
        <div class="pt-3 pb-1" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0">
                            <span>Resultado da Pesquisa</span>
                        </h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item">
                                <a href="painel.php">Painel</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Usuários</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Pesquisa por: Usuário
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="materialert info">
		    <center>
                <?php
                    include('controller/alertas.php');
                ?>
            </center>
        </div>
        <div class="users-list-filter">
            <div class="card-panel">
                <div class="row">
                    <div class="col s12 m6 l3">
                    </div>
                    <div class="col s12 m6 l3">
                    </div>
                    <div class="col s12 m6 l3">
                    </div>
                    <div class="col s12 m6 l3 display-flex align-items-center show-btn">
                        <a href="pesquisar.php" type="button" class="btn btn-block indigo waves-effect waves-light">Nova Pesquisa</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12">
            <div class="container">
                <!-- users list start -->
                <section class="users-list-wrapper section">
                    <div class="users-list-filter">
                    </div>
                    <div class="users-list-table">
                        <div class="card">
                            <div class="card-content">
                                <!-- datatable start -->
                                <div class="responsive-table">
                                    <div class="users-list-table">
                                        <div class="card">
                                            <div class="card-content">
                                                <!-- datatable start -->
                                                <div class="responsive-table">
                                                    <table id="users-list-datatable" class="table">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>ID</th>
                                                                <th>Usuário</th>
                                                                <th>E-mail</th>
                                                                <th>Data de Criação</th>
                                                                <th>Tipo</th>
                                                                <th>Status da Conta</th>
                                                                <th>Editar</th>
                                                                <th>Excluir</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php 
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $id = $row["id"];
                                                            $username = $row["username"];
                                                            $email = $row["email"];
                                                            $create_time = $row["create_time"];

                                                            if ($row["enabled"] == 1) {
                                                                $status_class = "green";
                                                                $status = "Ativo";
                                                            } else {
                                                                $status_class = "red";
                                                                $status = "Desativado";
                                                            }                                         

                                                            echo "<tr>";
                                                                echo "<td></td>";
                                                                echo "<td>$id</td>";
                                                                echo "<td>$username</td>";
                                                                echo "<td>$email</td>";
                                                                echo "<td>$create_time</td>";
                                                                echo "<td>Usuário</td>";
                                                                echo "<td>
                                                                    <span class='chip $status_class lighten-5'>
                                                                        <span class='$status_class-text'>$status</span>
                                                                    </span>
                                                                    </td>";
                                                                echo "<td><a href='usuario.php?usuario=$id'><i class='material-icons'>edit</i></a></td>";
                                                                echo "<td><a href='usuario.php?exluir=$id'><i class='material-icons'>delete</i></a></td>";
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- datatable ends -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- datatable ends -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<!-- END: Page Main-->
    
<?php
include(__DIR__ . '../../login/views/footer.php');
?>