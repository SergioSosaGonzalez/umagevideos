<?php
namespace Modules\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

class Module implements ModuleDefinitionInterface
{
    /**
     * Registers the module auto-loader
     */
    public function registerAutoloaders(\Phalcon\DiInterface $di= NULL)
    {

        $loader = new Loader();

        $loader->registerNamespaces(array(
            'Modules\Frontend\Controllers' => __DIR__ . '/controllers/',
            'Modules\Models' => __DIR__ . '/../../models/',
            'Modules\Models\Entities' => __DIR__ . '/../../models/entities/',
            'Modules\Models\Services' => __DIR__ . '/../../models/services/',
            'Modules\Models\Repositories' => __DIR__ . '/../../models/repositories/',
            'Modules\Frontend\Plugins'=>__DIR__.'/plugins/'
        ));

        $loader->register();
    }

    public function registerServices(\Phalcon\DiInterface $di)
    {
        /**
         * Read configuration
         */
        $config = include dirname(dirname(dirname(__DIR__))) . "/apps/config/config.php";

        $di->set(
            'dispatcher',
            function() use ($di) {
                $dispatcher = new Dispatcher();
                $dispatcher->setDefaultNamespace('Modules\Frontend\Controllers');
                return $dispatcher;
            },
            true
        );
        $di->set('view', function() use ($config) {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            $view->registerEngines(array(
                '.volt' => function ($view, $di) use ($config) {

                        $volt = new VoltEngine($view, $di);

                        $volt->setOptions(array(
                            'compiledPath' => $config->application->cacheDir,
                            'compiledSeparator' => '_'
                        ));

                        return $volt;
                    },
                '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
            ));

            return $view;
        });

        $di->set('dispatcher', function() use ($di){
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace("Modules\Frontend\Controllers\\");
            $eventsManager = $di->getShared('eventsManager');
            $security = new Plugins\Security($di);
            $eventsManager->attach('dispatch', $security);
            $dispatcher->setEventsManager($eventsManager);
            return $dispatcher;
        });





        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config) {
            return new \Phalcon\Db\Adapter\Pdo\Mysql(array(
                "host" => $config->database->mysql->host,
                "username" => $config->database->mysql->username,
                "password" => $config->database->mysql->password,
                "dbname" => $config->database->mysql->dbname,
                'charset'   =>'utf8',
                "options"  => array(\PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true)
            ));
        };

        $di->set('collectionManager', function(){
            return new \Phalcon\Mvc\Collection\Manager();
        }, true);
        //MongoDB Database
        $di['mongo'] = function() use ($config){
            if (!$config->database->mongo->username OR !$config->database->mongo->password) {
                $mongo = new \MongoClient('mongodb://' . $config->database->mongo->host);
            } else {
                $mongo = new \MongoClient("mongodb://" . $config->database->mongo->username . ":" . $config->database->mongo->password . "@" . $config->database->mongo->host, array("db" => $config->database->mongo->dbname));
            }

            return $mongo->selectDB($config->database->mongo->dbname);
        };
    }

}
