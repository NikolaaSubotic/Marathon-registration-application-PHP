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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $brojTakmicara = trim($_POST['broj_takmicara'] ?? '');

    if ($id > 0 && $brojTakmicara !== '') {
        $t = Takmicar::pronadji($id);
        if ($t !== null) {
            $t->pridruziBroj(mb_substr($brojTakmicara, 0, 50));
        }
    }
}

//izlistaj takmicare bez broja
$takmicari_bez_broja = $pdo->query("select * from takmicar where broj_takmicara is null")->fetchAll();
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
                        <td><?= (int)$red['id'] ?></td>
                        <td><?= htmlspecialchars($red['ime_prezime']) ?></td>
                        <td><?= htmlspecialchars((string)$red['broj_takmicara']) ?></td>
                        <td><?= htmlspecialchars($red['drzava']) ?></td>
                        <td><?= htmlspecialchars($red['kategorija']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form method="post" action="admin.php">
            <label>ID</label>
            <input type="number" min="1" required name="id">
            <br>
            <label>Broj takmicara</label>
            <input maxlength="50" required name="broj_takmicara">
            <br>
            <button>Dodaj broj</button>
        </form>
    </body>
</html>
