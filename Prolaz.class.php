<?php

require_once "db.php";

class Prolaz{

    public $id, $brojTakmicara, $prolazKrozCilj;

    /**
     * Konstruktor dobija broj takmičara i postavlja to kao vrednost atributa brojTakmicara. 
     * Proverava da li u tabeli prolaz prostoji takav zapis, i ako postoji učitava id u atribut id.
     */
    public function __construct($brojTakmicara){
        global $pdo;

        $upit = $pdo->prepare("select * from rezultat where broj_takmicara=?");
        $upit->execute([$brojTakmicara]);
        $data = $upit->fetch();
        if($data){
            $this->id = $data['id'];
            $this->brojTakmicara = $data['broj_takmicara'];
            $this->prolazKrozCilj = $data['prolaz_kroz_cilj'];
        } else {
            $this->id = null;
            //ovde - treba da svakako sacuvamo broj_takmicara
            $this->brojTakmicara = $brojTakmicara;
        }
    }

    /**
     * vrši insert ili update, zavisno da li je id null ili ne
     * Za vreme prolaska upisuje se trenutno vreme
     * Ako se radi insert, dohvata novu vrednost za id.
     */
    public function zabelezi(){
        global $pdo;

        if($this->id == null){
            $upit = $pdo->prepare("insert into rezultat (broj_takmicara, prolaz_kroz_cilj) values (?, NOW() )");
            $upit->execute([$this->brojTakmicara]);
            $this->id = $pdo->lastInsertId();
            $this->prolazKrozCilj = date("Y-m-d H:i:s");
        } else {
            $upit = $pdo->prepare("update rezultat set prolaz_kroz_cilj = NOW() where id = ?");
            $upit->execute([$this->id]);
            $this->prolazKrozCilj = date("Y-m-d H:i:s"); //azuriram vreme na trenutno
        }
    }
}

