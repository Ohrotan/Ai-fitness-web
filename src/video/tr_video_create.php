<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;


$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
$extension = pathinfo($_FILES['myFile']['name'], PATHINFO_EXTENSION);

echo "file size: ".$_FILES["myFile"]["size"];
if ((($_FILES["myFile"]["type"] == "video/mp4")
        || ($_FILES["myFile"]["type"] == "audio/mp3")
        || ($_FILES["myFile"]["type"] == "audio/wma")
        || ($_FILES["myFile"]["type"] == "image/pjpeg")
        || ($_FILES["myFile"]["type"] == "image/gif")
        || ($_FILES["myFile"]["type"] == "image/jpeg"))

    && ($_FILES["myFile"]["size"] < 60000000)
    && in_array($extension, $allowedExts))

{
    if ($_FILES["myFile"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["myFile"]["error"] . "<br />";
    }
    else
    {
        echo "Upload: " . $_FILES["myFile"]["name"] . "<br />";
        echo "Type: " . $_FILES["myFile"]["type"] . "<br />";
        echo "Size: " . ($_FILES["myFile"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["myFile"]["tmp_name"] . "<br />";

        if (file_exists("/srv/temp/video/" . $_FILES["myFile"]["name"]))
        {
            echo $_FILES["myFile"]["name"] . " already exists. ";
        }
        else
        {
            move_uploaded_file($_FILES["myFile"]["tmp_name"],
                "/srv/temp/video/" . $_FILES["myFile"]["name"]);
            echo "Stored in: " . "/temp/video/" . $_FILES["myFile"]["name"];
        }

        // Authenticating with keyfile data.
        $storage = new StorageClient([
            'keyFile' => json_decode(file_get_contents('/srv/key.json'), true)
        ]);

        $bucket = $storage->bucket('ai-fitness');

        $bucket->upload(
            fopen('/srv/temp/video/'.$_FILES["myFile"]["name"], 'r')
        );

    }
}
else
{
    echo "Invalid file";
}
/*

if($_SERVER['REQUEST_METHOD']=='POST'){

    $file_name = $_FILES['myFile']['name'];
    $file_size = $_FILES['myFile']['size'];
    $file_type = $_FILES['myFile']['type'];
    $temp_name = $_FILES['myFile']['tmp_name'];

    $location = "/srv/temp/video/";

    move_uploaded_file($temp_name, $location.$file_name);
    echo "/srv/temp/video/".$file_name."<br>";



}else{
    echo "Error";
}
*/