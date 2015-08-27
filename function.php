<?php
function polacz_z_baza()
{
    // ustawenia bazy danych
    $dbhost = 'localhost';
    $dbname = 'MAIL_SENDER';
    $dbuser = 'root';
    $dbpass = '';

    $db = @mysql_connect($dbhost, $dbuser, $dbpass);
    if (!$db) {
        die('Nie można się połaczyć: '.mysql_error());
        //die('Przepraszamy w tej chwili serwer jest niedostępny, prosimy o zgłoszenie później.');
    }
    // wybranie bazy
    $dbselect = mysql_select_db($dbname, $db);
    if (!$dbselect) {
        die ('Nie można ustawić bazy : '.mysql_error());
        //die('Przepraszamy w tej chwili serwer jest niedostępny, prosimy o zgłoszenie później.');
    }

    return $db; // id polaczenia z baza danych
}

?>