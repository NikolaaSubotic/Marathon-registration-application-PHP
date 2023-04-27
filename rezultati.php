<?php

/*
    Izlistava sve takmičare koji imaju zabeležen prolaz. 
    Sortira po vremenu prolaska, rastuće. 
    Napraviti tri zasebne tabele, za svaku kategoriju. 
    Staviti naziv kategorije kao h2 naslov iznad tabele. Ispisati ime, prezime, broj takmicara, vreme prolaza.

    Koristi PDO
*/
require_once "db.php";

$takmicari_pocetnik = $pdo->query("select * from takmicar 
                                    join rezultat on rezultat.broj_takmicara=takmicar.broj_takmicara
                                    where kategorija='Pocetnik' 
                                    order by rezultat.prolaz_kroz_cilj")->fetchAll();
$takmicari_senior = $pdo->query("select * from takmicar 
                                    join rezultat on rezultat.broj_takmicara=takmicar.broj_takmicara
                                    where kategorija='Senior' 
                                    order by rezultat.prolaz_kroz_cilj")->fetchAll();
$takmicari_kvalifikovano = $pdo->query("select * from takmicar 
                                    join rezultat on rezultat.broj_takmicara=takmicar.broj_takmicara
                                    where kategorija='Klasifikovano takmicenje' 
                                    order by rezultat.prolaz_kroz_cilj")->fetchAll();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Nikola Subotic</title>
    </head>
    <body>
        <h1>Rezultati</h1>
        <h2>Pocetnik</h2>
        <table>
            <thead>
                <tr>
                    <th>Ime prezime</th>
                    <th>Broj takmicara</th>
                    <th>Vreme prolaza</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($takmicari_pocetnik as $red){ ?>
                    <tr>
                        <td><?= $red['ime_prezime'] ?></td>
                        <td><?= $red['broj_takmicara'] ?></td>
                        <td><?= $red['prolaz_kroz_cilj'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
        <h2>Senior</h2>
        <table>
            <thead>
                <tr>
                    <th>Ime prezime</th>
                    <th>Broj takmicara</th>
                    <th>Vreme prolaza</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($takmicari_senior as $red){ ?>
                    <tr>
                        <td><?= $red['ime_prezime'] ?></td>
                        <td><?= $red['broj_takmicara'] ?></td>
                        <td><?= $red['prolaz_kroz_cilj'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
 
        <h2>Klasifikovano takmicenje</h2>
        <table>
            <thead>
                <tr>
                    <th>Ime prezime</th>
                    <th>Broj takmicara</th>
                    <th>Vreme prolaza</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($takmicari_kvalifikovano as $red){ ?>
                    <tr>
                        <td><?= $red['ime_prezime'] ?></td>
                        <td><?= $red['broj_takmicara'] ?></td>
                        <td><?= $red['prolaz_kroz_cilj'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
</html>
