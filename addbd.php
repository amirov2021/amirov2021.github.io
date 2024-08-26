<!DOCTYPE html>
<html>
<head>
	<title>Сохранение в БД</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<meta http-equiv="refresh" content="2; url=/index.php">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sr.css" >
</head>
<body>
<?php include 'obr.php'; 


if (!empty($_POST['predmet1'])) {
    $predmet1 = $_POST['predmet1'];
} else {
    $predmet1 = 0;
};
if (!empty($_POST['predmet2'])) {
    $predmet2 = $_POST['predmet2'];
} else {
    $predmet2 = 0;
};
if (!empty($_POST['predmet3'])) {
    $predmet3 = $_POST['predmet3'];
} else {
    $predmet3 = 0;
};




if (!empty($_POST['balli1pred'])) {
    $balli1pred = $_POST['balli1pred'];
} else {
    $balli1pred = 0;
};
if (!empty($_POST['balli2pred'])) {
    $balli2pred = $_POST['balli2pred'];
} else {
    $balli2pred = 0;
};
if (!empty($_POST['balli3pred'])) {
    $balli3pred = $_POST['balli3pred'];
} else {
    $balli3pred = 0;
};


echo "$nomerld, $datazayav, $familiya, $imya, $otchestvo, $file_name, $pol, $datarozhd, $mestorozhd, $grazhd, $docudl, $seriyapasporta, $nomerpasporta, $datavidachi, $organvidachi, $adresprozhivaniya, $dokobob, $godokan, $serdok, $nomerdok, $uchzaved, $nomerstud, $nomerpred, $emailstud, $tipobraz, $urobraz, $napravlenie, $profil, $nomdog, $datadog, $formaob, $stoimostob, $viborvi, $predmet1, $predmet2, $predmet3, $dataex1, $dataex2, $dataex3, $balli1pred, $balli2pred, $balli3pred";





// Подключение к базе данных
include ('db.php'); 

// Добавление нового абитуриента
$result = $mysqli->query("INSERT INTO abiturienti (nomerld, datazayav, familiya, imya, otchestvo, foto, pol, datarozhd, mestorozhd, grazhd, docudl, seriyapasporta, nomerpasporta, datavidachi, organvidachi, adresprozhivaniya, dokobob, godokan, serdok, nomerdok, uchzaved, nomerstud, nomerpred, emailstud, tipobraz, urobraz, formaob, srokosop, napravlenie, profil, nomdog, datadog,  stoimostob, kolsem, prikaz, datanachob, Pass, viborvi, predmet1, predmet2, predmet3, dataex1, dataex2, dataex3, osnuchvkon, datioplati) 
VALUES ('$nomerld', '$datazayav', '$familiya', '$imya', '$otchestvo', '$file_name','$pol', '$datarozhd', '$mestorozhd', '$grazhd', '$docudl', '$seriyapasporta', '$nomerpasporta','$datavidachi', '$organvidachi', '$adresprozhivaniya', '$dokobob', '$godokan', '$serdok', '$nomerdok', '$uchzaved', '$nomerstud', '$nomerpred', '$emailstud', '$tipobraz', '$urobraz', '$formaob', '$srokosop', '$napravlenie', '$profil','$nomdog','$datadog', '$stoimostob', '$kolsem', '$prikaz', $datanachob, '$pass', '$viborvi', '$predmet1', '$predmet2', '$predmet3', $dataex1, $dataex2, $dataex3, '$osnuchvkon', '$datioplati')");
if ($result == true){
  echo "<br><h3>Запись добавлена</h3> <br><a href=\"/\">Главная</a>";
}else{
  echo "<br>Ошибка при добавлении записи в БД. Возможно такая запись уже существует <br> ";
  print_r($mysqli->error);
};



?>
</body>
</html>
