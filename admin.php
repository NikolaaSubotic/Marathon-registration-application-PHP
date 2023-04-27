<?php

/**
 * Izlistava sve takmičare koji nemaju broj_takmicara. 
 * U tabeli ispisati id, ime_prezime, drzava, kategorija, broj_telefona. 
 * 
 * Ispod spiska napraviti formu koja šalje POST request na admin.php i ima sledeća polja:
 * id
 * broj takmičara
 * 
 * Prihvata submitovanu formu i vrši pridruživanje broja takmičaru.
 * Koristi PDO i klasu Takmicar.
 */

require_once "db.php";
require_once "Takmicar.class.php";

if(isset($_POST['id'])){
    $t = Takmicar::pronadji($_POST['id']); //pronadji takmicara
    $t->pridruziBroj($_POST['broj_takmicara']); //pridruzi broj
}

//izlistaj takmicare bez broja
$takmicari_bez_broja = $pdo->query("select * from takmicar where broj_takmicara is null")->fetchAll();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PNikola Subotic</title>
    </head>
    <body>
        <h1>Takmicari</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Ime prezime</th>
                    <th>Broj takmicara</th>
                    <th>Drzava</th>
                    <th>Kategorija</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($takmicari_bez_broja as $red){ ?>
                    <tr>
                        <td><?= $red['id'] ?></td>
                        <td><?= $red['ime_prezime'] ?></td>
                        <td><?= $red['broj_takmicara'] ?></td>
                        <td><?= $red['drzava'] ?></td>
                        <td><?= $red['kategorija'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form method="post" action="admin.php">
            <label>ID</label>
            <input type="number" required name="id">
            <br>
            <label>Broj takmicara</label>
            <input required name="broj_takmicara">
            <br>
            <button>Dodaj broj</button>
        </form>
    </body>
</html>