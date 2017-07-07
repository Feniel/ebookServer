<?php
include_once '../includes/functions.php';
include_once '../includes/db_connect.php';

sec_session_start();

$user = $_SESSION['username'];
$con = mysqli_connect("localhost", "sec_user", "hdb762lkm!98", "serverkosten");
?>

<html>
<head>
    <meta charset="utf-8" />
    <title>MainPage</title>
    <link href="../styles/main.css" rel="stylesheet" type="text/css" />
</head>
<header>
</header>
<body>
<?php if (login_check($mysqli) == true) : ?>
    <center>
        <ul class="menu">
            <li><a href="../sites/main.php">Home</a></li>
            <li><a href="#s1">Server</a>
                <ul class="submenu">
                    <li><a href="kostenuebersicht.php">Kostenübersicht</a></li>
                    <li><a href="bezahlungsformular.php">Bezahlungsformular</a></li>
                    <li><a href="serverInformationen.php">ServerInformationen</a></li>
                </ul>
            </li>
            <li><a href="#s2">Teamspeak</a>
                <ul class="submenu">
                    <li><a href="tsDaten.php">Daten</a></li>
                </ul>
            </li>
            <li><a href="#s3">Upload</a>
                <ul class="submenu">
                    <li><a href="uploadgifjpg.php">Gif&Jpg</a></li>
                    <li><a href="uploadebook.php">EBook</a></li>
                </ul>
            </li>
            <li><a href="#s4">Datenbank</a>
                <ul class="submenu">
                    <li><a href="datenbank.php">Informationen</a></li>
                    <li><a href="datenbankebook.php">EBook</a></li>
                </ul>
            </li>
        </ul>

        <span style="color:white">
            <br><br><br><br><br><br><br><br><br><br><br>
    <div id="rechts">
        //hier mit einer for mehrere uploads machenb und vil die fehler über eine id wiedergeben lassen
            <form action="../includes/uploadebookfunction.php" method="post" enctype="multipart/form-data">
					<input type="file" name="datei"><br>
                    <input type="text" name="titel" value="Titel" onfocus="if(this.value=='Titel'){this.value='';}" onblur="if(this.value==''){this.value='Titel';}" size="25" maxlength="20"/>
                    <input type="text" name="genre" value="Genre" onfocus="if(this.value=='Genre'){this.value='';}" onblur="if(this.value==''){this.value='Genre';}" size="25" maxlength="20"/>
					<br><input type="submit" value="Hochladen">
            </form>
    </div>
    <div id="links">
            Die Ebooks durch das Auswahl-Formular selektieren und die Tags setzen.<br>
            Die EBooks werden in ein Genre unter deinem Namen einsortiert<br>
            Erlaubt sind Dateien des Types epub oder pdf.<br>
        </span>

        <?php
        if(isset($_GET['fehler']) != 0){
            if($_GET['fehler'] == 1){
                echo 'Dateiname existiert bereits.';
            }
            if($_GET['fehler'] == 2){
                echo 'Keine gültige Dateiendung erkannt';
            }
            if($_GET['fehler'] == 3){
                echo 'Tags nicht gesetzt';
            }
            if($_GET['fehler'] == 4){
                echo 'Keine Datei ausgewählt';
            }
            if($_GET['fehler'] == 5){
                echo 'Genre existiert nicht';
            }
        }
        if(isset($_GET['suc']) == 1){
            echo 'EBook hochgeladen';
        }
        ?>

        <br><br><br>

        <form action="../includes/creategenre.php" method="post" enctype="multipart/form-data">
            <input type="text" name="newgenre" value="New Genre" onfocus="if(this.value=='New Genre'){this.value='';}" onblur="if(this.value==''){this.value='New Genre';}" size="25" maxlength="20"/>
            <br><input type="submit" value="Erstelle Genre">
        </form>
        <?php
        if(isset($_GET['genre']) == 1){
            echo 'Genre erstellt';
        }elseif(isset($_GET['genre']) == 2){
            echo 'Kein Genre eingegeben';
        }
        ?>
    </div>
    </center>
<?php else : ?>
    <p>
        <span class="error">You are not authorized to access this page.</span> Please <a href="../index.php">login</a>.
    </p>
<?php endif; ?>
</body>
</html>