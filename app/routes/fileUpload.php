<?php
// need to determine what object is holding the file and how to access. potentially the frontend is sending the object incorrectly.
require '../../vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

$s3Client = new s3Client([
    'region' => 'us-west-1',
    'version' => 'latest'
]);

$bucketName = 'completely-random-aws-bucket';
$fileName = 'test1.jpg';

$response["display_errors"]=ini_get("display_errors");
echo json_encode($response);

try {
    $file =  $s3Client->getObject([
        'Bucket' => $bucketName,
        'Key' => $fileName,
    ]);
    $body = $file->get('Body');
    $body->rewind();
    echo "Downloaded the file and it begins with: {$body->read(26)}.\n";
} catch (Exception $exception) {
    echo "Failed to download $fileName from $bucketName with error: " . $exception->getMessage();
    exit("Please fix error with file downloading before continuing.");
}


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    error_log("request made");


    $response = [];
    $response["files"] = json_encode($_FILES["file"]);
    if (isset($_FILES["file"])) {
        error_log("file recieved");
        $file = $_FILES["file"];
        $response["filename"] = $file["name"];
        $response["filetype"] = $file["type"];
        $response["tempLocation"] = $file["tmp_name"];
        $response["size"] = $file["size"];
        $response["error"] = $file["error"];
    }


    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response["message"] = "failure";

    echo json_encode($response);
}

// PHP INI
// $response["php.ini"] = ini_get("error_log");

// Temporary stoarge directory
// $response["sys_get_temp_dir"] = sys_get_temp_dir();

// File Properties
// if (isset($_FILES["file"])){
// error_log("file recieved");
// $file = $_FILES["file"];
// $response["filename"] = $file["name"];
// $response["filetype"] = $file["type"];
// $response["tempLocation"] = $file["tmp_name"];
// $response["size"] = $file["size"];
// $response["error"] = $file["error"];
// }
