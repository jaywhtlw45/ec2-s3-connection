<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log(json_encode($_POST));
    
    $response = [];
    if (isset($_FILES["file"])){
        $file = $_FILES["file"];
        $response["filename"] = $file["name"];
        $response["filetype"] = $file["type"];
        $response["tempLocation"] = $file["temp_name"];
        $response["size"] = $file["size"];
        $response["error"] = $file["error"];
    }

    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response["message"] = "success";
    echo json_encode($response);
}
?>
