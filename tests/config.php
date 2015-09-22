<?php

class Config
{
    private static $config = array(
        'travis' => array(
            'host' => '127.0.0.1',
            'browser' => 'firefox',
            'browserUrl' => 'http://mail-sender.dev:8080/'
        ),
        'default' => array(
            'host' => '127.0.0.1',
            'browser' => 'firefox',
            'browserUrl' => 'http://mail-sender.dev/'
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
