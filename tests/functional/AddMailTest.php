<?php

class AddMailTest extends FunctionalTest
{

    /**
     * @dataProvider emailScenarios
     */
    public function testAddingInvalidEmail($email, $expectedMessage)
    {
        $this->addEmailAction($email);

        $this->assertContains($expectedMessage, $this->source());
    }

    public function testAddingValidEmail()
    {
        $this->addEmailAction('somenotexisting@email.com');

        $this->assertContains('Maila dodano do bazy!', $this->source());
    }

    public function testAddingEmailTwice()
    {
        $this->addEmailAction('somenotexisting@email.com');
        $this->addEmailAction('somenotexisting@email.com');

        $this->assertContains('Zapytanie ofertowe wysłano ponownie!', $this->source());
    }

    private function addEmailAction($email)
    {
        $this->url('/mail_sender.php?page=add_mail');

        $emailField = $this->byName('n_mail');
        $emailField->value($email);

        $button = $this->byName('add_mail');

        $button->click();
    }

    public function emailScenarios()
    {
        return array(
            array('', 'Niepoprawne mail!'),
            array('some@', 'Niepoprawne mail!'),
            array('some@email', 'Niepoprawne mail!'),
        );
    }
}
