<?php

class DashboardTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://mail-sender.dev');
    }

    /**
     * @dataProvider siteProvider
     */
    public function testSiteTitle($siteUrl, $expectedTitle)
    {
        $this->url($siteUrl);
        $this->assertEquals($expectedTitle, $this->title());
    }

    public function siteProvider()
    {
        return array(
            array('/mail_sender.php', ':: ABC Mail Sender ::'),
            array('/mail_sender.php?page=start', ':: ABC Mail Sender :: start'),
        );
    }

}
