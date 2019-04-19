<?php
require 'dbConect.php';
require 'functions.php';

header('Access-Control-Allow-Origin: hhttp://localhost:8080/#/');
header('Access-Control-Allow-Origin: http://localhost:8080');
header("Access-Control-Allow-Credentials", "true");
header("Access-Control-Allow-Methods", "GET,HEAD,OPTIONS,POST,PUT");
header("Access-Control-Allow-Headers", "Access-Control-Allow-Headers, Origin,Accept, X-Requested-With, Content-Type, Access-Control-Request-Method, Access-Control-Request-Headers");



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




//    INSERT INTO `user` ( `first_name`, `last_name`) VALUES ( 'peromir', 'peric1');
//    SELECT ID FROM users WHERE id=max(id)
//    INSERT INTO pets (`pet_name`, `user_ID`, `pets_species_ID`) VALUES ($pet_name, $user_ID, $select);


    try {
        $statement =  addUser( $database,  $first_name, $last_name);
        $lastUser = lastUser($database);
        addPet($database, $pet_name, $lastUser, $select);
        header("Location: http://localhost:8080/#/");
    } catch (Exception $exception) {
        $statement = [];
    }
}
?>