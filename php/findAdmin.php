<?php
require 'dbConect.php';
require 'functions.php';
header('Access-Control-Allow-Origin: hhttp://localhost:8080/#/');
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Origin", "*");
header("Access-Control-Allow-Credentials", "true");
header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");

try {
    $users = findAdmin($database);

} catch (Exception $exception) {
    $users = [];
}
header("Content-Type:application/json");
echo  json_encode($users);
?>
