<?php

class Config
{
    private static $config = array(
        'travis' => array(
            'host' => '127.0.0.1',
            'browser' => 'firefox',
            'browserUrl' => 'http://localhost:8080/',
            'db_host' => '127.0.0.1',
            'db_name' => 'mail-sender',
            'db_user' => 'root',
            'db_pass' => '',

        ),
        'default' => array(
            'host' => '127.0.0.1',
            'browser' => 'firefox',
            'browserUrl' => 'http://mail-sender.dev/',
            'db_host' => '127.0.0.1',
            'db_name' => 'mail-sender',
            'db_user' => 'root',
            'db_pass' => '',
        ),
    );

    public static function getByEnv($env)
    {
        if (!isset(self::$config[$env])) {
            return self::$config['default'];
        }

        return self::$config[$env];
    }
}
