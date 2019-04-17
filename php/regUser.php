<?php
require 'dbConect.php';
require 'functions.php';

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

//    $first_name
//    $last_name
//    $select
//    $pet_name

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