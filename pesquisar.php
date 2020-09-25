<?php
session_start();
include(__DIR__ . '../../login/controller/auth.php');

//VARIABLES GLOBAIS
$site['titulo'] = "Todos os Usuários";
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
                            <span>Pesquisa</span>
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
                                Buscar
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
                        <div class="card-panel">
                            <div class="row">
                                <form method="POST" action="resultado.php">
                                    <label for="username" class="center-align">Insira o nome do usuário</label>
							        <input id="username" name="username" type="text">
                                    <button type="submit" class="btn btn-block indigo waves-effect waves-light">Pesquisar</button>
                                </form>
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