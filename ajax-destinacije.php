<?php
require "konekcijaSaBazom.php";
require "models/destinacija.php";

$destinacije = Destinacija::vratiDestinacije($konekcija);

foreach ($destinacije as $destinacija){
    ?>
    <option value="<?= $destinacija->destinacijaID ?>"><?= $destinacija->nazivDestinacije . " - " . $destinacija->drzava ?> </option>
    <?php
}
?>