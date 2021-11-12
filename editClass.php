<?php 
    require_once "db.php";
    require_once "Hamburger.php";
    $errname ='';
    $errtype ='';
    $errprice ='';
    $errcal =''; 
    $errdate ='';
    $hamburgerid = $_GET['id'] ?? '';
    $ujNev = $_POST['nev'] ?? null;
    $ujFajta = $_POST['fajta'] ?? null;
    $ujAr = $_POST['ar'] ?? null;
    $ujKaloria = $_POST['kaloria'] ?? null;
    $ujLejarat = $_POST['lejarat'] ?? null;
    if($hamburgerid === null || $hamburgerid < 1){
        header('Location: index.php');
        exit();
    }
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if($_POST['nev'] == '' || $_POST['nev'] == null || empty(trim($_POST['nev']))) {
            $errname ='Nem megfelelő bevitel';
        }
        else $errname ='';
        if($_POST['fajta'] == '' || $_POST['fajta'] == null || empty(trim($_POST['fajta']))){
            $errtype ='Nem megfelelő bevitel';
        }
        else $errtype ='';
        if(($_POST['ar'] == '0' || $_POST['ar'] == 0 || empty($_POST['ar']) || $_POST['ar'] < 0)){
            $errprice='Nem megfelelő bevitel';
        }
        else $errprice='';
        if(($_POST['kaloria'] == '0' || $_POST['kaloria'] == 0 || empty($_POST['kaloria']) || $_POST['kaloria'] < 0)){
            $errcal ='Nem megfelelő bevitel';
        }
        else $errcal ='';
        if(($_POST['lejarat'] == '0' || $_POST['lejarat'] == 0 || empty($_POST['lejarat']))){
            $errdate='Nem megfelelő bevitel';
        }
        else $errdate='';
        if(!($ujNev == null || $ujAr == null ||$ujFajta == null ||$ujKaloria== null ||$ujLejarat == null 
        || $ujNev == '' || $ujAr == '' ||$ujFajta == '' ||$ujKaloria== '' ||$ujLejarat == '')){
            $hamburger = Hamburger::mentes($ujNev, $ujFajta, $ujAr, $ujKaloria, new DateTime($ujLejarat), $hamburgerid);
            header('Location: index.php');
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Hamburger módosítás</title>
</head>
<body class="container">
<h1>Hamburgerek módosítása</h1>
    <form method="POST" id="ez">
        <div>
            <label>Burger neve:</label>
            <input type="text" name="nev" id="nev"><span class="red"><?php echo $errname; ?></span><br>
            <label>Burger leírása, milyen fajta:</label>
            <input type="text" name="fajta" id="fajta"><span class="red"><?php echo $errtype; ?></span><br>
            <label>Burger ára (Ft):</label>
            <input type="number" name="ar" id="ar"><span class="red"><?php  echo $errprice; ?></span><br>
            <label>Kalória (Kcal):</label>
            <input type="number" name="kaloria" id="kal"><span class="red"><?php  echo $errcal; ?></span><br>
            <label>Lejárati dátum:</label>
            <input type="date" name="lejarat" id="lej"><span class="red"><?php echo $errdate; ?></span><br>
        </div>
        <div><label></label>
            <input type="submit" id="ujgomb" value="Burger mentése">
        </div>
    </form>
</body>
</html>