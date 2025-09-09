<?php
error_log("request recieved");
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log("post request recieved");
    http_response_code(200);
}
?>
