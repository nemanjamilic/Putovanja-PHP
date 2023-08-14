<?php

class Korisnik{
    
    public $korisnikID;
    public $korisnickoIme;
    public $lozinka;

    public function __construct($korisnikID=null,$korisnickoIme=null,$lozinka=null)
    {
        $this->korisnikID = $korisnikID;
        $this->korisnickoIme = $korisnickoIme;
        $this->lozinka = $lozinka;
    }
    
    public static function prijava($korisnik, mysqli $konekcija)
    {
        $upit = "SELECT * FROM korisnik WHERE korisnickoIme='$korisnik->korisnickoIme' and lozinka='$korisnik->lozinka'";
        $korisnik = $konekcija->query($upit);
        return $korisnik;
    }
}

?>