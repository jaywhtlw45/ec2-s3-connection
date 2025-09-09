<?php
error_log("request recieved");
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log("testing");
    error_log("server: " . json_encode($_SERVER));

    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response = ["message"=>"success", "car"=>"toyota"];
    echo json_encode($response);
}
?>
