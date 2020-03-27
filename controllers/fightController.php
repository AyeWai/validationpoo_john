<?php

include '../models/Database.php';

session_start();


if (count($_POST) != 2) {
    header('Location: /');
    //header('Location: /valid_poo/validation-D6');
    exit();
}

$_SESSION['fighters'] = [];

foreach ($_POST as $characterId) {
    $character = Database::getOneCharacter($characterId);
    array_push($_SESSION['fighters'], $character);
}

$_SESSION['fighting'] = true;
header('Location: /');
//header('Location: /valid_poo/validation-D6');
exit();





