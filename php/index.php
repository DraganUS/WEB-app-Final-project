<?php
require 'dbConect.php';
require 'functions.php';

try {
    $users = findAll($database);
} catch (Exception $exception) {
    $users = [];
}
header("Content-Type:application/json");

echo  json_encode($users);

//     foreach ($users as $user)
//     echo    $user['ID'];
//     echo  $user['username'];
//echo        $user['first_name'];
//echo         $user['pet_name'];
//echo         $user['pets_species_name'];
?>
