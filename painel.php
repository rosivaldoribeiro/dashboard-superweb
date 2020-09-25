<?php
session_start();
include(__DIR__ . '../../login/controller/auth.php');

//VARIABLES GLOBAIS
$site['titulo'] = "Painel";
$site['descricao'] = "Painel - Descricao";
include(__DIR__ . '../../login/views/header.php');
?>
<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <!--card stats start-->
                    <div id="cards" class="pt-0">
                        <div class="row">
                            <div class="col s12 m4 l4">
                                <div id="profile-card" class="card animate fadeRight">
                                    <div class="card-image waves-effect waves-block waves-light">
                                        <img class="activator" src="assets/images/gallery/3.png" alt="user bg" />
                                    </div>
                                    <div class="card-content">
                                        <?php
                                            if (empty($imagem_do_perfil)) {
                                                echo '<img class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2" src="assets/images/user/user.png" />';
                                            } else {
                                                echo "<img class='circle responsive-img activator card-profile-image cyan lighten-1 padding-2' src='uploads/users/$imagem_do_perfil' />";
                                            } 
                                        ?>
                                        <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <h5 class="card-title activator grey-text text-darken-4"><?php echo $nome_de_usuario; ?></h5>
                                        <p><i class="material-icons profile-card-i">perm_identity</i> Usuário</p>
                                        <p><i class="material-icons profile-card-i">email</i> <?php echo $email_do_usuario; ?></p>
                                    </div>
                                    <div class="card-reveal">
                                        <span class="card-title grey-text text-darken-4"><?php echo $nome_de_usuario; ?> <i
                                                class="material-icons right">close</i>
                                        </span>
                                        <p>Descrição</p>
                                        <p><i class="material-icons">perm_identity</i> Usuario</p>
                                        <p><i class="material-icons">email</i> <?php echo $email_do_usuario; ?></p>
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m8 l8 animate fadeRight">
                                <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                                    <div class="padding-4">
                                        <div class="row">
                                            <div class="col s7 m7">
                                                <i class="material-icons background-round mt-5">perm_identity</i>
                                                <p>Usuários</p>
                                            </div>
                                            <div class="col s5 m5 right-align">
                                                <h5 class="mb-0 white-text"><?php echo $total_usuarios; ?></h5>
                                                <p class="no-margin"></p>
                                                <p>ESTE MÊS</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                                    <div class="padding-4">
                                        <div class="row">
                                            <div class="col s7 m7">
                                                <i class="material-icons background-round mt-5">timeline</i>
                                                <p>Projetos</p>
                                            </div>
                                            <div class="col s5 m5 right-align">
                                                <h5 class="mb-0 white-text"><?php echo $total_projetos; ?></h5>
                                                <p class="no-margin"></p>
                                                <p>TOTAL</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end container-->
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