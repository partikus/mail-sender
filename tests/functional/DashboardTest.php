<?php

class DashboardTest extends FunctionalTest
{
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
