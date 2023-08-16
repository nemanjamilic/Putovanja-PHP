<?php
require "konekcijaSaBazom.php";
require "models/tura.php";

$ture = Tura::vratiTure("SVI_TIPOVI", "asc", $konekcija);

foreach ($ture as $tura){
    ?>
    <option value="<?= $tura->turaID ?>"><?= $tura->nazivDestinacije . " - " . $tura->drzava . " (" . $tura->datum . " )"  ?> </option>
    <?php
}
?>