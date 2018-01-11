<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>UMAEE | DASHBOARD</title>
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/bootstrap.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/font-awesome.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/main.min.css')?>">
    <link rel="stylesheet" href="<?= $this->url->get('dash/css/formValidation.min.css') ?>" media="screen">
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/metisMenu.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/fullcalendar.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/style-switcher.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/jquery.dataTables.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/dashboard.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=$this->url->get('dash/css/sweetalert2.min.css')?>">
    <script src="<?=$this->url->get('dash/js/modernizr.min.js')?>"></script>
  </head>
  <body>
    <div class="bg-dark dk" id="wrap">
      <div id="top">

        <!-- .navbar -->
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <header class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a href="index.html" class="navbar-brand">
                <img src="assets/img/logo.png" alt="">
              </a>
            </header>
            <div class="topnav">
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Fullscreen" data-toggle="tooltip" class="btn btn-default btn-sm" id="toggleFullScreen">
                  <i class="glyphicon glyphicon-fullscreen"></i>
                </a>
              </div>
              <div class="btn-group">
                <div class="dropdown">
                <a data-placement="bottom" data-original-title="E-mail" data-toggle="dropdown" class="btn btn-default dropdown-toggle btn-sm">
                  <i class="fa fa-envelope"></i>
                  <span class="label label-warning">5</span>
                </a>
                  <ul class="dropdown-menu" style="background: ghostwhite">
                    <li style="text-align: center;color: black">
                      <div class="container" style="width: 15pc">
                         <div class="row">
                           <div class="col-md-12">
                             <h6 style="font-weight: bold">Nuevo curso a revision:Nombre del curso</h6>
                           </div>
                         </div>
                      </div>
                    </li>
                    <li style="text-align: center;color: black">
                      <div class="container" style="width: 15pc">
                        <div class="row">
                          <div class="col-md-12">
                            <h6 style="font-weight: bold">Nuevo curso a revision:Nombre del curso</h6>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Messages" href="#" data-toggle="tooltip" class="btn btn-default btn-sm">
                  <i class="fa fa-comments"></i>
                  <span class="label label-danger">4</span>
                </a>
                <a data-toggle="modal" data-original-title="Help" data-placement="bottom" class="btn btn-default btn-sm" href="#helpModal">
                  <i class="fa fa-question"></i>
                </a>
              </div>
              <div class="btn-group">
                <a href="/logout" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm">
                  <i class="fa fa-power-off"></i>
                </a>
              </div>
              <div class="btn-group">
                <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip" class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                  <i class="fa fa-bars"></i>
                </a>
                <a data-placement="bottom" data-original-title="Show / Hide Right" data-toggle="tooltip" class="btn btn-default btn-sm toggle-right"> <span class="glyphicon glyphicon-comment"></span>  </a>
              </div>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">

              <!-- .nav -->
              <ul class="nav navbar-nav">

              </ul><!-- /.nav -->
            </div>
          </div><!-- /.container-fluid -->
        </nav><!-- /.navbar -->
        <header class="head">
          <div class="main-bar">
            <h3>
              <i class="fa fa-dashboard"></i>&nbsp; Dashboard</h3>
          </div><!-- /.main-bar -->
        </header><!-- /.head -->
      </div><!-- /#top -->
      <div id="left">
        <div class="media user-media bg-dark dker">
          <div class="user-media-toggleHover">
            <span class="fa fa-user"></span>
          </div>
          <div class="user-wrapper bg-dark">
            <a class="user-link" href="">
              <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif">
              <span class="label label-danger user-label">16</span>
            </a>
            <div class="media-body">
              <h5 class="media-heading">Archie</h5>
              <ul class="list-unstyled user-info">
                <li> <a href="">Administrator</a>  </li>
                <li>Last Access :
                  <br>
                  <small>
                    <i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- #menu -->
        <ul id="menu" class="bg-blue dker">
          <li class="nav-header">Menu</li>
          <li class="nav-divider"></li>
          <li class="active">
            <a href="/dashboard">
              <i class="fa fa-dashboard"></i><span class="link-title">&nbsp;Dashboard</span>
            </a>
          </li>
          <li class="">
            <a href="/dashboard/category">
              <i class="fa fa-list"></i><span class="link-title">&nbsp;Categorias</span>
            </a>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-user"></i>
              <span class="link-title">Maestros</span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="boxed.html">
                  <i class="fa fa-users"></i>&nbsp; Pendientes </a>
              </li>
              <li>
                <a href="fixed-header-boxed.html">
                  <i class="fa fa-user-o"></i>&nbsp; Autorizados </a>
              </li>
            </ul>
          </li>
          <li class="">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span class="link-title">Cursos</span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="/dashboard/cursos/pendientes">
                  <i class="fa fa-stop-circle"></i>&nbsp; Pendientes </a>
              </li>
              <li>
                <a href="/dashboard/cursos/autorizados">
                  <i class="fa fa-check-square-o"></i>&nbsp; Autorizados</a>
              </li>
            </ul>
          </li>
          <li class="nav-divider"></li>
          <li>
            <a href="login.html">
              <i class="fa fa-sign-in"></i>
              <span class="link-title">
    Login Page
    </span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <i class="fa fa-code"></i>
              <span class="link-title">
    	Unlimited Level Menu
    	</span>
              <span class="fa arrow"></span>
            </a>
            <ul>
              <li>
                <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a>
                <ul>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li>
                    <a href="javascript:;">Level 2  <span class="fa arrow"></span>  </a>
                    <ul>
                      <li> <a href="javascript:;">Level 3</a>  </li>
                      <li> <a href="javascript:;">Level 3</a>  </li>
                      <li>
                        <a href="javascript:;">Level 3  <span class="fa arrow"></span>  </a>
                        <ul>
                          <li> <a href="javascript:;">Level 4</a>  </li>
                          <li> <a href="javascript:;">Level 4</a>  </li>
                          <li>
                            <a href="javascript:;">Level 4  <span class="fa arrow"></span>  </a>
                            <ul>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                              <li> <a href="javascript:;">Level 5</a>  </li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      <li> <a href="javascript:;">Level 4</a>  </li>
                    </ul>
                  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                </ul>
              </li>
              <li> <a href="javascript:;">Level 1</a>  </li>
              <li>
                <a href="javascript:;">Level 1  <span class="fa arrow"></span>  </a>
                <ul>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                  <li> <a href="javascript:;">Level 2</a>  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul><!-- /#menu -->
      </div><!-- /#left -->
        <?= $this->getContent() ?>
      <div id="right" class="bg-light lter">
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Warning!</strong>  Best check yo self, you're not looking too good.
        </div>

        <!-- .well well-small -->
        <div class="well well-small dark">
          <ul class="list-unstyled">
            <li>Visitor <span class="inlinesparkline pull-right">1,4,4,7,5,9,10</span>
            </li>
            <li>Online Visitor <span class="dynamicsparkline pull-right">Loading..</span>
            </li>
            <li>Popularity <span class="dynamicbar pull-right">Loading..</span>
            </li>
            <li>New Users <span class="inlinebar pull-right">1,3,4,5,3,5</span>
            </li>
          </ul>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <button class="btn btn-block">Default</button>
          <button class="btn btn-primary btn-block">Primary</button>
          <button class="btn btn-info btn-block">Info</button>
          <button class="btn btn-success btn-block">Success</button>
          <button class="btn btn-danger btn-block">Danger</button>
          <button class="btn btn-warning btn-block">Warning</button>
          <button class="btn btn-inverse btn-block">Inverse</button>
          <button class="btn btn-metis-1 btn-block">btn-metis-1</button>
          <button class="btn btn-metis-2 btn-block">btn-metis-2</button>
          <button class="btn btn-metis-3 btn-block">btn-metis-3</button>
          <button class="btn btn-metis-4 btn-block">btn-metis-4</button>
          <button class="btn btn-metis-5 btn-block">btn-metis-5</button>
          <button class="btn btn-metis-6 btn-block">btn-metis-6</button>
        </div><!-- /.well well-small -->

        <!-- .well well-small -->
        <div class="well well-small dark">
          <span>Default</span> <span class="pull-right"><small>20%</small> </span>
          <div class="progress xs">
            <div class="progress-bar progress-bar-info" style="width: 20%"></div>
          </div>
          <span>Success</span> <span class="pull-right"><small>40%</small> </span>
          <div class="progress xs">
            <div class="progress-bar progress-bar-success" style="width: 40%"></div>
          </div>
          <span>warning</span> <span class="pull-right"><small>60%</small> </span>
          <div class="progress xs">
            <div class="progress-bar progress-bar-warning" style="width: 60%"></div>
          </div>
          <span>Danger</span> <span class="pull-right"><small>80%</small> </span>
          <div class="progress xs">
            <div class="progress-bar progress-bar-danger" style="width: 80%"></div>
          </div>
        </div>
      </div><!-- /#right -->
    </div><!-- /#wrap -->
    <footer class="Footer bg-dark dker">
      <p>2018 &copy; Chontal Developers</p>
    </footer><!-- /#footer -->

    <!-- #helpModal -->
    <div id="helpModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Modal title</h4>
          </div>
          <div class="modal-body">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
              in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal --><!-- /#helpModal -->

    <script src="<?=$this->url->get('dash/js/jquery.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/formValidation.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/bootstrapV.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/moment.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/jquery-ui.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/fullcalendar.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/jquery.tablesorter.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/jquery.sparkline.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/jquery.flot.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/jquery.flot.selection.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/jquery.flot.resize.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/bootstrap.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/metisMenu.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/screenfull.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/core.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/app.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/dashboard.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/sweetalert2.all.min.js')?>"></script>
    <script src="<?=$this->url->get('dash/js/sweetalert2.min.js')?>"></script>
    <script>
        $(function() {
            Metis.dashboard();
        });
    </script>

  </body>
</html>
