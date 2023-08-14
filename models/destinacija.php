<?php

class Destinacija {

    public $destinacijaID;
    public $nazivDestinacije;
    public $drzava;
    
    public function __construct($destinacijaID=null,$nazivDestinacije=null, $drzava=null)
    {
        $this->destinacijaID = $destinacijaID;
        $this->nazivDestinacije=$nazivDestinacije;
        $this->drzava=$drzava;
    }

    public static function vratiDestinacije(mysqli $konekcija)
    {
        $upit = "SELECT * FROM destinacija";
        $resultSet = $konekcija->query($upit);
        $podaci = [];
        while($red = $resultSet->fetch_object()){
            $podaci[] = $red;
        }
        return $podaci;
    }

}

