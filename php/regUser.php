<?php
require 'dbConect.php';
require 'functions.php';

header('Access-Control-Allow-Origin: hhttp://localhost:8080/#/');
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Credentials", "true");
header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");


var_dump($_GET);
if (!empty($_GET)){
    if (array_key_exists('first_name', $_GET)) {
        $first_name = $_GET['first_name'];
        $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    }

    if (array_key_exists('last_name', $_GET)) {
        $last_name = $_GET['last_name'];
        $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);
    }
    if (array_key_exists('select', $_GET)) {
        $select = $_GET['select'];
        $select =filter_var($select, FILTER_SANITIZE_STRING);
    }
    if (array_key_exists('pet_name', $_GET)) {
        $pet_name = $_GET['pet_name'];
        $pet_name = filter_var($pet_name, FILTER_SANITIZE_STRING);
    }

    if ($select == 'Retriver'){
        $select = 1;
    }
    if ($select == 'Malteser'){
        $select = 2;
    }
    if ($select == 'Staford'){
        $select = 3;
    }
    if ($select == 'Beagle'){
        $select = 4;
    }
    if ($select == 'Dogge'){
        $select = 5;
    }else {
        $select = '';
    }



//    user_ID - kod pet za user
//    $pet_name

//    $first_name
//    $last_name
//    $select
//

//    $first_name
//    $last_name
//    $select
//    $pet_name



//    try {
//        $apoitment =  addVisit($database,  $date, $first_name, $select,  $last_name,  $pet_name);
//        header("Location: http://localhost:8080/#/");
//    } catch (Exception $exception) {
//        $apoitment = [];
//    }
}
?>