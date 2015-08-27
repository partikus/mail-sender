<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>:: ABC Mail Sender :: Sending mails...</title>
</head>

<body>
<?php
include('function.php');

///////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////
if (count($_SESSION['mails_ok']) <= 0) {
    die('brak maili');
}
echo '<br /><br /><b>Trwa wysyłanie maili i zapisywanie do bazy danych. Proszę czekać...</b>';
$baza = polacz_z_baza();

// pobranie danych dotyczacych maila:
$sql = "SELECT * FROM mail_content";
$result = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_array($result);
$subject = $row['subject'];
$headers = 'MIME-Version: 1.0'."\r\n"; // Naglowki do html:
$headers .= 'Content-type: text/html; charset=utf-8'."\r\n"; // Naglowki do html:
$headers .= 'From: ABC <biuro@abc.com.pl>'."\r\n"; // Dodatkowe nagłówki

//petla do wysyalnia maiali:
for ($i = 0; $i < count($_SESSION['mails_ok']); $i++) {
    $n_mail = $_SESSION['mails_ok'][$i];
    //sprawdza czy unikatowy
    $sql = "SELECT id FROM mail_sender WHERE mail = '$n_mail'";

    $result = mysql_query($sql) or die(mysql_error());
    $row = mysql_fetch_array($result);
//	die('ROW = '.$row);
    if (empty($row)) {
        //zapisuje w bazie
        $sql = "INSERT INTO mail_sender (id, mail) VALUES (NULL, '$n_mail')";
        mysql_query($sql) or die(mysql_error());
        $n_mail_id = mysql_insert_id();

        //wysyła maila
        $message = ''.$row['content'].'<br /><br /><a href="http://www.abc.com.pl/mail_sender/accept_mail.php?id='.$n_mail_id.'&accept=true">TAK</a> / <a href="http://www.abc.com.pl/mail_sender/accept_mail.php?id='.$n_mail_id.'&accept=false">NIE</a>';
        $to = $_SESSION['mails_ok'][$i];
        mail($to, $subject, $message, $headers);
    }
}
mysql_close($baza);
echo '<br /><br /><b>Wysłano!</b>';
echo '<meta http-equiv="Refresh" content="2; URL=mail_sender.php?page=start" />';
?>
</body>
</html>
