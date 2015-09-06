<?php

// ustawenia bazy danych
$dbhost = 'localhost';
$dbname = 'mail-sender';
$dbuser = 'root';
$dbpass = '';

$db = @mysql_connect($dbhost, $dbuser, $dbpass);
if (!$db) {
    die('Nie można się połaczyć: '.mysql_error());
    //die('Przepraszamy w tej chwili serwer jest niedostępny, prosimy o zgłoszenie później.');
}

$sql = 'CREATE DATABASE `'.$dbname.'` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ';
mysql_query($sql) or die(mysql_error());

$dbselect = mysql_select_db($dbname, $db);
if (!$dbselect) {
    die ('Nie można ustawić bazy : '.mysql_error());
    //die('Przepraszamy w tej chwili serwer jest niedostępny, prosimy o zgłoszenie później.');
}

$sql = "CREATE TABLE `mail_content` (
`subject` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'temat maila',
`content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'treść maila'
) ENGINE = MYISAM DEFAULT CHARSET = latin2";
mysql_query($sql) or die(mysql_error());

$sql = " INSERT INTO mail_content (subject, content) VALUES 
('Zapytanie ofertowe', 'Tresc')";
mysql_query($sql) or die(mysql_error());

$sql = " CREATE TABLE `mail_sender` (
  `id` int(8) NOT NULL auto_increment,
  `mail` text NOT NULL,
  `accept_offer` tinyint(1) default '0' COMMENT '0 nie kliknal, 1 TAK, 2 NIE',
  `send_offer` binary(1) default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin2 COMMENT='maile do wysylania ofert' AUTO_INCREMENT=346";
mysql_query($sql) or die(mysql_error());

mysql_close();

echo 'Baza danych zostala poprawnie utworzona, za 5 sekund nastapi przekirowanie na strone glowna
<meta http-equiv="Refresh" content="5; URL=mail_sender.php" />';
?>
