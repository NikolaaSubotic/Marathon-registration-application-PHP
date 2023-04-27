<?php

/*
    Izlistava sve takmičare koji imaju broj_takmicara. 
    Ispisati u tabeli ime i prezime, broj takmičara, država, kategorija. 
    Sortirati po kategoriji.

    Prikazuje formu koja šalje post request na prijava.php.
    Forma ima sledeća polja:
    ime i prezime
    država - lista sa opcijama "Srbija", "BiH", "Crna Gora"
    kategorija - lista sa opcijama "Početnik", "Senior", "Klasifikovano takmičenje"
    broj telefona
    Sva polja su obavezna.

    Koristi PDO
*/

require_once "db.php";

//izlistava takmicare
$takmicari = $pdo->query("select * from takmicar where broj_takmicara is not null order by kategorija")->fetchAll();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Nikola Subotic</title>
    </head>
    <body>
        <h1>Takmicari</h1>
        <table>
            <thead>
                <tr>
                    <th>Ime prezime</th>
                    <th>Broj takmicara</th>
                    <th>Drzava</th>
                    <th>Kategorija</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($takmicari as $red){ ?>
                    <tr>
                        <td><?= $red['ime_prezime'] ?></td>
                        <td><?= $red['broj_takmicara'] ?></td>
                        <td><?= $red['drzava'] ?></td>
                        <td><?= $red['kategorija'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form method="post" action="prijava.php">
            <label>Ime i prezime</label>
            <input name="ime_prezime" required>
            <br>
            <label>Drzava</label>
            <select name="drzava" required>
                <option>Srbija</option>
                <option>BiH</option>
                <option>Crna Gora</option>
            </select>
            <br>
            <label>Kategorija</label>
            <select name="kategorija" required>
                <option>Pocetnik</option>
                <option>Senior</option>
                <option>Klasifikovano takmicenje</option>
            </select>
            <br>
            <label>Broj telefona</label>
            <input name="broj_telefona" required>
            <br>
            <button>Posalji prijavu</button>
        </form>
    </body>
</html>