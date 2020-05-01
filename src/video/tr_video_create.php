<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

if($_SERVER['REQUEST_METHOD']=='POST'){

    $file_name = $_FILES['myFile']['name'];
    $file_size = $_FILES['myFile']['size'];
    $file_type = $_FILES['myFile']['type'];
    $temp_name = $_FILES['myFile']['tmp_name'];

    $location = "/srv/temp/video/";

    move_uploaded_file($temp_name, $location.$file_name);
    echo "/srv/temp/video/".$file_name."<br>";

    // Authenticating with keyfile data.
    $storage = new StorageClient([
        'keyFile' => json_decode(file_get_contents('/srv/key.json'), true)
    ]);

    $bucket = $storage->bucket('ai-fitness');

    $bucket->upload(
        fopen('/srv/temp/video/'.$file_name, 'r')
    );

}else{
    echo "Error";
}

