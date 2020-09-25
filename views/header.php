<?php 
include(__DIR__ . '../../../login/app/global.php');

?>
<!DOCTYPE html>
<html class="loading" lang="pt" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?php echo $site['descricao'] ?>">
    <meta name="keywords" content="rosivaldoribeiro, <?php echo $site['nome_site']; ?>">
    <title><?php echo $site['titulo'] ?> - <?php echo $site['nome_site']; ?></title>
    <link rel="apple-touch-icon" href="assets/images/favicon/apple-touch-icon-152x152.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon/favicon-32x32.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="assets/vendors/vendors.min.css">
    <?php
      if ($site['titulo'] == "Todos os Usuários") {
        echo '<link rel="stylesheet" type="text/css" href="assets/vendors/data-tables/css/jquery.dataTables.min.css">';
        echo '<link rel="stylesheet" type="text/css" href="assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">';
        echo '<link rel="stylesheet" type="text/css" href="assets/css/pages/page-users.min.css">';
      }
    ?>
     <?php
      if ($site['titulo'] == "Editar Usuário") {
        echo '<link rel="stylesheet" type="text/css" href="assets/vendors/select2/select2-materialize.css">';
        echo '<link rel="stylesheet" type="text/css" href="assets/vendors/select2/select2.min.css">';
        echo '<link rel="stylesheet" type="text/css" href="assets/css/pages/page-users.min.css">';
      }
    ?>
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/themes/vertical-gradient-menu-template/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/vertical-gradient-menu-template/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/pages/dashboard.min.css">
  </head>
  <!-- END: Head-->
  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-gradient-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-gradient-menu" data-col="2-columns">

    <!-- BEGIN: Header-->
    <header class="page-topbar" id="header">
      <div class="navbar navbar-fixed"> 
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-light">
          <div class="nav-wrapper">
            <ul class="navbar-list right">
              <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
              <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);" data-target="notifications-dropdown"><i class="material-icons">notifications_none<small class="notification-badge">1</small></i></a></li>
              <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online">
              <?php
                if (empty($imagem_do_perfil)) {
                  echo '<img src="assets/images/user/user.png" alt="avatar"';
                } else {
                  echo "<img src='uploads/users/$imagem_do_perfil' alt='avatar'";
                } 
              ?>
                <i></i></span></a></li>
            </ul>
            <!-- notifications-dropdown-->
            <ul class="dropdown-content" id="notifications-dropdown">
              <li>
                <h6>NOTIFICAÇÕES<span class="new badge">1</span></h6>
              </li>
              <li class="divider"></li>
              <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> Seja bem vindo <?php echo $username; ?></a>
                <time class="media-meta grey-text darken-2">agora</time>
              </li>
            </ul>
            <!-- profile-dropdown-->
            <ul class="dropdown-content" id="profile-dropdown">
              <li><a class="grey-text text-darken-1" href="meu-perfil.php?usuario=<?php echo $_SESSION['id']; ?>"><i class="material-icons">person_outline</i> Perfil</a></li>
              <li class="divider"></li>
              <li><a class="grey-text text-darken-1" href="sair.php"><i class="material-icons">keyboard_tab</i> Sair</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- END: Header-->
    <ul class="display-none" id="search-not-found">
      <li class="auto-suggestion"><a class="collection-item display-flex align-items-center" href="#"><span class="material-icons">error_outline</span><span class="member-info">No results found.</span></a></li>
    </ul>

    <!-- BEGIN: SideNav-->
    <aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-dark gradient-45deg-deep-purple-blue sidenav-gradient sidenav-active-rounded">
      <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="painel.php">
            <img class="show-on-medium-and-down hide-on-med-and-up" src="assets/images/logo/materialize-logo-color.png" alt="materialize logo"/>
            <span class="logo-text hide-on-med-and-down"><?php echo $site['nome_site']; ?></span></a>
            <a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a>
        </h1>
      </div>
      <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Painel">Painel</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="painel.php"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Página Inicial">Página Inicial</span></a>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="Interno">Interno</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a class="collapsible-header waves-effect waves-cyan" href="JavaScript:void(0)"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Usuários">Usuários</span></a>
                <div class="collapsible-body">
                  <ul class="collapsible" data-collapsible="accordion">
                    <li><a href="novo-usuario.php"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Novo">Novo</span></a>
                    </li>
                    <li><a href="usuarios.php"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Listar">Listar</span></a>
                    </li>
                    <li><a href="pesquisar.php"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Buscar">Buscar</span></a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>
        <li class="navigation-header"><a class="navigation-header-text">Ferramentas</a><i class="navigation-header-icon material-icons">more_horiz</i>
        </li>
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">receipt</i><span class="menu-title" data-i18n="Projetos">Projetos</span></a>
          <div class="collapsible-body">
            <ul class="collapsible collapsible-sub" data-collapsible="accordion">
              <li><a href="novo-projeto.php"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Novo">Novo</span></a>
              </li>
              <li><a href="projetos.php"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Listar">Listar</span></a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
      <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
    </aside>
    <!-- END: SideNav-->