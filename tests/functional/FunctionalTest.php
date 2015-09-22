<?php

abstract class FunctionalTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $config = Config::getByEnv(getenv('MAIL_SENDER_ENV'));
        $this->setHost($config['host']);
        $this->setBrowser($config['browser']);
        $this->setBrowserUrl($config['browserUrl']);
        $this->prepareDatabase();
    }

    protected function prepareDatabase()
    {
        $config = Config::getByEnv(getenv('MAIL_SENDER_ENV'));
        $db = new PDO(
            sprintf("mysql:host=%s;dbname=%s", $config['db_host'], $config['db_name']),
            $config['db_user'], $config['db_pass']
        );

        $db->beginTransaction();
        $db->prepare("DELETE FROM mail_sender")->execute();
        $db->prepare("DELETE FROM mail_content")->execute();
        $db->commit();
    }

    public function setUpPage()
    {
        $this->url('/mail_sender.php?page=add_mail');

        $passwordField = $this->byId('pass');
        $passwordField->value('admin');

        $this->byId('OK')->click();
    }
}