<?php
require "konekcijaSaBazom.php";
require "models/tura.php";

$tip = trim($_GET['tip']);
$datum = trim($_GET['datum']);

$ture = Tura::vratiTure($tip, $datum, $konekcija);
?>

<table class="table">
    <thead>
        <tr style="background-color: #A0BFE0; color: black;">
            <th>Destinacija</th>
            <th>Drzava</th>
            <th>Tip aranžmana</th>
            <th>Cena</th>
            <th>Datum</th>
        </tr>
    </thead>
    <tbody>
 <?php

foreach ($ture as $tura){
    ?>
    <tr>
        <td><?= $tura->nazivDestinacije?></td>
        <td><?= $tura->drzava?></td>
        <td><?= $tura->nazivTipa?></td>
        <td><?= $tura->cena . " EUR"?></td>
        <td><?= $tura->datum?></td>
    </tr>
<?php
}
?>
    </tbody>
</table>

