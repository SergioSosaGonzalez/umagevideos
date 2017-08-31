<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><a href="#">inicio</a></li>
    <li class="active">Menú principal</li>
</ul>
<!-- END BREADCRUMB -->

<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

<!-- START WIDGETS -->
<div class="row">
    <div class="col-md-3">
        <!-- START WIDGET MESSAGES -->
        <div class="widget widget-default widget-item-icon " style="cursor:pointer" onclick="location.href='/';">
            <div class="widget-item-left">
                <i class="fa fa-pencil-square-o"></i>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><span class="fa fa-envelope"></span></div>
                <div class="widget-title">Enviar mensajes</div>
                <div class="widget-subtitle">a todos los usuarios</div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET MESSAGES -->
    </div>
    <div class="col-md-3">

        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon" style="cursor:pointer" onclick="location.href='<?=$this->url->get('inscription/client/new')?>';">
            <div class="widget-item-left">
                <span class="fa fa-user"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><span class="fa fa-users"></span></div>
                <div class="widget-title">Alta Cliente</div>
                <div class="widget-subtitle">Nuevo</div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET REGISTRED -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET REGISTRED -->
        <div class="widget widget-default widget-item-icon" style="cursor:pointer" onclick="location.href='<?=$this->url->get('inscription/clients')?>';">
            <div class="widget-item-left">
                <span class="fa fa-list"></span>
            </div>
            <div class="widget-data">
                <div class="widget-int num-count"><span class="fa fa-list-ol"></span></div>
                <div class="widget-title">Lista de clientes</div>
                <div class="widget-subtitle">Clientes registrados</div>
            </div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
        </div>
        <!-- END WIDGET REGISTRED -->

    </div>
    <div class="col-md-3">

        <!-- START WIDGET CLOCK -->
        <div class="widget widget-danger widget-padding-sm">
            <div class="widget-big-int plugin-clock">00:00</div>
            <div class="widget-subtitle plugin-date">Cargando...</div>
            <div class="widget-controls">
                <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
            </div>
            <div class="widget-buttons widget-c3">
                <div class="col">
                    <a href="#"><span class="fa fa-clock-o"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-bell"></span></a>
                </div>
                <div class="col">
                    <a href="#"><span class="fa fa-calendar"></span></a>
                </div>
            </div>
        </div>
        <!-- END WIDGET CLOCK -->

    </div>
</div>
<!-- END WIDGETS -->

</div>
<!-- END PAGE CONTENT WRAPPER -->
