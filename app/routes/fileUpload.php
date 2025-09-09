<?php
error_log("request recieved");
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log("post request recieved");
    http_response_code(200);
    header('Content-Type: application/json');
    $response = ["message"=>"success", "car"=>"toyota"];
    echo json_encode($respone);
}
?>
