<?php

if(empty($_GET['usuario']) || empty($_GET['token'])) {
    header('Location: ../index.php');
}

$id = $_GET['usuario'];
$token = $_GET['token'];

session_start();
?>
<!DOCTYPE html>
<html class="loading" lang="pt" data-textdirection="ltr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Cadastre sua conta">
        <meta name="keywords" content="rosivaldoribeiro, cyberproject">
        <title>Nova Senha | CyberProject</title>
        <link rel="apple-touch-icon" href="assets/images/favicon/apple-touch-icon-152x152.png">
        <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon-32x32.png">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- BEGIN: VENDOR CSS-->
        <link rel="stylesheet" type="text/css" href="assets/vendors/vendors.min.css">
        <!-- END: VENDOR CSS-->
        <!-- BEGIN: Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="assets/css/themes/vertical-gradient-menu-template/materialize.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/themes/vertical-gradient-menu-template/style.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/pages/register.min.css">
    </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-gradient-menu preload-transitions 1-column register-bg   blank-page blank-page" data-open="click" data-menu="vertical-gradient-menu" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container">
			<div id="register-page" class="row">
  				<div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">
					<form action="controller/recuperar-senha.php" class="login-form" method="post">
						<div class="row">
							<div class="input-field col s12">
							<h5 class="ml-4">Nova Senha</h5>
							<p class="ml-4">Insira uma nova senha.</p>
							</div>
						</div>
						<div class="row margin">
							<div class="input-field col s12">
							<i class="material-icons prefix pt-2">lock_outline</i>
							<input id="novasenha" name="novasenha" type="password">
							<label for="password">Senha</label>
                            </div>
                            <input type="hidden" id="token" name="token" value="<?php echo $token; ?>">
                            <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                        </div>
						<div class="row">
							<div class="input-field col s12">
							<button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Alterar Senha</button>
							</div>
						</div>
						<div class="row">
                            <div class="input-field col s12" style="color: #f6271d">
                            <center>
							<?php
                                include('controller/alertas.php');
                            ?>
							<center>
                            </div>
                        </div>
						<div class="row">
							<div class="input-field col s12">
							</div>
						</div>
					</form>
  				</div>
			</div>
        </div>
    	<div class="content-overlay"></div>
      </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="assets/js/vendors.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/search.min.js"></script>
    <script src="assets/js/custom/custom-script.min.js"></script>

</body>
</html>