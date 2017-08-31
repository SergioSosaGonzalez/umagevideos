<?php
date_default_timezone_set('America/Mexico_City');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ALL);
//ini_set('display_errors',false);
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

/*Secciones*/
    $router->add('/([0-9-a-zA-Z\-]+)', array(
        'module'=>'frontend',
        'controller'=>'index',
        'action'=>'1'
    ))->setName("controllers")->convert('action', function($action) {
            return \Phalcon\Text::lower(\Phalcon\Text::camelize($action));
    });

 /* inscription */
    $router->add("/inscription", array(
        'module'=>'dashboard',
        'controller' => 'index',
        'action' => 'index',
    ));
    $router->add("/login", array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'index',
    ));
    $router->add("/logout",array(
        'module'=>'dashboard',
        'controller' => 'login',
        'action' => 'logout',
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
