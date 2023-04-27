<?php

require_once "db.php";
require_once "Prolaz.class.php";

class Takmicar{
    public  $id,
            $imePrezime,
            $drzava,
            $kategorija,
            $brojTelefona,
            $brojTakmicara,
            $prolaz;

    /**
     * Konstruktor ne radi ništa.
     */
    public function __construct(){
        $this->id = null;
    }

    /**
     * vrši insert u tabelu takmicar, i dohvata novu vrednost za id. 
     * Ako id već postoji ispisuje poruku o grešci i ne radi insert.
     */
    public function prijavi(){
        global $pdo; //$pdo je deklarisan u db.php, u globalnom scope-u je

        if($this->id !== null){
            echo "Greska!";
            return;
        }

        //else
        $upit = $pdo->prepare("insert into takmicar (ime_prezime, drzava, kategorija, broj_telefona, broj_takmicara) values (?,?,?,?,NULL)");
        $upit->execute([$this->imePrezime, $this->drzava, $this->kategorija, $this->brojTelefona ]);
        $this->id = $pdo->lastInsertId();
    }

    /**
     * vrši update reda u tabeli takmicar, upisuje novu vrednost broj_takmicara
     */
    public function pridruziBroj($broj){
        global $pdo;

        $upit = $pdo->prepare("update takmicar set broj_takmicara = ? where id=?");
        $upit->execute([$broj, $this->id]);
        $this->brojTakmicara = $broj;
    } 

    /**
     * beleži novi prolaz u tekućem trenutku. Koristi klasu Prolaz. 
     * Ako prolaz već postoji, onda se ne pravi novi nego se menja postojeći.
     */
    public function zabeleziProlaz(){
        //ako ne postoji, pravimo
        if(!$this->prolaz){
            $this->prolaz = new Prolaz($this->brojTakmicara);
        }


        //u oba slucaja belezimo prolaz
        $this->prolaz->zabelezi();
    } 
    /**
     * pronalazi zapis u tabeli takmicar i vraća novi objekat takmičara sa svim podacima upisanim u atribute, uključujući i prolaz, ako postoji.
     */
    public static function pronadji($id) {
        global $pdo;

        $upit = $pdo->prepare("select * from takmicar where id=?");
        $upit->execute([$id]);
        $podaci = $upit->fetch();

        $t = new Takmicar();

        $t->id = $podaci['id'];
        $t->imePrezime = $podaci['ime_prezime'];
        $t->drzava = $podaci['drzava'];
        $t->kategorija = $podaci['kategorija'];
        $t->brojTelefona = $podaci['broj_telefona'];
        $t->brojTakmicara = $podaci['broj_takmicara'];
        if($t->brojTakmicara){
            $t->prolaz = new Prolaz($t->brojTakmicara);  //mozda ga i nema u bazi, u tom slucaju bice prazan objekat
        }

        return $t;
    }

    /**
     * ovde nam u stvari treba metod koji pronalazi po broju...
     * a imate i drugi pristup u prolaz.php
     */ 
    public static function pronadjiPoBroju($broj){
        global $pdo;

        $upit = $pdo->prepare("select id from takmicar where broj_takmicara=?");
        $upit->execute([$broj]);
        $data = $upit->fetch();
        $id = $data['id'];
        return Takmicar::pronadji($id);
    }
}