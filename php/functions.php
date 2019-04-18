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

function findVisits(mysqli $database)
{
    $statement = $database->prepare("SELECT * FROM visits");

    if (!$statement) {
        throw new Exception('Statement not created' . $database->error);
    }

    $statement->execute();
    $users = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

    return $users;
}

function findAdmin(mysqli $database)
{
    $statement = $database->prepare("SELECT username, pass FROM user WHERE administrator ='true'");

    if (!$statement) {
        throw new Exception('Statement not created' . $database->error);
    }

    $statement->execute();
    $users = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

    return $users;
}
function findUsers(mysqli $database)
{
    $statement = $database->prepare("SELECT * FROM user ");

    if (!$statement) {
        throw new Exception('Statement not created' . $database->error);
    }

    $statement->execute();
    $users = $statement->get_result()->fetch_all(MYSQLI_ASSOC);

    return $users;
}

function addVisit(mysqli $database, $date, $name, $formBio,  $animal,  $email, $time)
{
    $statement = $database->prepare(" INSERT INTO `visits` ( `visit_date`, `visit_title`, `visit_desciption`, `visit_type`, `email` ,`visit_time`) 
 VALUES (?,?,?,?,?,?)");

    $statement->bind_param('ssssss',$date,$name, $formBio, $animal, $email ,$time );
    if (!$statement) {
        throw new Exception('Statement not created' . $database->error);
    }
    $statement->execute();

    return $statement;
}

function addUser(mysqli $database,  $first_name, $last_name)
{
    $statement = $database->prepare("INSERT INTO `user` ( `first_name`, `last_name`) VALUES ( ?, ?)");
    $statement->bind_param('ss', $first_name,$last_name);
    if (!$statement) {
        throw new Exception('Statement user not created' . $database->error);
    }
    $statement->execute();

    return $statement ;
}

function lastUser(mysqli $database)
{
    $findMaxID = $database->prepare("SELECT ID from user ORDER BY ID DESC LIMIT 1");
    $findMaxID->execute();
    $user_ID = $findMaxID->get_result()->fetch_all(MYSQLI_ASSOC);
    $user_ID = $user_ID[0]['ID'];
    return $user_ID;
}
function addPet(mysqli $database, $pet_name, $lastUser, $select )
{
    $pets = $database->prepare(" INSERT INTO pets (`pet_name`, `user_ID`, `pets_species_ID`)
  VALUES (?,?,?)");
    $pets->bind_param('sii',  $pet_name, $lastUser, $select );

    if (!$pets) {
        throw new Exception('Statement user not created' . $database->error);
    }
    $pets->execute();
}