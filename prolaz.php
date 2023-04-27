<?php
/*
    Prihvata GET request sa broj_takmicara.
    Zapisuje trenutno vreme kao prolaz kroz cilj. 
    Ispisuje objekat takmičara kao JSON

    Koristi klase Prolaz i Takmicar
*/

require_once "Prolaz.class.php";
require_once "Takmicar.class.php";


/**
 * Imamo dva nacina da resimo ovo - da potrazimo po id-u broj takmicara, pa da napravimo novog takmicara
 * ili da dodamo metod u klasu takmicar koji ce to da radi
 */
/*
 //sve ovde
 $upit = $pdo->prepare("select id from takmicar where broj_takmicara=?");
 $upit->execute([$_GET['broj']]);
 $data = $upit->fetch();
 $id = $data['id'];
 $takmicar = Takmicar::pronadji($id);
 $takmicar->zabeleziProlaz();
*/
 //ili ako smo dodali metod za trazenje takmicara po broju, onda ovako:
 $takmicar = Takmicar::pronadjiPoBroju($_GET['broj']);

 $takmicar->zabeleziProlaz();

 echo json_encode($takmicar);