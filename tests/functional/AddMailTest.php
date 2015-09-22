<?php

class AddMailTest extends PHPUnit_Extensions_Selenium2TestCase
{
    protected function setUp()
    {
        $this->setHost('127.0.0.1');
        $this->setBrowser('firefox');
        $this->setBrowserUrl('http://mail-sender.dev');
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

    /**
     * @dataProvider emailScenarios
     */
    public function testAddMail($mail, $expectedMessage, $clearDatabase)
    {
        if ($clearDatabase) {
            $this->prepareDatabase();
        }

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
            array('', 'Niepoprawne mail!', true),
            array('some@', 'Niepoprawne mail!', false),
            array('some@email', 'Niepoprawne mail!', false),
            array('somenotexisting@email.com', 'Maila dodano do bazy!', false),
            array('somenotexisting@email.com', 'Zapytanie ofertowe wysłano ponownie!', false),
        );
    }
}
