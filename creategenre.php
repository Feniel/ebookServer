<?php

if($_POST["newgenre"] == "New Genre"){
    header('Location: ../sites/uploadebook.php?genre=2');
    exit;
}
mkdir("../ebooks/" . $_POST['newgenre']);

header('Location: ../sites/uploadebook.php?genre=1');
exit;
