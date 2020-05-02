<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$dir = sys_get_temp_dir();
echo $dir."    ";
$tmp = tempnam($dir, "foo");
echo $tmp;
file_put_contents($tmp, "hello");
$f = fopen($tmp, "a");
fwrite($f, " world");
fclose($f);
echo file_get_contents($tmp);

echo "<br><br><br>";

$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
$extension = pathinfo($_FILES['myFile']['name'], PATHINFO_EXTENSION);


if ((($_FILES["myFile"]["type"] == "video/mp4")
        || ($_FILES["myFile"]["type"] == "audio/mp3")
        || ($_FILES["myFile"]["type"] == "audio/wma")
        || ($_FILES["myFile"]["type"] == "image/pjpeg")
        || ($_FILES["myFile"]["type"] == "image/gif")
        || ($_FILES["myFile"]["type"] == "image/jpeg"))
    && ($_FILES["myFile"]["size"] < 600000000)) {
    if ($_FILES["myFile"]["error"] > 0) {
        echo "Return Code: " . $_FILES["myFile"]["error"] . "<br />";
    } else {
        echo "Upload: " . $_FILES["myFile"]["name"] . "<br />";
        echo "Type: " . $_FILES["myFile"]["type"] . "<br />";
        echo "Size: " . ($_FILES["myFile"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["myFile"]["tmp_name"] . "<br />";

        //echo file_get_contents( $_FILES["myFile"]["tmp_name"])."<br>";
    //   $f =  fopen($_FILES["myFile"]["tmp_name"], 'w+');
     //  fwrite($f,"aa");
     //  fclose($f);
      // echo file_get_contents($_FILES["myFile"]["tmp_name"]);

        // Authenticating with keyfile data.
        $storage = new StorageClient([
            'keyFile' => json_decode(file_get_contents('/srv/key.json'), true)
        ]);

        $bucket = $storage->bucket('ai-fitness');

         $bucket->upload(fopen($_FILES["myFile"]["tmp_name"], 'r'), [
            'name' => $_FILES["myFile"]["name"]
         ]);

        if (file_exists("/static/video/" . $_FILES["myFile"]["name"])) {
            echo $_FILES["myFile"]["name"] . " already exists. ";
        } else {
            $moved = move_uploaded_file( $_FILES["myFile"]["tmp_name"], "/static/video/" . $_FILES["myFile"]["name"]);
            echo "Stored in: " . "/static/video/" . $_FILES["myFile"]["name"];
            if ($moved) {
                echo "Successfully uploaded";
            } else {
                echo "Not uploaded because of error #" . $_FILES["myFile"]["error"];
            }
        }



    }
} else {
    echo "Invalid file";
}
/*

if($_SERVER['REQUEST_METHOD']=='POST'){

    $file_name = $_FILES['myFile']['name'];
    $file_size = $_FILES['myFile']['size'];
    $file_type = $_FILES['myFile']['type'];
    $temp_name = $_FILES['myFile']['tmp_name'];

    $location = "/srv/static/video/";

    move_uploaded_file($temp_name, $location.$file_name);
    echo "/srv/static/video/".$file_name."<br>";



}else{
    echo "Error";
}
*/