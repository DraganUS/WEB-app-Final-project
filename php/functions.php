<?php
//namespace user;

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