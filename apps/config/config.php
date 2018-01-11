<?php
return new \Phalcon\Config(array(
    'database' => array(
        "mysql"=>array(
            'adapter'     => 'Mysql',
            'host'        => 'localhost',
            'username'    => 'root',
            'password'    => 'admin',
            'dbname'      => 'cd_umaevideos',
        ),
        "mongo"=>array(
            'host'        => '127.0.0.1',
            'username'    => 'root',
            'password'    => '',
            'dbname'      => 'cd_umaeeS',
        )
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../../app/controllers/',
        'modelsDir'  => __DIR__ . '/../../app/models/',
        'viewsDir'   => __DIR__ . '/../../app/views/',
        'pluginsDir'     => __DIR__ . '/../../app/plugins/',
        'libraryDir'     => __DIR__ . '/../../app/library/',
        'cacheDir'   => __DIR__ . '/../../app/cache/',
        'baseUri'        => '/umaee_system/',
    )
));