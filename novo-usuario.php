<?php
session_start();
include(__DIR__ . '../../login/controller/auth.php');

//VARIABLES GLOBAIS
$site['titulo'] = "Novo Usuario";
$site['descricao'] = "Usuários - Descricao";
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
                            <span>Novo Usuário</span>
                        </h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item">
                                <a href="painel.php">Painel</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="usuarios.php">Usuários</a>
                            </li>
                            <li class="breadcrumb-item active">
                                Novo
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
                <div class="section users-edit">
                    <div class="card">
                        <div class="card-content">
                        <!-- <div class="card-body"> -->
                        <ul class="tabs mb-2 row">
                            <li class="tab">
                            <a class="display-flex align-items-center active" id="account-tab" href="#account">
                                <i class="material-icons mr-1">person_outline</i><span></span>
                            </a>
                            </li>
                        <li class="indicator" style="left: 0px; right: 935px;"></li></ul>
                        <div class="divider mb-3"></div>
                        <div class="row">
                            <div class="col s12 active" id="account" style="display: block;">
                            <!-- users edit account form start -->
                            <form action="controller/novo_usuario.php" id="accountForm" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col s12 m6">
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <input id="username" name="username" type="text" class="validate" value="">
                                                <label for="username" class="active">Usuário</label>
                                                <small class="errorTxt1"></small>
                                            </div>
                                            <div class="col s12 input-field">
                                                <input id="email" name="email" type="email" class="validate" value="">
                                                <label for="email" class="active">E-mail</label>
                                                <small class="errorTxt3"></small>
                                            </div>
                                            <div class="col s12 input-field">
                                                <input id="password" name="password" type="password" class="validate" value="">
                                                <label for="email" class="active">Senha</label>
                                                <small class="errorTxt3"></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6">
                                        <div class="row">
                                            <div class="col s12 input-field">
                                                <select name="enabled" id="enabled">
                                                    <option value="1">Ativo</option>
                                                    <option value="0">Desativado</option>
                                                </select>
                                                <label>Status</label>
                                            </div>
                                            <div class="col s12 input-field">
                                                <div class="media display-flex align-items-center mb-2">
                                                    <a class="mr-2" href="#">
                                                        <img src="assets/images/user/user.png" class="z-depth-4 circle" height="64" width="64">
                                                    </a>
                                                    <div class="media-body">
                                                        <h5 class="media-heading mt-0">Foto</h5>
                                                        <div class="user-edit-btns display-flex">
                                                            <input type="file" name="imagem" id="fileToUpload">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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