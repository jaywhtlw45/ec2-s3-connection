<?php
// need to determine what object is holding the file and how to access. potentially the frontend is sending the object incorrectly.
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log("request made");

    
    $response = [];
    $response["sys_get_temp_dir"] = sys_get_temp_dir();
    $response["php.ini"] = ini_get("error_log");
    $response["files"]=json_encode($_FILES["file"]);
    if (isset($_FILES["file"])){
        error_log("file recieved");
        $file = $_FILES["file"];
        $response["filename"] = $file["name"];
        $response["filetype"] = $file["type"];
        $response["tempLocation"] = $file["tmp_name"];
        $response["size"] = $file["size"];
        $response["error"] = $file["error"];
    }

    sleep(20);

    // Response
    http_response_code(200);
    header('Content-Type: application/json');
    $response["test"]= "testing";
    $response["message"] = "success";
    echo json_encode($response);
}
?>
