<?php
require 'vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

// Authenticating with keyfile data.
$storage = new StorageClient([
    'keyFile' => json_decode(file_get_contents('/srv/key.json'), true)
]);

$bucket = $storage->bucket('ai-fitness');



//----아래는 예시 코드-----
// Download and store an object from the bucket locally.
$object = $bucket->object('php.txt');
$object->downloadToFile('/php.txt');

echo $object->name();
echo $object->downloadAsString();


// Upload a file to the bucket.
$bucket->upload(
    fopen('/srv/test.txt', 'r')
);


// Using Predefined ACLs to manage object permissions, you may
// upload a file and give read access to anyone with the URL.
$bucket->upload(
    fopen('/srv/test.txt', 'r'),
    [
        'predefinedAcl' => 'publicRead'
    ]
);




//get
//$storage->registerStreamWrapper();
//$contents = file_get_contents('gs://my_bucket/file_backup.txt');

//------------------------------------------------------------------

// Authenticating with a keyfile path.
$storage = new StorageClient([
 //   'keyFilePath' => '/path/to/keyfile.json'
]);

// Providing the Google Cloud project ID.
$storage = new StorageClient([
    'projectId' => 'ai-fitness-369'
]);
?>