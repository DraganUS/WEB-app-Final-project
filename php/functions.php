<?php


function findAll(mysqli $database)
{
    $statement = $database->prepare("SELECT * FROM pets INNER JOIN user u ON pets.user_ID=u.id INNER JOIN pets_species ps ON pets.pets_species_ID=ps.id");

    if (!$statement) {
        throw new Exception('Statement not created' . $database->error);
    }

    $statement->execute();
    $users = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

    return $users;
}


function addVisit(mysqli $database, $date, $name, $formBio,  $animal,  $time)
{
    $statement = $database->prepare(" INSERT INTO `visits` ( `visit_date`, `visit_title`, `visit_desciption`, `visit_type`, `visit_time`) 
 VALUES (?,?,?,?,?)");

    var_dump($date);
    $statement->bind_param('sssss',$date,$name, $formBio, $animal,  $time );
    if (!$statement) {
        throw new Exception('Statement not created' . $database->error);
    }
//
    $statement->execute();
//    $apoitment = $statement->get_result()->fetch_all(MYSQLI_ASSOC);
var_dump($statement);
//    return $apoitment;
}