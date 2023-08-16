<?php
require "konekcijaSaBazom.php";
require "models/tip.php";

$tipovi = Tip::vratiTipove($konekcija);

foreach ($tipovi as $tip){
    ?>
        <option value="<?= $tip->tipID ?>"><?= $tip->nazivTipa ?> </option>
    <?php
}
?>