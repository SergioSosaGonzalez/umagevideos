<!DOCTYPE html>
<html lang="es-MX">
<head>
    <!-- META SECTION -->
    <?php $auth = $this->session->get("auth");?>
    <title>UMAEE - Control de Inscripciones</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--Meta Google-->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="nofollow">
    <meta name="googlebot" content="nofollow">
    <meta name="google" content="notranslate" />
    <meta name="author" content="Chontal Developers" />
    <meta name="copyright" content="2014 c-develpers.com Todos los derechos reservados." />
    <meta name="application-name" content="Control de inscripciones" />
    <link rel="author" href="https://plus.google.com/u/0/101316577346995540804/posts"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,500,600,700&subset=latin,latin-ext">
    <!-- CSS INCLUDE -->
    
        <?= $this->assets->outputCss('CssIndex') ?>
    
    <?php $cssPlugins = $this->assets->collection('cssPlugins'); ?>
    <?php if (!empty($cssPlugins)) { ?>
        <?=$this->assets->outputCss('cssPlugins'); ?>
    <?php } ?>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
<!-- PAGE LOADING FRAME -->
<!--div class="page-loading-frame">
    <div class="page-loading-loader">
        <img src="<?= $this->url->get('dash/img/loaders/page-loader.gif') ?>"/>
    </div>
</div-->
<!-- END PAGE LOADING FRAME -->
  <!-- START PAGE CONTAINER -->
    <div class="page-container">

        <!-- START PAGE SIDEBAR -->
        <div class="page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide page-sidebar-fixed scroll">
            <!-- START X-NAVIGATION -->
            <ul class="x-navigation x-navigation-custom">
                <li class="xn-logo" style="background-color: #fff;">
                    <a href="<?= $this->url->get('inscription') ?>">UMAEE</a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="<?= $this->url->get('inscription/user/profile') ?>" class="profile-mini">
                        <img src="/dash/assets/images/users/thumbnail/<?= $auth['photo'] ?>" alt="Alexander"/>
                    </a>
                    <div class="profile">
                        <div class="profile-image">
                            <img src="/dash/assets/images/users/thumbnail/<?= $auth['photo'] ?>" alt="Alexander"/>
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?= $auth['username'] ?></div>
                        </div>
                        <div class="profile-controls">
                            <a href="<?= $this->url->get('inscription/user/profile') ?>" class="profile-control-left" title="Editar perfil"><span class="fa fa-info"></span></a>
                            <a href="<?= $this->url->get('inscription') ?>" class="profile-control-right" title="Mensajes de post"><span class="fa fa-envelope"></span></a>
                        </div>
                    </div>
                </li>
                <li class="xn-title">Navegación</li>
                <li class="<?php echo $this->router->getControllerName()=='index'?"active":""?>">
                    <a href="<?= $this->url->get('inscription') ?>"><span class="fa fa-desktop"></span> <span class="xn-text">Menú principal</span></a>
                </li>
                <?php if ($auth['rol'] == 'ADMIN') { ?>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='reports'?"active":""?>">
                    <a href="#"><span class="fa fa-calendar"></span> <span class="xn-text">Calendario de reportes</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getControllerName()=='reports'?"active":""?>"><a href="<?= $this->url->get('inscription/reports') ?>"><span class="fa fa-list-ul"></span> Reportes generales</a></li>
                        <!--li class="<?php echo $this->router->getControllerName()=='reports-school'?"active":""?>"><a href="<?= $this->url->get('inscription/reports-schools') ?>"><span class="fa fa-list-alt"></span> Reportes escuelas</a></li-->
                    </ul>

                </li>
                <?php } ?>
                <?php if ($auth['rol'] == 'ADMIN' || $auth['rol'] == 'COORDINATOR') { ?>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='mail' || $this->router->getControllerName()=='client'?"active":""?>">
                    <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Procesos</span></a>
                    <ul>
                        <li class="xn-openable <?php echo $this->router->getControllerName()=='client'?"active":""?>">
                            <a href="#"><span class="fa fa-child"></span><span class="xn-text">Inscripciones</span></a>
                            <ul>
                                <li class="<?php echo $this->router->getControllerName()=='client' && $this->router->getActionName()=='new'?"active":""?>"><a href="<?= $this->url->get('inscription/client/new') ?>"><span class="fa fa-smile-o"></span> Nueva</a></li>
                                <li class="<?php echo $this->router->getControllerName()=='client' && ($this->router->getActionName()=='index' || $this->router->getActionName()=='control')?"active":""?>"><a href="<?= $this->url->get('inscription/clients') ?>"><span class="fa fa-users"></span> Proceso</a></li>
                                <li class="<?php echo $this->router->getControllerName()=='client' && ($this->router->getActionName()=='internet' || $this->router->getActionName()=='control')?"active":""?>"><a href="<?= $this->url->get('inscription/client/internet') ?>"><span class="fa fa-cloud"></span> Proceso-Internet</a></li>
                                <li class="<?php echo $this->router->getControllerName()=='client' && $this->router->getActionName()=='signedup'?"active":""?>"><a href="<?= $this->url->get('inscription/client/signed-up') ?>"><span class="fa fa-user"></span> Inscritos</a></li>
                                <li class="<?php echo $this->router->getControllerName()=='client' && $this->router->getActionName()=='inactive'?"active":""?>"><a href="<?= $this->url->get('inscription/client/inactive') ?>"><span class="fa fa-user-times"></span> Perdidos</a></li>
                            </ul>
                        </li>
                        <!--li class="xn-openable <?php echo $this->router->getControllerName()=='mail'?"active":""?>">
                            <a href="#"><span class="fa fa-envelope"></span> <span class="xn-text">E-Mail</span></a>
                            <ul>
                                <li class="<?php echo $this->router->getControllerName()=='mail' && $this->router->getActionName()=='send'?"active":""?>"><a href="<?= $this->url->get('inscription/mail/send') ?>"><span class="fa fa-send-o"></span> Enviar email</a></li>
                            </ul>
                        </li-->
                    </ul>
                </li>
                <?php } ?>
                <?php if ($auth['rol'] == 'ADMIN') { ?>
                <li class="xn-openable <?php echo $this->router->getControllerName()=='user'?"active":""?>">
                    <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Ejecutivos</span></a>
                    <ul>
                        <li class="<?php echo $this->router->getControllerName()=='user' && $this->router->getActionName()=='newuser'?"active":""?>">
                            <a href="<?= $this->url->get('inscription/user/new-user') ?>"><span class="fa fa-user-plus"></span> Nuevo ejecutivo</a>
                        </li>
                        <li class="<?php echo $this->router->getActionName()=='index' && $this->router->getControllerName()=='user'?"active":""?>">
                            <a href="<?= $this->url->get('inscription/users') ?>"><span class="fa fa-user"></span> Activos</a>
                        </li>
                        <li class="<?php echo $this->router->getActionName()=='inactive' && $this->router->getControllerName()=='user'?"active":""?>">
                            <a href="<?= $this->url->get('inscription/user/inactive') ?>"><span class="fa fa-user-secret"></span> Inactivos</a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
            <!-- END X-NAVIGATION -->
        </div>
        <!-- END PAGE SIDEBAR -->


        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                <!-- TOGGLE NAVIGATION -->
                <li class="xn-icon-button">
                    <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                </li>
                <!-- END TOGGLE NAVIGATION -->
                <!-- SEARCH -->
                <li class="xn-search">
                    <form role="form">
                        <input type="text" name="search" placeholder="Buscar"/>
                    </form>
                </li>
                <!-- END SEARCH -->
                <!-- POWER OFF -->
                <li class="xn-icon-button pull-right last">
                    <a href="#"><span class="fa fa-power-off"></span></a>
                    <ul class="xn-drop-left animated zoomIn">
                        <li><a href="<?= $this->url->get('') ?>"><span class="fa fa-lock"></span>Bloquear</a></li>
                        <li><a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span>Cerrar sesión</a></li>
                    </ul>
                </li>
                <!-- END POWER OFF -->
            </ul>
            <!-- END X-NAVIGATION VERTICAL -->
            <?= $this->getContent() ?>
        </div>
        <!-- END PAGE CONTENT -->

    </div>
    <!-- END PAGE CONTAINER -->

    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Cerrar <strong>Sesión</strong> ?</div>
                <div class="mb-content">
                    <p>¿Estas seguro de cerrar esta sesión?</p>
                    <p>Pulse No si desea continuar con el trabajo. Pulse Sí para cerrar la sesión del usuario actual.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="<?= $this->url->get('logout') ?>" class="btn btn-success btn-lg">Yes</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->
    
        <?= $this->assets->outputJs('JsIndex') ?>
    
    <!-- Validation form -->
    <?php $jsValidation = $this->assets->collection('jsValidation'); ?>
    <?php if (!empty($jsValidation)) { ?>
        <?=$this->assets->outputJs('jsValidation'); ?>
    <?php } ?>
    <!-- End Validation form -->
    
    <!-- Datatables -->
    <?php $dataTable = $this->assets->collection('jsDataTable');
        if (!empty($dataTable)) {echo $this->assets->outputJs('jsDataTable');}
    ?>
    <!-- END CORE TEMPLATE JS - END -->
    
    <!-- CORE TEMPLATE JS - START -->
    <?php $plugins = $this->assets->collection('jsPlugins');
        if (!empty($plugins)) {echo $this->assets->outputJs('jsPlugins');}
    ?>

    <?php $jsPhotoNotes = $this->assets->collection('jsPhotoNotes'); ?>
    <?php if (!empty($jsPhotoNotes)) { ?>
        <?php echo $this->assets->outputJs('jsPhotoNotes'); ?>
    <?php } ?>
    <?php $jsMasonry = $this->assets->collection('jsMasonry'); ?>
    <?php if (!empty($jsMasonry)) { ?>
        <?php echo $this->assets->outputJs('jsMasonry'); ?>
    <?php } ?>
    <?php $jsGoogle = $this->assets->collection('jsGoogle'); ?>
    <?php if (!empty($jsGoogle) && $this->router->getControllerName()=='process' && ($this->router->getActionName()=='activecourse' || $this->router->getActionName()=='edit')) { ?>
        <script type="text/javascript" src='http://maps.google.com/maps/api/js?sensor=false&libraries=places'></script>
        <?php echo $this->assets->outputJs('jsGoogle'); ?>
    <?php } ?>
    <?php $jsMorris = $this->assets->collection('jsMorris'); ?>
    <?php if (!empty($jsMorris) && $this->router->getControllerName()=='process' && ($this->router->getActionName()=='statistics')) { ?>
        <?php echo $this->assets->outputJs('jsMorris'); ?>
    <?php } ?>
    <?php $jsMorris = $this->assets->collection('jsMorris'); ?>
    <?php if (!empty($jsMorris) && $this->router->getControllerName()=='process' && ($this->router->getActionName()=='statistics')) { ?>
        <?php echo $this->assets->outputJs('jsMorris'); ?>
    <?php } ?>
    <?php $jsScroll = $this->assets->collection('jsScroll'); ?>
    <?php if (!empty($jsScroll) && $this->router->getControllerName()=='client' && ($this->router->getActionName()=='control')) { ?>
        <?php echo $this->assets->outputJs('jsScroll'); ?>
    <?php } ?>

    <script type="text/javascript">
        /*$(function(){
            setTimeout(function(){
                pageLoadingFrame();
            },900);
        });*/
    </script>
</body
</html>