<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ALL);
ini_set('display_errors',true);
//error_reporting(0);

$di = new \Phalcon\DI\FactoryDefault();

$di->set('url', function(){
    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri("http://".$_SERVER["SERVER_NAME"]."/");
    return $url;
});

$di->set('router', function(){

    $router = new \Phalcon\Mvc\Router();
    $router->setDefaultModule("frontend");

    $router->add("/", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'index',
    ));


    $router->add("/hybridauth", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'hybridauth',
    ));
    $router->add("/authsocial/([0-9-a-zA-Z\-]+)", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'authsocial',
        'login'=>1
    ));
    $router->add("/newclient", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'newclient',
    ));

    $router->add("/loginclient", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'loginclient',
    ));


    $router->add("/logoutclient", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'logoutclient'
    ));

    /*Secciones*/
    $router->add('/([0-9-a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'controller'=>'index',
        'action'=>'1'
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });

    $router->add("/user", array(
        'module'=>'frontend',
        'controller' => 'user',
        'action' => 'index',
    ));
    $router->add("/changestatus", array(
        'module'=>'frontend',
        'controller' => 'user',
        'action' => 'changestatus',
    ));


    $router->add("/instructor", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'index',
    ));

    $router->add("/instructor/crear-curso", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'crearcurso',
    ));
    $router->add("/instructor/crear-curso/editar-curso/([0-9-a-zA-Z\-]+)", array(
            'module'=>'frontend',
            'controller' => 'provider',
            'action' => 'editcourse',
            'courid'=>1
        ));
        $router->add("/uploadimage", array(
            'module'=>'frontend',
            'controller' => 'index',
            'action' => 'uploadimage'
        ));
    $router->add("/deleteimage", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'deleteimage'
    ));
    $router->add("/instructor/crear-curso/updatecourse", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'updatecourse'
    ));

    $router->add("/instructor/consultsubcategory", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'consultsubcategory'
    ));
    $router->add("/validateurl", array(
            'module'=>'frontend',
            'controller' => 'provider',
            'action' => 'validateurl'
        ));
    $router->add("/instructor/crear-curso/newcourse", array(
            'module'=>'frontend',
            'controller' => 'provider',
            'action' => 'newcourse'
        ));
    $router->add("/instructor/crear-curso/temario/([0-9-a-zA-Z\-]+)", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'temary',
        'couid'=>1
    ));

    $router->add("/instructor/crear-curso/temario/newtemary", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'newtemary'
    ));
    $router->add("/instructor/crear-curso/temario/consulttemary", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'consulttemary'
    ));
    $router->add("/instructor/crear-curso/temario/edittemary", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'edittemary'
    ));
    $router->add("/instructor/crear-curso/deletecourses", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'deletescourses'
    ));
    $router->add("/instructor/crear-curso/subtemario/([0-9-a-zA-Z\-]+)", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'subtemary',
        'temid'=>1
    ));
    $router->add("/instructor/crear-curso/subtemario/newsubtemary", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'newsubtemary'
    ));
    $router->add("/instructor/crear-curso/subtemario/editsubtemary", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'editsubtemary'
    ));

    $router->add("/instructor/crear-curso/subtemario/ver-video/([0-9-a-zA-Z\-]+)", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'vervideos',
        'subtemid'=>1
    ));

    $router->add("/instructor/crear-curso/cambiar-status", array(
        'module'=>'frontend',
        'controller' => 'provider',
        'action' => 'changestatus'
    ));
    $router->add("/validate-email", array(
        'module'=>'frontend',
        'controller' => 'index',
        'action' => 'validateemail'
    ));

    /* inscription */
    $router->add("/dashboard", array(
        'module'=>'dashboard',
        'controller' => 'index',
        'action' => 'index',
    ));

    $router->add("/login", array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'index',
    ));
    $router->add("/iniciarsesion", array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'iniciosesion',
    ));

    $router->add("/logout",array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'logout',
    ));


    $router->add("/dashboard/validateurl", array(
            'module'=>'dashboard',
            'controller' => 'index',
            'action' => 'validateurl',
    ));

    $router->add("/dashboard/category", array(
        'module'=>'dashboard',
        'controller' => 'category',
        'action' => 'index',
    ));

    $router->add("/dashboard/newcategory", array(
            'module'=>'dashboard',
            'controller' => 'category',
            'action' => 'newcategory',
        ));
    $router->add("/dashboard/seecategory", array(
        'module'=>'dashboard',
        'controller' => 'category',
        'action' => 'seecategory',
    ));
    $router->add("/dashboard/editcategory", array(
        'module'=>'dashboard',
        'controller' => 'category',
        'action' => 'editcategory',
    ));

    $router->add("/dashboard/category/subcategory/([0-9-a-zA-Z\-]+)", array(
        'module'=>'dashboard',
        'controller' => 'category',
        'action' => 'subcategory',
        'catid'=>1
    ));

    $router->add("/dashboard/newsubcategory", array(
        'module'=>'dashboard',
        'controller' => 'category',
        'action' => 'newsubcategory',
    ));
    $router->add("/dashboard/editsubcategory", array(
        'module'=>'dashboard',
        'controller' => 'category',
        'action' => 'editsubcategory',
    ));

    $router->add("/dashboard/cursos/pendientes", array(
        'module'=>'dashboard',
        'controller' => 'courses',
        'action' => 'index',
    ));

    $router->add("/dashboard/cursos/pendientes/ver-temario/([0-9-a-zA-Z\-]+)", array(
        'module'=>'dashboard',
        'controller' => 'courses',
        'action' => 'vistatemario',
        'couid'=>1
    ));

    $router->add("/dashboard/operations-dashboard", array(
        'module'=>'dashboard',
        'controller' => 'index',
        'action' => 'extrasoperations'
    ));
    $router->add("/dashboard/cursos/autorizados", array(
            'module'=>'dashboard',
            'controller' => 'courses',
            'action' => 'authorizedcourse'
    ));

    return $router;
});

/**
 * Start the session the first time some component request the session service
 */
$di->set('dispatcher', function() use ($di){
    $dispatcher = new \Phalcon\Mvc\Dispatcher();
    $eventsManager = $di->getShared('eventsManager');
    $security = new Security($di);
    $security->setWorkFactor(50);
    $eventsManager->attach('dispatch', $security);
    $dispatcher->setEventsManager($eventsManager);

    return $dispatcher;
});

$di->set('session', function () {
    $session = new Phalcon\Session\Adapter\Files();
    $session->start();

    return $session;
});
$di->set('collectionManager', function(){
    return new Phalcon\Mvc\Collection\Manager();
}, true);

$application = new \Phalcon\Mvc\Application();
$di->set('cookies', function () {
    $cookies = new Phalcon\Http\Response\Cookies();
    $cookies->useEncryption(false);
    return $cookies;
});
//Pass the DI to the application
$application->setDI($di);

//Register the installed modules
$application->registerModules(array(
            'frontend' => array(
                'className' => 'Modules\Frontend\Module',
                'path' =>'../apps/modules/frontend/Module.php'
            ),
            'dashboard' => array(
                'className' => 'Modules\Dashboard\Module',
                'path' =>'../apps/modules/dashboard/Module.php'
            )
        ));
echo $application->handle()->getContent();
