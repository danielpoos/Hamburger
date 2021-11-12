<?php 
require_once 'db.php'; 
require_once 'Hamburger.php';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $deleteId = $_POST['deleteId'] ?? '';
    if ($deleteId !== '') {
        Hamburger::torol($deleteId);
    }
    else{
    $ujNev= $_POST['nev'] ?? null;
    $ujFajta= $_POST['fajta'] ?? null;
    $ujAr= $_POST['ar'] ?? null;
    $ujKaloria= $_POST['kaloria'] ?? null;
    $ujLejarat= $_POST['lejarat'] ?? null;
    if(!($ujNev == null || $ujAr == null ||$ujFajta == null ||$ujKaloria== null ||$ujLejarat == null || $ujNev == '' || $ujAr == '' ||$ujFajta == '' ||$ujKaloria== '' ||$ujLejarat == '')){
        $ujHamburger = new Hamburger($ujNev, $ujFajta, $ujAr, $ujKaloria, new DateTime($ujLejarat));
        $ujHamburger->uj();
    }
    }
}

$hamburgers = Hamburger::osszes();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hamburger adatbázis</title>
    <link href="style.css" rel="stylesheet">
    <script src="main.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="container">
<h1>Hamburgerek</h1>
    <form method="POST" id="ez">
        <div>
            <h2>Új burger felvétele</h2>
            <label>Burger neve:</label>
            <input type="text" name="nev" id="nev"><span id="errorName"></span><br>
            <label>Burger leírása, milyen fajta:</label>
            <input type="text" name="fajta" id="fajta"><span id="errorType"></span><br>
            <label>Burger ára (Ft):</label>
            <input type="number" name="ar" id="ar"><span id="errorPrice"></span><br>
            <label>Kalória (Kcal):</label>
            <input type="number" name="kaloria" id="kal"><span id="errorCal"></span><br>
            <label>Lejárati dátum:</label>
            <input type="date" name="lejarat" id="lej"><span id="errorDate"></span><br>
        </div>
        <div><label></label>
            <input type="submit" id="ujgomb" value="Új burger">
        </div>
    </form>
    <div id="out"><?php
        foreach ($hamburgers as $burger) {
            echo "<article class='col-3 rounded-3'><h3>".$burger->getNev()."</h3><p id='leiras'>". $burger->getFajta()."</p>
            <p>\tÁra: ". $burger->getAr()." Ft<br>\tKalóriát tartalmaz: ". $burger->getKaloria() ." Kcal<br>\tLejár: ". $burger->getLejarat()->format("Y.m.d h:i")."</p>
            <form method='POST'><input type='hidden' name='deleteId' value='". $burger->getId(); 
            echo "'><button type='submit'>Törles</button><a href='editClass.php?id=". $burger->getId() ."'>Szerkesztés</a></form></article>";
        }
    ?></div>
</body>
</html>