<?php
session_start();
include(__DIR__ . '../../login/controller/auth.php');
include(__DIR__ . '../../login/controller/vincula-usuario.php');

//VARIABLES GLOBAIS
$site['titulo'] = "Vincular Usuario";
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
                            <span>Vincular Usuário ao Projeto: <?php echo $title; ?></span>
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
                                Vincular Usuário
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
                            <form action="controller/atualiza_vincula_usuario.php" id="accountForm" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <select id="title" name="title" class="select2 browser-default">
                                                    <option value="<?php echo $id_projeto; ?>" selected><?php echo $title; ?></option>
                                                </select>
                                                <label for="title" class="active">Projeto</label>
                                                <small class="errorTxt1"></small>
                                            </div>
                                            <div class="col s12 input-field">
                                                <select id="username" name="username" class="select2 browser-default">
                                                    <?php 
                                                        while ($coluna = mysqli_fetch_assoc($resultado)) {                                                           
                                                            $username = $coluna["username"];
                                                            $id_username = $coluna["id"];

                                                            // Verifica se o usuario ja esta vinculado
                                                            $query_usuario = "SELECT * FROM accounts_projects WHERE accounts_id = '{$id_username}' AND projects_id = '{$id_projeto}'; ";
                                                            $resultado_usuario = mysqli_query($connect_db, $query_usuario);
                                                            $row = mysqli_num_rows($resultado_usuario);

                                                            //Se nao existir valor cria o input
                                                            if ($row == 0) {
                                                                echo "<option value='$id_username'>$username</option>";
                                                            } else {
                                                               
                                                            }
                                                        }
                                                    ?>
                                                </select>
                                                <label for="title" class="active">Usuário</label>
                                                <small class="errorTxt1"></small>
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