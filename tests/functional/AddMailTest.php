<?php

class AddMailTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://mail-sender.dev');
    }

    public function setUpPage()
    {
        $this->url('/mail_sender.php?page=add_mail');

        $passwordField = $this->byId('pass');
        $passwordField->value('admin');

        $this->byId('OK')->click();
    }

    /**
     * @dataProvider emailScenarios
     */
    public function testAddMail($mail, $expectedMessage)
    {
        $this->url('/mail_sender.php?page=add_mail');

        $emailField = $this->byName('n_mail');
        $emailField->value($mail);

        $button = $this->byName('add_mail');

        $button->click();

        $this->assertContains($expectedMessage, $this->source());
    }

    public function emailScenarios()
    {
        return array(
            array('', 'Niepoprawne mail!'),
            array('some@', 'Niepoprawne mail!'),
            array('some@email', 'Niepoprawne mail!'),
            array('some@email.com', 'Maila dodano do bazy!'),
            array('some@email.com', 'Zapytanie ofertowe wysłano ponownie!'),
        );
    }
}
