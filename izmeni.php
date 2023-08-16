<?php
require "konekcijaSaBazom.php";
require "models/tura.php";

session_start();
if (!isset($_SESSION['korisnikID'])) {
    header('Location: prijava.php');
    exit();
}

if (isset($_COOKIE["korisnikIme"])){
    $korisnickoIme=$_COOKIE["korisnikIme"];
}

if(isset($_POST['izmeni'])){
    $tura = trim($_POST['tura']);
    $datum = trim($_POST['datum']);
    $tip = trim($_POST['tip']);
    $cena = trim($_POST['cena']);

    $formatiranDatum= date("Y-m-d", strtotime($datum)); 

    if(Tura::izmeniTuru($tura, $formatiranDatum, $cena, $tip, $konekcija)){
        echo '<script type="text/javascript">
        window.onload = function () { alert("Uspešno izmenjena tura!"); } 
        </script>'; 
    }else{
        echo '<script type="text/javascript">
        window.onload = function () { alert("Izmena nije uspešna!"); } 
        </script>'; 
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Turistička agencija</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
   
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top py-lg-0 px-lg-5">
    <label class="nav-item nav-link" style="color: black !important;"><?= $korisnickoIme;?></label>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav p-lg-0">
                <a href="index.php" class="nav-item nav-link">Početna</a>
                <a href="dodaj.php" class="nav-item nav-link">Dodaj turu</a>
                <a href="izmeni.php" class="nav-item nav-link">Izmena ture</a>
                <a href="obrisi.php" class="nav-item nav-link">Brisanje ture</a>
            </div>
        </div>  
    </nav>

    <div class="container-xxl py-5">
        <div class="container">
        <h3>Izmena ture</h3>
            <form method="post" action="" id="forma" style="margin-top: 20px">

                <label for="tura">Odaberite turu</label>
                <select id="tura" name="tura" class="form-control"></select>

                <label for="datum">Datum</label>
                <input type="date" id="datum" name="datum" class="form-control">
                
                <label for="cena">Cena</label>
                <input type="number" id="cena" name="cena" class="form-control">

                <label for="tip">Tip</label>
                <select id="tip" name="tip" class="form-control"></select>

                <br>
                <button class="BtnForm" type="submit" name="izmeni">Izmeni turu</button>

            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script>

function ture() {   
    $.ajax({
        url: 'ajax-ture.php',
        success: function (podaci) {
            $("#tura").html(podaci);
        }
    });
}

function tipovi() {   
    $.ajax({
        url: 'ajax-tipovi.php',
        success: function (podaci) {
            $("#tip").html(podaci);
        }
    });
}

ture();
tipovi();

</script>
    
</body>

</html>