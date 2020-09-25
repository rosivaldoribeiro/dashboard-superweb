<?php
session_start();
include(__DIR__ . '../../login/controller/auth.php');
include(__DIR__ . '../../login/controller/projeto.php');

//VARIABLES GLOBAIS
$site['titulo'] = "Editar Projeto";
$site['descricao'] = "Projeto - Descricao";
include(__DIR__ . '../../login/views/header.php');

if ($_GET['projeto'] == $_GET['projeto']) {
    $id_projeto = $_GET['projeto'];
}


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
                            <span>Editar Projeto: <?php echo $title; ?></span>
                        </h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item">
                                <a href="painel.php">Painel</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="projetos.php">Projetos</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Editar
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
            <div class="row">
                <div class="col s12 m12 l12">
                <div id="highlight-table" class="card card card-default scrollspy">
                    <div class="card-content">
                    <h4 class="card-title">Usuários - Vinculados Neste Projeto</h4>
                    <p class="mb-2"><a href="vincular-usuario.php?projeto=<?php echo $id_projeto; ?>" type="button" class="waves-effect waves-light btn gradient-45deg-purple-deep-orange z-depth-4 mt-2">
                        VINCULAR NOVO USUÁRIO
                    </a></p>
                    <div class="row">
                        <div class="col s12">
                        </div>
                        <div class="col s12">
                        <table class="highlight">
                            <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Excluir</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                                while ($coluna = mysqli_fetch_assoc($resultado)) {
                                    $id = $coluna["accounts_id"];
                                    
                                    // Obter todos os usuarios
                                    $query_usuario = "SELECT * FROM accounts WHERE id = '{$id}'; ";
                                    $resultado_usuario = mysqli_query($connect_db, $query_usuario);

                                    while ($coluna_users = mysqli_fetch_assoc($resultado_usuario)) {
                                        $username = $coluna_users["username"];
                                        $id_username = $coluna_users["id"];
                                    
                                        // // Obter todos os usuarios
                                        // $query_usuario = "SELECT * FROM accounts WHERE id = '{$id}'; ";
                                        // $resultado_usuario = mysqli_query($connect_db, $query_usuario);
                                    
                                        echo "<tr>";
                                            echo "<td>$username</td>";
                                            echo "<td><a href='projeto.php?desvinculausuario=$id_username&idProjeto=$id_projeto'><i class='material-icons'>delete</i></a></td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="container">
                <!-- users list start -->
                <div class="section users-edit">
                    <div class="card">
                        <div class="card-content">
                        <!-- <div class="card-body"> -->
                        <ul class="tabs mb-2 row">
                            <li class="tab">
                            <a class="display-flex align-items-center active" id="account-tab" href="#account">
                                <i class="material-icons mr-1">person_outline</i><span>Dados</span>
                            </a>
                            </li>
                        <li class="indicator" style="left: 0px; right: 935px;"></li></ul>
                        <div class="divider mb-3"></div>
                        <div class="row">
                            <div class="col s12 active" id="account" style="display: block;">
                            <!-- users edit account form start -->
                            <form action="controller/atualiza_projeto.php" id="accountForm" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <input type="hidden" id="id" name="id" value="<?php echo $id_projeto; ?>">
                                                <input id="title" name="title" type="text" class="validate" value="<?php echo $title; ?>">
                                                <label for="title" class="active">Título do Projeto</label>
                                                <small class="errorTxt1"></small>
                                            </div>
                                            <div class="col s12 input-field">
                                                <textarea id="description" name="description" class="materialize-textarea"><?php echo $description; ?></textarea>
                                                <label for="description" class="active">Descrição do Projeto</label>
                                                <small class="errorTxt3"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6">
                                    </div>
                                    <div class="col s12 display-flex justify-content-end mt-3">
                                        <button type="submit" class="btn indigo">Salvar</button>
                                    </div>
                                </div>
                            </form>
                            <!-- users edit account form ends -->
                            </div>
                        </div>
                        <!-- </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-overlay"></div>
        </div>
    </div>
</div>
<!-- END: Page Main-->
    
<?php
include(__DIR__ . '../../login/views/footer.php');
?>