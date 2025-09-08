<?php
error_log("request recieved");
if ($_SERVER['REQUEST_METHOD']==='POST') {
    error_log("post request recieved");
    echo "A post request was made";
}
?>
