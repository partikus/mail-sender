<?php

class IndexTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://mail-sender.dev');
    }

    public function testTitle()
    {
        $this->url('/mail_sender.php');
        $this->assertEquals(':: ABC Mail Sender ::', $this->title());
    }
}
