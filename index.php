<?php

//require "views/mainview.php";

include 'setup.php';

try{
    $router->direct($request);
} catch (Error $e) {
    error_log($e);
    http_response_code(404);
    include "views/error404.php";
}
?>