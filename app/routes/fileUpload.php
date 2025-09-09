<?php
error_log("request recieved");
    error_log("testing");

if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log("testing");
    error_log("server: " . json_encode($_SERVER));

    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response = ["message"=>"failure", "car"=>"toyota"];
    echo json_encode($response);
}
?>
