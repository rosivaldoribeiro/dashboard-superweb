<?php
session_start();
include(__DIR__ . '../../login/controller/auth.php');
include(__DIR__ . '../../login/controller/projetos.php');

//VARIABLES GLOBAIS
$site['titulo'] = "Todos os Projetos";
$site['descricao'] = "Projeto - Descricao";
include(__DIR__ . '../../login/views/header.php');

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
                            <span>Todos os Projetos</span>
                        </h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item">
                                <a href="painel.php">Painel</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Projetos</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Listar
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
                                    <table id="users-list-datatable" class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>ID</th>
                                                <th>Projeto</th>
                                                <th>Descrição</th>
                                                <th>Data de Criação</th>
                                                <th>Editar</th>
                                                <th>Excluir</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                           while ($row = mysqli_fetch_assoc($result)) {
                                            $id = $row["id"];
                                            $title = $row["title"];
                                            $description = $row["description"];
                                            $create_time = $row["create_time"];                                       

                                            echo "<tr>";
                                                echo "<td></td>";
                                                echo "<td>$id</td>";
                                                echo "<td>$title</td>";
                                                echo "<td>$description</td>";
                                                echo "<td>$create_time</td>";
                                                echo "<td><a href='projeto.php?projeto=$id'><i class='material-icons'>edit</i></a></td>";
                                                echo "<td><a href='projeto.php?excluir=$id'><i class='material-icons'>delete</i></a></td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
                                                echo "<td></td>";
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