<?php

if(($_FILES['datei']['name']) == null){
    header('Location: ../sites/uploadebook.php?fehler=4');
    exit;
}
if($_POST["genre"] == Genre || $_POST["titel"] == Titel){
    header('Location: ../sites/uploadebook.php?fehler=3');
    exit;
}

$titel = $_POST["titel"];
$genre = $_POST["genre"];

if(!is_dir("../ebooks/" . $genre)){
    header('Location: ../sites/uploadebook.php?fehler=5');
    exit;
}

$extension = strtolower(pathinfo($_FILES['datei']['name'], PATHINFO_EXTENSION));

$allowed_extensions = array('epub', 'pdf');

if(in_array($extension, array('epub'))) {
    $extensions = "epub";
}elseif(in_array($extension, array('gif'))) {
    $extensions = "pdf";
}else{
    header('Location: ../sites/uploadebook.php?fehler=2');
    exit;
}

$param = "../ebooks/" . $genre . "/" . $titel . ".epub";

if(file_exists($param)){
    header('Location: ../sites/uploadebook.php?fehler=1');
    exit;
}

move_uploaded_file($_FILES['datei']['tmp_name'], $param);



header('Location: ../sites/uploadebook.php?suc=1');
exit;
