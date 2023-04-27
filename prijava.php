<?php

/*
    Prihvata POST request sa index.php. Vrši unos novog takmičara i redirektuje na index.php
    Koristi klasu Takmicar.
*/

require_once "Takmicar.class.php";

$t = new Takmicar();
$t->imePrezime = $_POST['ime_prezime'];
$t->drzava = $_POST['drzava'];
$t->kategorija = $_POST['kategorija'];
$t->brojTelefona = $_POST['broj_telefona'];

$t->prijavi();

header("Location: index.php");