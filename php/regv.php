<?php
require 'dbConect.php';
require 'functions.php';

if (!empty($_GET)){
if (array_key_exists('name', $_GET)) {
    $name = $_GET['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
}
if (array_key_exists('date', $_GET)) {
    $date = $_GET['date'];
    $date = filter_var($date, FILTER_SANITIZE_NUMBER_INT);
    echo $date;
}
if (array_key_exists('animal', $_GET)) {
    $animal = $_GET['animal'];
    $animal = filter_var($animal, FILTER_SANITIZE_STRING);
}
    if (array_key_exists('formBio', $_GET)) {
        $formBio = $_GET['formBio'];
        $formBio =filter_var($formBio, FILTER_SANITIZE_STRING);
    }
    if (array_key_exists('time', $_GET)) {
        $time = $_GET['time'];
        $time = filter_var($time, FILTER_SANITIZE_NUMBER_INT);
    }

    try {
        $apoitment =  addVisit($database,  $date, $name, $formBio,  $animal,  $time);
        header("Location: http://localhost:8080/#/");
    } catch (Exception $exception) {
        $apoitment = [];
    }
}
?>