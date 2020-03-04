<?php

/**
* Ouvrir une connexion via PDO pour créer un
* nouvelle base de données et table avec structure.
 *
 */

try {
    $connection = new PDO("mysql:host=$host", $username, $password, $options);
    $sql = file_get_contents("data/init.sql");
    $connection->exec($sql);

    echo "Base de donnée a été crée";
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
