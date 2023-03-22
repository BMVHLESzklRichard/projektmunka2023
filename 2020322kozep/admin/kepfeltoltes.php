<?php
$dir = "../kepek/tartalomkepek/";
$mime = array('image/png','image/jpeg','image/jpg','image/gif');

if(in_array($_FILES['file']['type'],$mime))
{
    switch($_FILES['file']['type'])
    {
        case "image/png": $kit = ".png";
        break;
        case "image/gif": $kit = ".gif";
        break;
        case "image/jpeg": $kit = ".jpeg";
        break;
        default: 
        $kit = ".jpg";
    }

    $file = date('Ymd-His').$kit;
    move_uploaded_file($_FILES['file']['tmp_name'],$dir.$file);

    $array = array('filelink' => '../../kepek/tartalomkepek/'.$file);
    print stripslashes(json_encode($array));
}


?>