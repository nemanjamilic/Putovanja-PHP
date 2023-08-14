<?php

require "konekcijaSaBazom.php";
require "models/korisnik.php";

session_start();
if(isset($_POST['korisnickoIme']) && isset($_POST['lozinka'])){

    $korisnickoIme = $_POST['korisnickoIme'];
    $lozinka = $_POST['lozinka'];

    $korisnik = new Korisnik('', $korisnickoIme, $lozinka);
    $odgovor = Korisnik::prijava($korisnik, $konekcija);

    if($odgovor->num_rows==1){
        $_SESSION['korisnikID'] = $korisnik->korisnikID;
        setcookie("korisnikIme", $korisnickoIme);
        header('Location: index.php');
        exit();
    }else{
        echo '<script type="text/javascript">
               window.onload = function () { alert("Pogrešni podaci"); } 
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

    <div class="container-xxl py-5">
    <center>
        <div class="prijava">
            <form method="post" action="" id="forma" style="margin-top: 150px; margin-left: 50px;">
                    <label class="korisnickoIme">Korisničko ime</label>
                    <input type="text" name="korisnickoIme" class="form-control"  required>
                    <br>
                    <label for="lozinka">Lozinka</label>
                    <input type="password" name="lozinka" class="form-control" required>
                    <br><br>
                    <button type="submit" class="BtnForm" name="submit">Prijavi se</button>
                    <br>
                </form>
            </div>  
        </center>
    </div>
</body>
</html>