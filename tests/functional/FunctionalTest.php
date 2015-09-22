<?php

abstract class FunctionalTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $config = Config::getByEnv(getenv('MAIL_SENDER_ENV'));
        $this->setHost($config['host']);
        $this->setBrowser($config['browser']);
        $this->setBrowserUrl($config['browserUrl']);
    }

    protected function prepareDatabase()
    {
        $db = new PDO(
            "mysql:host=localhost;dbname=mail-sender",
            "root", ""
        );

        $stmt = $db->prepare("DELETE FROM mail_sender WHERE mail = 'somenotexisting@email.com'");

        return $stmt->execute();
    }

    public function setUpPage()
    {
        $this->url('/mail_sender.php?page=add_mail');

        $passwordField = $this->byId('pass');
        $passwordField->value('admin');

        $this->byId('OK')->click();
    }
}