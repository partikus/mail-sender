<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>:: ABC Mail Sender :: Accept mail</title>
</head>

<body>
<?php

include('function.php');

function accept()
{
    //echo '<br />Dodaj nowego newsa!<br /><br />';
    if (isset($_GET['id'])) {
        $n_id = $_GET['id'];
        // 0 nie kliknal domyslne
        // 1 kliknal tak
        // 2 kliknal nie
        if ($_GET['accept'] == 'true') {
            $n_accept = 1;
            echo '<br /><br /><br /><b>Dodano maila. Oferta zostanie przesłana niebawem. Dziękujemy za zainteresowanie!</b>';
        } else {
            if ($_GET['accept'] == 'false') {
                echo '<br /><br /><br /><b>Mail nie zostanie dodany do bazy. W każdej chwili możecie Państwo zmienić swoje zdanie na temat oferty klikając w mailu TAK.</b>';
                $n_accept = 2;
            }
        }
        $baza = polacz_z_baza();
        $sql = "UPDATE mail_sender SET accept_offer = '$n_accept' WHERE id = $n_id";
        mysql_query($sql) or die(mysql_error());
        mysql_close($baza);

        echo '<meta http-equiv="Refresh" content="5; URL=http://abc.com.pl/" />';
        //echo '<meta http-equiv="Refresh" content="3; URL=cms.php?page=start">';
    } else {
        echo '<meta http-equiv="Refresh" content="0; URL=http://abc.com.pl/" />';
    }
}

accept();
?>
</body>
</html>
