<?php
require 'vendor/autoload.php';
include "dbconfig.php";

use Google\Cloud\Storage\StorageClient;


$allowedExts = array("jpg", "jpeg", "gif", "png", "mp3", "mp4", "wma");
$extension = pathinfo($_FILES['videoFile']['name'], PATHINFO_EXTENSION);
$video_file_name =  "tr_video/".$_FILES["videoFile"]["name"];
$thumb_file_name =  "tr_thumb_img/".$_FILES["imgFile"]["name"];


    if ($_FILES["videoFile"]["error"] > 0) {

        echo "Return Code: " . $_FILES["videoFile"]["error"] . "<br />";
    } else {
        echo "Upload: " . $video_file_name. "<br />";
        echo "Type: " . $_FILES["videoFile"]["type"] . "<br />";
        echo "Size: " . ($_FILES["videoFile"]["size"] / 1024) . " Kb<br />";
        echo "Temp file: " . $_FILES["videoFile"]["tmp_name"] . "<br />";
//        echo "  37line ";
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
         $bucket->upload(fopen($_FILES["videoFile"]["tmp_name"], 'r'), [
            'name' => $video_file_name
         ]);
        $bucket->upload(fopen($_FILES["imgFile"]["tmp_name"], 'r'), [
            'name' => $thumb_file_name
        ]);
/*
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
*/
        //db에도 업로드
        $trainer_id = $_POST[trainer_id]; //$_POST[name];
        $title = $_POST[title]; //$_POST[name];
        $thumb_img = "ai-fitness/".$thumb_file_name;
        $video ="ai-fitness/".$video_file_name;


//1번 방법
        $sql = "INSERT INTO trainer_video (trainer_id, thumb_img, video, title, reg_date) VALUES ('$trainer_id','$thumb_img','$video','$title',ADDTIME(CURRENT_TIMESTAMP,'9:0:0'))";
        echo $sql."<br>";
        $stmt = $db->prepare($sql);
        $result = $stmt->execute();

        echo $result;

        $results = $db->query('SELECT * from trainer_video');
        $result_array = array();
        if ($results->rowCount() > 0)
        {
            foreach ($results as $row){
                echo $row[trainer_id]."/".$row[title]."/".$row[video]."<br>";
                array_push($result_array,$row);
            }

        }
        echo json_encode($result_array);

    }

