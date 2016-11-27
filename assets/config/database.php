<?php
/*
return array(
    'default' => array(
        'database' => 'phpixie',
        'user'     => 'phpixie',
        'password' => 'phpixie',
        'adapter'  => 'mysql', // one of: mysql, pgsql, sqlite
        'driver'   => 'pdo'
    )
);*/

return [
    'default' => [
        'driver'     => 'pdo',
        'connection' => 'sqlite:/var/www/w-code.loc/assets/database/wcodedatabase_0001.sqlite',
    ]
];