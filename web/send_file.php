<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>:: ABC Mail Sender :: Sending file...</title>
</head>

<body>
<?php

if (empty($_FILES)) {
    die('Zaden plik nie zostal wyslany');
}

if ($_FILES['userfile']['error'] > 0) {
    echo 'Problem: ';
    switch ($_FILES['userfile']['error']) {
        case 1:
            echo 'Rozmiar pliku przekroczył wartość upload_max_filesize';
            break;
        case 2:
            echo 'Rozmiar pliku przekroczył wartość max_file_size';
            break;
        case 3:
            echo 'Plik wysłany tylko częściowo';
            break;
        case 4:
            echo 'Nie wysłano żadnego pliku';
            break;
        case 6:
            echo 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
            break;
        case 7:
            echo 'Failed to write file to disk. Introduced in PHP 5.1.0.';
            break;
        case 8:
            echo 'File upload stopped by extension. Introduced in PHP 5.2.0.';
            break;
    }
    exit;
}

// czy plik ma prawidłowy typ MIME?
if ($_FILES['userfile']['type'] != 'text/plain') {
    echo 'Problem: plik nie zawiera zwykłego tekstu';
    exit;
}

// umieszczenie pliku w pożądanej lokalizacji
$lokalizacja = $_FILES['userfile']['name']; //miedzy ' /send_file/'

if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
    if (!move_uploaded_file($_FILES['userfile']['tmp_name'], $lokalizacja)) {
        echo 'Problem: Plik nie może być skopiowany do katalogu';
        exit;
    }
} else {
    echo 'Problem: możliwy atak podczas wysyłania pliku. Nazwa pliku: ';
    echo $_FILES['userfile']['name'];
    exit;
}

echo '<br /><br /><br /><b>    Plik wysłany! Czekaj...<b><br /><br />';
echo '<meta http-equiv="Refresh" content="0; URL=mail_sender.php?page=add_mails" />';
?>

</body>
</html>
