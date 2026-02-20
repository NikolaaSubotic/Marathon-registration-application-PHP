<?php
/*
    Prihvata GET request sa broj_takmicara.
    Zapisuje trenutno vreme kao prolaz kroz cilj. 
    Ispisuje objekat takmičara kao JSON

    Koristi klase Prolaz i Takmicar
*/

require_once "Prolaz.class.php";
require_once "Takmicar.class.php";

header('Content-Type: application/json; charset=utf-8');

$broj = trim($_GET['broj'] ?? '');
if ($broj === '') {
    http_response_code(400);
    echo json_encode(['error' => 'Parametar broj je obavezan.']);
    exit;
}

$takmicar = Takmicar::pronadjiPoBroju($broj);
if ($takmicar === null) {
    http_response_code(404);
    echo json_encode(['error' => 'Takmicar nije pronadjen.']);
    exit;
}

$takmicar->zabeleziProlaz();

echo json_encode($takmicar);
