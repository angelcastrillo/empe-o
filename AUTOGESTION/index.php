<?php
	session_start();
	include "php/API/util.php";
	include "php/API/query.php";
	$query = new query();
	$util = new util();

if(!isset($_SESSION["SESION"])){ 
	header("Location: login.php");
	die();
}else{
	//$temp = (array) $query->select(array("*"),"USUARIO","where ID = ".$_SESSION["SESION"][0]["ID"])[0];
	//foreach($temp as $indice => $valor){
	//	$_SESSION["SESION"][0][$indice] = $valor;
	//};
}
 ?>
<!DOCTYPE html>
<html lang="en-us">	
	<head>
		<meta charset="utf-8">
		<title> S.M.A.R.T </title>
		<meta name="description" content="">
		<meta name="author" content="Kellian Rea">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<!-- CSS del sistema -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/font-awesome.min.css">
		<!-- CSS del SMART -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production-plugins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-production.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-skins.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/smartadmin-rtl.min.css"> 
		<!-- CSS PROPIO -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/sticky.css">
		<!-- Icono del sistema -->
		<link rel="shortcut icon" href="img/iso.png" type="image/x-icon">
		<link rel="icon" href="img/iso.png" type="image/x-icon">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
	</head>
	<body class="<?php echo $_SESSION["SESION"][0]["TEMA"]; ?>" >
		<header id="header">
			<div id="logo-group">
				<span id="logo"> <img style="width:78%;margin-left:7%" src="img/logo.png" alt="NovoPles"> </span>
				<!-- Note: The activity badge color changes when clicked and resets the number to 0
					 Suggestion: You may want to set a flag when this happens to tick off all checked messages / notifications -->
				
				<!-- END AJAX-DROPDOWN -->
			</div>
			<div class="pull-right">
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a style="cursor:pointer !important" href="javascript:void(0);" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="perfil/default.png" alt="" class="online" />  
						</a>
						<ul class="dropdown-menu pull-right">
							<li class="divider"></li>
							<!-- llama al perfil en version mobil -->
							<li>
								<a href="ajax/modal/perfil.php" data-toggle="modal" data-target="#perfil" class="padding-10 padding-top-0 padding-bottom-0"> <i class="fa fa-user"></i> <u>P</u>erfil</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> Pantalla <u>C</u>ompleta</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="login.php" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong><u>C</u>errar sesion</strong></a>
							</li>
						</ul>
					</li>
				</ul>
				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a style="cursor:pointer !important" href="php/usuario/logout.php" title="Cerrar sesion" data-action="userLogout" data-logout-msg=" Esta apunto de cerrar sesion"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				
				<div id="fullscreen" class="btn-header transparent pull-right">
					<span> <a style="cursor:pointer !important" href="javascript:void(0);" data-action="launchFullscreen" title="Pantalla completa"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- Lista para multi-plataforma -->
				
				<!-- Fin lista -->
			</div>
		</header>
		<aside id="left-panel">
			<div class="login-info">
				<!-- Imagen de perfil y nombre -->
				<span> 	
					<a href="ajax/modal/perfil.php" data-toggle="modal" data-target="#perfil">	
						<img id="miniperfil" src="perfil/default.png" alt="me" class="online" /> 
						<span>
							<?php echo $_SESSION["SESION"]["NOMBRE"]." ".$_SESSION["SESION"]["APELLIDO"]; ?>
						</span>
					</a> 
				</span>	
				<!-- FIN perfil -->
			</div>
			<nav>
				<!-- Constructor del Menu CUIDADO -->
				<ul>
					<li class="">
						<a href="ajax/inicio.php" title="Inicio"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Inicio</span></a>
					</li>
				</ul>
				<!-- Fin Menu -->
			</nav>
			<span class="minifyme" data-action="minifyMenu"> <i class="fa fa-arrow-circle-left hit"></i> </span>
		</aside>
		<div id="main" role="main" style="min-height: 92.6vh;">
			<div id="ribbon">
				<ol class="breadcrumb">
				</ol>
			</div>
			<!-- Contenedor modulos -->
			<div id="content" style="overflow-x:hidden">

			</div>
			<!-- Fin contenedor -->
		</div>
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<span class="txt-color-white">S.M.A.R.T<span class="hidden-xs"> </span></span>
				</div>
			</div>
			<!-- Modal del perfil -->
			<div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-labelledby="remoteModalLabel" aria-hidden="true">  
				<div class="modal-dialog">  
					<div class="modal-content">
					
					</div>
				</div>
			</div>
			<!-- Fin del modal -->
		</div>
		<!-- Librerias Jquery -->
		<script src="js/libs/jquery-3.2.1.min.js"></script>
		<script src="js/libs/jquery-ui.min.js"></script>
		<!-- Librerias Principales -->
		<script src="js/app.config.js"></script>
		<!-- para controlar los Drags -->
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 
		<!-- Lo principal del booptrap -->
		<script src="js/bootstrap/bootstrap.min.js"></script>
		<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>
		<!-- Controla las notificacions y los WIDGETS NO QUITAR NUNCA-->
		<script src="js/notification/SmartNotification.min.js"></script>
		<script src="js/smartwidgets/jarvis.widget.min.js"></script>
		<!-- Maneja validaciones -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>
		<script src="http://malsup.github.com/jquery.form.js"></script> 
		<!-- Por si quieres usar unos selects muy chulos -->
		<script src="js/plugin/select2/select2.min.js"></script>
		<!-- para detectar navegadores y reemplaza unas cosas actiguas de JQUERY -->
		<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>
		<!-- Mas cosas del SMART -->
		<script src="js/app.min.js"></script>
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>
		<!-- JS para los chats -->
		<script src="js/smart-chat-ui/smart.chat.ui.min.js"></script>
		<script src="js/smart-chat-ui/smart.chat.manager.min.js"></script>
		<!-- Herramientas -->
		<script src="js/utilidades.js"></script>
		<!-- Charts -->
		<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
		<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>
		
	</body>
</html>
