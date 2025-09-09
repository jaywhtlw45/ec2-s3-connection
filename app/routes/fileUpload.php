<?php
error_log("request recieved");

if ($_SERVER['REQUEST_METHOD']==='POST') {
    // error_log("server: " . json_encode($_SERVER));

    $log_location=ini_get("error_log");
    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response = ["message"=>"failure", "car"=>"toyota", "error_log_location"=> $log_location];
    echo json_encode($response);
}
?>
