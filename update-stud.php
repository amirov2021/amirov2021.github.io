<!DOCTYPE html>
<html>
<head>
	<title>Обновление в БД</title>
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<meta http-equiv="refresh" content="2; url=/index.php">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sr.css" >
</head>
<body>
<?php include 'obr.php'; 

$id = $_POST['id'];


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


echo "$nomerld, $datazayav, $familiya, $imya, $otchestvo, $pol, $datarozhd, $mestorozhd, $grazhd, $docudl, $seriyapasporta, $nomerpasporta, $datavidachi, $organvidachi, $adresprozhivaniya, $dokobob, $godokan, $serdok, $nomerdok, $uchzaved, $nomerstud, $nomerpred, $emailstud, $tipobraz, $urobraz, $napravlenie, $profil, $nomdog, $datadog, $formaob, $srokosop, $stoimostob, $pass, $viborvi, $predmet1, $predmet2, $predmet3, $dataex1, $dataex2, $dataex3, $balli1pred, $balli2pred, $balli3pred";?>
<a href="/">Вернуться на главную</a>

<?php





// Подключение к базе данных
include ('db.php'); 

// Добавление нового абитуриента
$result = $mysqli->query("UPDATE abiturienti SET nomerld='$nomerld', familiya='$familiya', imya='$imya', otchestvo='$otchestvo', pol='$pol', datarozhd='$datarozhd', mestorozhd='$mestorozhd', grazhd='$grazhd', docudl='$docudl', seriyapasporta='$seriyapasporta', nomerpasporta='$nomerpasporta', datavidachi='$datavidachi', organvidachi='$organvidachi', adresprozhivaniya='$adresprozhivaniya', dokobob='$dokobob', godokan='$godokan', serdok='$serdok', nomerdok='$nomerdok', uchzaved='$uchzaved', nomerstud='$nomerstud', nomerpred='$nomerpred', emailstud='$emailstud', tipobraz='$tipobraz', urobraz='$urobraz', napravlenie='$napravlenie', profil='$profil', nomdog='$nomdog', datadog='$datadog', formaob='$formaob', srokosop='$srokosop', stoimostob='$stoimostob', Pass='$pass', viborvi='$viborvi', predmet1='$predmet1', predmet2='$predmet2', predmet3='$predmet3', dataex1=$dataex1, dataex2=$dataex2, dataex3=$dataex3, osnuchvkon='$osnuchvkon' WHERE id='$id'");

// Обновление фото
if (isset($file_name)) {
    $result2 = $mysqli->query("UPDATE abiturienti SET foto='$file_name'WHERE id='$id'");
}

if ($result == true){
  echo "<br><h3>Запись обновлена</h3> <br>";
}else{
  echo "<br>Ошибка при обновлении записи в БД. Возможно такая запись уже существует <br> ";
  print_r($mysqli->error);
};




?>
</body>
</html>
