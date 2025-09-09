<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log(json_encode($_POST));
    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response = ["message"=>"failure", "car"=>"toyota", "error_log_location"=> $log_location];
    echo json_encode($response);
}
?>
