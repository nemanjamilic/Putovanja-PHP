<?php

class Tura {

   public $turaID;
   public $destinacijaID;
   public $datum;
   public $cena;
   public $tipID;

    public function __construct($turaID=null, $destinacijaID=null, $datum=null, $cena=null, $tipID=null)
    {
        $this->turaID = $turaID;
        $this->destinacijaID=$destinacijaID;
        $this->datum=$datum;
        $this->cena=$cena;
        $this->tipID=$tipID;
    }

    public static function vratiTure($tip, $datum, mysqli $konekcija)
    {
        $upit = "SELECT * FROM tura tu join destinacija d on tu.destinacijaID = d.destinacijaID join tip t on tu.tipID = t.tipID";
        if($tip != "SVI_TIPOVI"){
            $upit .= " WHERE tu.tipID = " . $tip;
        }
        $upit.= " ORDER BY tu.datum " . $datum;
        $resultSet = $konekcija->query($upit);
        $podaci = [];
        while($red = $resultSet->fetch_object()){
            $podaci[] = $red;
        }
        return $podaci;
    }

    public static function dodajTuru($destinacija, $datum, $cena, $tipID, mysqli $konekcija)
    {
        $upit = "INSERT INTO tura VALUES(null, '$destinacija','$datum','$cena', $tipID)";
        $odgovor =  $konekcija->query($upit);
        return $odgovor;
    }

    public static function izmeniTuru($turaID, $datum, $cena, $tip, mysqli $konekcija)
    {
        $upit = "UPDATE tura SET cena = '$cena', datum ='$datum', tipID ='$tip' WHERE turaID = $turaID";
        $odgovor =  $konekcija->query($upit);
        return $odgovor;
    }

    public static function obrisiTuru($turaID, mysqli $konekcija)
    {
        $upit = "DELETE FROM tura WHERE turaID = $turaID";
        $odgovor =  $konekcija->query($upit);
        return $odgovor;
    }
}