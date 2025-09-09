<?php
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log("request made");

    
    $response = [];
    $response["php.ini"] = ini_get("error_log");
    $response["files"]=json_encode($_POST["file"]);
    if (isset($_POST["file"])){
        error_log("file recieved");
        $file = $_POST["file"];
        $response["filename"] = $file["name"];
        $response["filetype"] = $file["type"];
        $response["tempLocation"] = $file["temp_name"];
        $response["size"] = $file["size"];
        $response["error"] = $file["error"];
    }

    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response["test"]= "testing";
    $response["message"] = "success";
    echo json_encode($response);
}
?>
