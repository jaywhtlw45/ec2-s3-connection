<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log(json_encode($_POST));
    
    if (isset($_POST["file"])){
        error_log("a file exists");
    }
    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response = ["message"=>"failure", "car"=>"toyota"];
    echo json_encode($response);
}
?>
