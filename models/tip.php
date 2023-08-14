<?php

class Tip{

    public $tipID;
    public $nazivTipa;

    public function __construct($tipID=null,$nazivTipa=null)
    {
        $this->tipID = $tipID;
        $this->nazivTipa=$nazivTipa;
    }

    public static function vratiTipove(mysqli $konekcija)
    {
        $upit = "SELECT * FROM tip";
        $resultSet = $konekcija->query($upit);
        $podaci = [];
        while($red = $resultSet->fetch_object()){
            $podaci[] = $red;
        }
        return $podaci;
    }

}

