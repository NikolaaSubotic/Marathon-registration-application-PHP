<?php

/*
    Prihvata POST request sa index.php. Vrši unos novog takmičara i redirektuje na index.php
    Koristi klasu Takmicar.
*/

require_once "Takmicar.class.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php", true, 303);
    exit;
}

$dozvoljeneDrzave = ["Srbija", "BiH", "Crna Gora"];
$dozvoljeneKategorije = ["Pocetnik", "Senior", "Klasifikovano takmicenje"];

$imePrezime = trim($_POST['ime_prezime'] ?? '');
$drzava = trim($_POST['drzava'] ?? '');
$kategorija = trim($_POST['kategorija'] ?? '');
$brojTelefona = trim($_POST['broj_telefona'] ?? '');

if (
    $imePrezime === '' ||
    $brojTelefona === '' ||
    !in_array($drzava, $dozvoljeneDrzave, true) ||
    !in_array($kategorija, $dozvoljeneKategorije, true)
) {
    header("Location: index.php", true, 303);
    exit;
}

$t = new Takmicar();
$t->imePrezime = mb_substr($imePrezime, 0, 50);
$t->drzava = $drzava;
$t->kategorija = $kategorija;
$t->brojTelefona = mb_substr($brojTelefona, 0, 17);
$t->prijavi();

header("Location: index.php", true, 303);
exit;
