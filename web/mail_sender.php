<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>:: ABC Mail Sender ::</title>
    <style type="text/css">
        a:link {
            text-decoration: none;
            color: #294256;
        }

        a:visited {
            text-decoration: none;
            color: #294256;
        }

        a:hover {
            text-decoration: underline;
            color: #294256;
        }

        a:active {
            text-decoration: none;
            color: #294256;
        }

        body {
            background-color: #CCCCCC;

        }

        .styl1 {
            font-size: 10px;
            font-family: Verdana, Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>

<table width="700" border="0" align="center">
    <tr>
        <td>
            <div>
                <a href="mail_sender.php?page=logout">Wyloguj</a><br/>
            </div>

            <?php
            include('function.php');

            function login()
            {
                echo '<br /><br /><form id="form1" name="form1" method="post" action="mail_sender.php">
	hasło: <input type="password" name="pass" id="pass" />
	<input type="submit" name="OK" id="OK" value="OK" />
	</form>';
            }

            function logout($web)
            {
                session_destroy();
                echo '<meta http-equiv="Refresh" content="0; URL='.$web.'" />';
            }

            function cms_help()
            {
                echo '<b>OPIS FUNKCJI: </b><br /><br />
		<b>Start</b> - umożliwia powrót do pierwszej strony.<br /><br />
		<b>Dodaj maile</b> - umożliwia masowe dodanie do bazy maili i wysłanie zapytań. Pamiętaj, aby plik z mailami miał nazwę maile.txt i odpowiedni format: mail@domena.pl; mail2@domena.pl (adresy rozdzielone średnikiem i spacją). Jeśli mail jest już w bazie nie zostanie on ponownie dodany! Jeśli mimo to chcesz przesłać zapytanie na mail znajdujący się już w bazie użyj opcji "dodaj mail". Po wybraniu z dysku pliku kliknij "wyślij", następnie sprawdź czy maile zostały poprawnie odczytane. Zielone "[ OK ]" świadczy o poprawnym odczytaniu maila, czerwone [ ERROR ] oznacza że dany mail zostanie pominięty. Po sprawdzeniu, jeśli uznasz, że plik trzeba poprawić ponownie wybierz plik z dysku i go załaduj, jeśli jednak maile załadowane zostały poprawnie kliknij "wyślij oferty!". Następnie maile zostaną zapisane w bazie i pod każdy nowo dodany niepowtarzający się adres zostanie wysłane unikatowe zapytanie ofertowe. Rezultat działania skryptu możesz oglądać w zakładkach "Pokaż..."<br /><br />
		<b>Dodaj maila</b> - umożliwia dodawanie nowego adresu do bazy i wysłanie na adres zapytania ofertowego. Aby dodać maila wpisz adres w pole i kliknij generuj. Następnie mail zostanie zapisany w bazie oraz zostanie wysłane unikatowe zapytanie ofertowe. Rezultat działania skryptu możesz oglądać w zakładkach "Pokaż..." Mail zostanie dodany do bazy nawet jeśli identyczny znajduje się już w bazie (zostanie on zamieniony).<br /><br />
		<b>Wszystkie</b> - Wyświetla wszystkie maile w bazie.<br /><br />
		<b>TAK</b> - Wyświetla te maile, których właściciele wyrazili chęć otrzymania oferty. Można je teraz skopiować i wysłać pełną ofertę.<br /><br />
		<b>NIE</b> - Wyświetla te maile, których własciciele nie wyrazili chęci otrzymania pełnej oferty.<br /><br />
		<b>Niekliknięte</b> - Wyświetla te maile na które własciciel nie odpowiedział. Nie kliknął TAK, NIE, lub mail nie dotarł do klienta<br /><br />
		<b>Zmień @</b> - umożliwia zmianę treści maila. Wpisz TEMAT i TREŚĆ. Jeśli chcesz przejść do nowej lini kliknij enter, kreator sam zmieni składnie na HTML ową. Kliknij Aktualizuj. Do maila standardowo dołączane będą przyciski TAK / NIE na końcu. Aby sprawdzić poprawność przejdx do DODAJ MAILA i dodaj swojego maila.<br /><br />
		<b>Help</b> - informacje o MAIL SENDER.<br /><br />
		<b>Główna</b> - wylogowuje i przechodzi do strony abc.com.pl.<br /><br />
		<b>Wyloguj</b> - wylogowuje i przechodzi do CMSa<br /><br /><br />
		
		UWAGI KOŃCOWE<br /><br />
	
		<b><font color="red" >Pamiętaj o wylogowaniu!!</font></b><br />Jesli zostawisz ten moduł osobom niepowołanym mogą one uszkodzić w sposób nieodwracalny stronę, skasowac treść itp. Wysyłając setki maili mogą przyczynić się do zniszczenia dobrego wizerunku firmy. <b>Za wszelkie szkody powstałe na skutek niepowołanego użycia tego modułu twórcy nie biorą jakiejkolwiek odpowiedzialności.</b> Zawsze po zakończeniu pracy z panelem wyloguj się! (wystarczy kliknąć w baner)<br /><br />
	
		Jeśli coś by nie działało kontakt: <img src="http://kni.prz.edu.pl/fd/mail.gif" width="113" height="17" alt="mail" />
		Najlepiej zrobić screena i opisać problem.<br />
		Wszelkie sugestie także na maila.<br /><br />
	
		<p align="right">Miłego użytkowania panelu - <i>Dominik</i></p>';
            }

            function menu()
            {
                echo 'Użytkownik:<b> '.$_SESSION['user'].'</b>
	<p align="right">
	<a href="mail_sender.php?page=start">Start</a> 
	| <a href="mail_sender.php?page=add_mails">Dodaj maile</a> 
	| <a href="mail_sender.php?page=add_mail">Dodaj maila</a> 
	| <a href="mail_sender.php?page=show_all">Wszystkie</a> 
	| <a href="mail_sender.php?page=show_yes">TAK</a> 
	| <a href="mail_sender.php?page=show_no">NIE</a> 
	| <a href="mail_sender.php?page=show_no_click">Niekliknięte</a>
	| <a href="mail_sender.php?page=edit_mail_content">Zmień @</a>
	 
	| <a href="mail_sender.php?page=help">Help</a> 
	| <a href="mail_sender.php?page=logout_glowna">Główna</a> 
	| <b><a href="mail_sender.php?page=logout">Wyloguj</a></b>
	</p>
	';
            }

            function  walidacja_email($email)
            {
                if (!eregi(
                    "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$",
                    $email
                )
                ) // wyrażnie regularne sprawdzające poprawność maila (string@string.xx, string@string.xx.xx, string@string.xxx.xx  itd)
                {
                    return false;
                } else {
                    return true;
                }
            }

            function add_mails()
            {

                echo '1. <b>Wczytaj plik: </b>	(plik musi być typu <b>.txt</b>, miec nazwę <b>maile</b> Pamiętaj o formacie pliku: maile oddzielone średnikiem i spacją! czyli:  nazwa@domena.pl; nazwa2@domena.pl; nazwa3@domena.pl;)<br /><br />
		<form enctype="multipart/form-data" action="send_file.php" method="post">
		<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
		<input name="userfile" type="file" />
		<input type="submit" value="Wyślij" />
		</form>
		2. <b>Sprawdź dane</b> (każdy mail powinien znajdować się w osobnej linijce).<br /><br />';

                $file_name = 'maile.txt'; // plik z emailami, emaile muszą być rozdzielone średnikiem (nazwa@mail.pl; nazwa@mail.com)

                // funkcja sprawdzająca poprawność emaila

                if (is_file($file_name)) {
                    $file = file_get_contents($file_name); // odczytanie całego pliku do zmiennej
                    if (!$file) // sprawdzenie, czy plik został odczytany poprawnie
                    {
                        die('Nie mozna odczytac pliku!');
                    }
                    $mails = explode(";", $file); // rozbicie maili do tablicy
                    $_SESSION['mails_ok'] = array();// stworzenie nowej tablicy z poprawnymi mailami
                    for ($i = 0; $i < count($mails); $i++) // pętla przechodzi po całej tablicy z mailami
                    {
                        $mail = $mails[$i]; // przepisanie maila do zmiennej pomocniczej
                        $mail = trim($mail); // usunięcie bałych znaków z maila (spacji)
                        $mail = htmlspecialchars($mail); // usuniecie znaczinkow html i php
                        if (!empty($mail)) // sprawdzenie, czy string nie jest pusty (np. w przypadku podwójnego średnika: ;;)
                        { // wypisanie maili z komentarzem czy są poprawne czy nie
                            $do_wypisania = '[ '.$i.' ] '.$mail;
                            if (walidacja_email($mail)) {
                                $do_wypisania .= ' <font color="green">[ OK ]</font> ';
                                array_push($_SESSION['mails_ok'], $mail);
                            } else {
                                $do_wypisania .= ' <b><font color="red">[ ERROR ]</font>- mail będzie pominięty! </b>';
                            }
                            $do_wypisania .= '<br />';
                            echo $do_wypisania;
                        }
                    }
                    if (!unlink($file_name)) // usunięcie pliku wraz ze sprawdzeniem, czy plik zotał poprawnie usunięty
                    {
                        die('Nie mozna usunac pliku!');
                    }
                    echo '<br />3. <b>Wyślij lub dodaj plik ponownie</b> (kliknij WYŚLIJ OFERTY, lub jeśli niepoprawne popraw plik i załaduj go ponownie).<br /><br /><form id="form3" name="nowy" method="post" action="save_and_send_mail.php">
		<input type="submit" name="mail_ok" value="Wyślij oferty!" />
		</form>';
                }
            }

            function add_mail()
            {
                echo '<b>Wpisz adres e-mail</b> i kliknij Dodaj maila!<br />
		<br /><form id="form2" name="nowy" method="post" action="mail_sender.php?page=add_mail">
		<input type="text" name="n_mail" size="45" />
		<input type="submit" name="add_mail" value="Dodaj maila" />
		</form>';
                if (isset($_POST['add_mail'])) {
                    $n_mail = $_POST['n_mail'];
                    $n_mail = trim($n_mail); // usunięcie bałych znaków z maila (spacji)
                    $n_mail = htmlspecialchars($n_mail); // usuniecie znaczinkow html i php

                    if (walidacja_email($n_mail)) {
                        $baza = polacz_z_baza();
                        $sql = "SELECT id FROM mail_sender WHERE mail = '$n_mail'";

                        $result = mysql_query($sql) or die(mysql_error());
                        $row = mysql_fetch_array($result);
                        if (empty($row)) {
                            //zapisuje w bazie
                            $sql = "INSERT INTO mail_sender (id, mail) VALUES (NULL, '$n_mail')";
                            mysql_query($sql) or die(mysql_error());
                            $n_mail_id = mysql_insert_id();
                            echo '<b>Maila dodano do bazy!</b><br /><br />';
                        } else {
                            $n_mail_id = $row['id'];
                            $sql = "UPDATE mail_sender SET accept_offer = 0 WHERE mail =  '$n_mail'";
                            mysql_query($sql) or die(mysql_error());
                            echo '<b>Zapytanie ofertowe wysłano ponownie!</b><br /><br />';
                        }
                        //wysyła maila
                        $sql = "SELECT * FROM mail_content";
                        $result = mysql_query($sql) or die(mysql_error());
                        $row = mysql_fetch_array($result);
                        $subject = $row['subject'];
                        $message = ''.$row['content'].'<br /><br /><a href="http://www.abc.com.pl/mail_sender/accept_mail.php?id='.$n_mail_id.'&accept=true">TAK</a> / <a href="http://www.abc.com.pl/mail_sender/accept_mail.php?id='.$n_mail_id.'&accept=false">NIE</a>';
                        $to = $n_mail;
                        $headers = 'MIME-Version: 1.0'."\r\n"; // Naglowki do html:
                        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n"; // Naglowki do html:
                        $headers .= 'From: ABC <biuro@abc.com.pl>'."\r\n"; // Dodatkowe nagłówki
                        mail($to, $subject, $message, $headers);

                        mysql_close($baza);
                        echo '<meta http-equiv="Refresh" content="2; URL=mail_sender.php?page=start" />';
                    } else {
                        echo '<b><font color="red">Niepoprawne mail!</b></font>';
                    }
                }
            }


            function show_all()
            {
                $baza = polacz_z_baza();
                $sql = 'SELECT * FROM mail_sender';
                $result = mysql_query($sql) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                    //echo 'ID: ' . $row['id'] . ', mail: ' . $row['mail'];
                    echo ''.$row['mail'].'';
                    echo '<form id="'.$row['id'].'" name="n_ID" method="POST" action="mail_sender.php?page=show_all">
		<input type="hidden" name="id" value="'.$row['id'].'" />
		<input type="submit" name="delete" value="Usuń" />
		</form>';
                }

                if (isset($_POST['delete'])) {
                    $n_ID = $_POST['id'];
                    $sql = "DELETE FROM mail_sender WHERE id = $n_ID";
                    mysql_query($sql) or die(mysql_error());
                    echo '<b>Usunięto!</b>';
                    echo '<meta http-equiv="Refresh" content="0; URL=mail_sender.php?page=show_all" />';
                }

                mysql_free_result($result);
                mysql_close($baza);
            }

            function show_yes()
            {
                $baza = polacz_z_baza();
                $sql = 'SELECT * FROM mail_sender WHERE accept_offer = 1 ';
                $result = mysql_query($sql) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                    //echo 'ID: ' . $row['id'] . ', mail: ' . $row['mail'];
                    echo ''.$row['mail'].'<br />';
                }
                mysql_free_result($result);
                mysql_close($baza);
            }

            function show_no()
            {
                $baza = polacz_z_baza();
                $sql = 'SELECT * FROM mail_sender WHERE accept_offer = 2 ';
                $result = mysql_query($sql) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                    //echo 'ID: ' . $row['id'] . ', mail: ' . $row['mail'];
                    echo ''.$row['mail'].'<br />';
                }
                mysql_free_result($result);
                mysql_close($baza);
            }

            function show_no_click()
            {
                $baza = polacz_z_baza();
                $sql = 'SELECT * FROM mail_sender WHERE accept_offer = 0 ';
                $result = mysql_query($sql) or die(mysql_error());
                while ($row = mysql_fetch_array($result)) {
                    //echo 'ID: ' . $row['id'] . ', mail: ' . $row['mail'];
                    echo ''.$row['mail'].'<br />';
                }
                mysql_free_result($result);
                mysql_close($baza);
            }

            function edit_mail_content()
            {
                $baza = polacz_z_baza();
                $sql = "SELECT * FROM mail_content";
                $result = mysql_query($sql) or die(mysql_error());
                $row = mysql_fetch_array($result);
                $row['content'] = str_replace('<br />', "\n", $row['content']);

                echo '
		<form name="edit_mail_content" method="post" action="mail_sender.php?page=edit_mail_content">
		<b>Temat:</b><br />
		<input type="text" name="n_subject" value="'.$row['subject'].'" /><br />
		<b>Treść:</b><br />
		<textarea  name="n_content" cols="35" rows="5">'.$row['content'].' </textarea><br />
		<input type="submit" name="OK8" value="Aktualizuj" />
		</form>';

                if (isset($_POST['OK8'])) {
                    $n_subject = $_POST['n_subject'];
                    $n_content = $_POST['n_content'];
                    $n_content = str_replace("\n", '<br />', $n_content);

                    $sql = "UPDATE mail_content SET subject = '$n_subject', content = '$n_content'";
                    mysql_query($sql) or die(mysql_error());
                    mysql_close($baza);
                    echo '<b>Edytowano!</b>';
                    echo '<meta http-equiv="Refresh" content="1; URL=mail_sender.php?page=edit_mail_content" />';

                } else {
                    mysql_close($baza);
                }
            }

            /////////////////////////////////////////////////////////////////////////////////////////////

            if (isset($_POST['pass'])) {
                switch (sha1($_POST['pass'])) {
                    case 'd033e22ae348aeb5660fc2140aec35850c4da997': //admin
                        $_SESSION['user'] = 'admin';
                        break;
                    case 'fb360f9c09ac8c5edb2f18be5de4e80ea4c430d0': //zalogowany
                        $_SESSION['user'] = 'zalogowany';
                        break;
                    default:
                        session_destroy();
                        $_SESSION['user'] = '1';
                }
            }

            if (!isset($_SESSION['user']) || $_SESSION['user'] == '0') // niezalogowany / pierwszy raz
            {
                login();
            } elseif ($_SESSION['user'] == '1') // zle haslo
            {
                echo '<b><font color="red">Niepoprawne hasło!</b></font>';
                login();
            } elseif (($_SESSION['user'] != '1') && ($_SESSION['user'] != '0')) // haslo poprawne
            {
                if (!isset($_GET['page'])) {
                    menu();
                    echo 'Wybierz pozycje z menu.';
                } else {
                    switch ($_GET['page']) {
                        case 'logout':
                            logout('mail_sender.php');
                            break;
                        case 'logout_glowna':
                            session_destroy();
                            echo '<meta http-equiv="Refresh" content="0; URL=http://abc.com.pl" />';
                            break;
                        case 'add_mail':
                            menu();
                            add_mail();
                            break;
                        case 'add_mails':
                            menu();
                            add_mails();
                            break;
                        case 'show_all':
                            menu();
                            show_all();
                            break;
                        case 'show_yes':
                            menu();
                            show_yes();
                            break;
                        case 'show_no':
                            menu();
                            show_no();
                            break;
                        case 'show_no_click':
                            menu();
                            show_no_click();
                            break;
                        case 'edit_mail_content':
                            menu();
                            edit_mail_content();
                            break;
                        case 'help':
                            menu();
                            cms_help();
                            break;
                        case 'start':
                            menu();
                            echo 'Wybierz pozycje z menu.';
                            break;
//			default:
//				echo'domyslnie';
//				menu();
                    }
                }
            }
            echo '<br /><br /><br /><br />';
            ?>

        </td>
    </tr>
</table>
<p align="center" class="styl1">MAIL SENDER created 2008</p>
</body>
</html>
