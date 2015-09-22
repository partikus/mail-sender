<?php

class AddMailTest extends FunctionalTest
{
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
