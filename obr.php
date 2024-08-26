<?php
$nomerld = $_POST['nomerld'];
$datazayav = $_POST['datazayav'];
$familiya = $_POST['familiya'];
$imya = $_POST['imya'];
$otchestvo = $_POST['otchestvo'];
$pol = $_POST['pol'];
$datarozhd = $_POST['datarozhd'];
$mestorozhd = $_POST['mestorozhd'];
$grazhd = $_POST['grazhd'];
$docudl = $_POST['docudl'];
$seriyapasporta = $_POST['seriyapasporta'];
$nomerpasporta = $_POST['nomerpasporta'];
$datavidachi = $_POST['datavidachi'];
$organvidachi = $_POST['organvidachi'];
$adresprozhivaniya = $_POST['adresprozhivaniya'];
$dokobob = $_POST['dokobob'];
$godokan = $_POST['godokan'];
$serdok = $_POST['serdok'];
$nomerdok = $_POST['nomerdok'];
$uchzaved = $_POST['uchzaved'];
$nomerstud = $_POST['nomerstud'];
$nomerpred = $_POST['nomerpred'];
$emailstud = $_POST['emailstud'];
$tipobraz = $_POST['tipobraz'];
$urobraz = $_POST['urobraz'];
$formaob = $_POST['formaob'];
$srokosop = $_POST['srokosop'];
$napravlenie = $_POST['napravlenie'];
$profil = $_POST['profil'];
$nomdog = $_POST['nomdog'];
$datadog = $_POST['datadog'];
$stoimostob = $_POST['stoimostob'];
$kolsem = $_POST['kolsem'];




$predmet1 = $_POST['predmet1'];
$predmet2 = $_POST['predmet2'];
$predmet3 = $_POST['predmet3'];
$balli1pred = $_POST['balli1pred'];
$balli2pred = $_POST['balli2pred'];
$balli3pred = $_POST['balli3pred'];

//вспомогательные переменные
$vpo = "&nbsp;";
$spo = "&nbsp;";
$formaoboch = "&nbsp;";
$formaobochzaoch = "&nbsp;";
$formaobzaoch = "&nbsp;";
$fo = "&nbsp;";
$noege = "&nbsp;";
if (isset($_POST['osnuchvkon'])) {
  $osnuchvkon = $_POST['osnuchvkon'];
} else {
  $osnuchvkon = 0;
}
if (isset($_POST['prikaz'])) {
  $prikaz = $_POST['prikaz'];
} else {
  $prikaz =0;
}

if (!empty($_POST['dataex1'])) {
  $dataex1 = "'".$_POST['dataex1']."'";
} else {
  $dataex1='NULL';}

if (!empty($_POST['dataex2'])) {
  $dataex2 = "'".$_POST['dataex2']."'";
} else {
  $dataex2='NULL';}

  if (!empty($_POST['dataex3'])) {
  $dataex3 = "'".$_POST['dataex3']."'";
} else {
  $dataex3='NULL';}

if (isset($_POST['viborvi'])){
  $viborvi = $_POST['viborvi'];
} else {
  $viborvi =NULL;
}

if (!empty($_POST['datanachob'])) {
  $datanachob = "'".$_POST['datanachob']."'";
} else {
  $datanachob ='NULL';
}

if (isset($_POST['pass'])) {
  $pass = $_POST['pass'];
} else {
  $pass =0;
}

if (isset($_POST['datioplati'])) {
  $datioplati = $_POST['datioplati'];
} else {
  $datioplati =0;
}







/* Условие для даты заявления*/
$datazayav = $_POST['datazayav']; //может быть присвоена из другой переменной
/*$datazayav = date("d.m.Y", strtotime($datazayav));*/


//список месяцев с названиями для замены
$_monthsList = array(
  ".01." => "января",
  ".02." => "февраля",
  ".03." => "марта",
  ".04." => "апреля",
  ".05." => "мая",
  ".06." => "июня",
  ".07." => "июля",
  ".08." => "августа",
  ".09." => "сентября",
  ".10." => "октября",
  ".11." => "ноября",
  ".12." => "декабря"
);
 
//Наша задача - вывод русской даты, 
//поэтому заменяем число месяца на название:
$_mD = date(".m.", strtotime($datazayav)); //для замены
$datazayav = str_replace($_mD, " ".$_monthsList[$_mD]." ", $datazayav);
 
//теперь в переменной $currentDate хранится дата в формате 12 марта 2015



//*загрузка фото
$file_name = 'nophoto.png';
if(!empty($_FILES['image'])){
	$errors = array();
	$file_name = $_FILES['image']['name'];
	$file_size = $_FILES['image']['size'];
	$file_tmp = $_FILES['image']['tmp_name'];
	$file_type = $_FILES['image']['type'];
  $foto = "img/".$file_name;

	$file_ext = strtolower($file_name );
  $file_ext = explode('.', $_FILES['image']['name']);


	$expensions = array("jpeg","jpg","png");

	if ($file_size> 2097152) {
		$errors[] = 'Размер файла не должен превышать 2 МБ';
	}
	if (empty($errors) == true) {
		move_uploaded_file($file_tmp, "img/".$file_name);
		
	}else{
		print $errors;
	}

}

//*Обновить фото
if(isset($_FILES['image-update'])){
  if ($_FILES['image-update']['size']>0) {
    $errors = array();
    $file_name = $_FILES['image-update']['name'];
    $file_size = $_FILES['image-update']['size'];
    $file_tmp = $_FILES['image-update']['tmp_name'];
    $file_type = $_FILES['image-update']['type'];
    $foto = "img/".$file_name;

    $file_ext = strtolower($file_name );
    $file_ext = explode('.', $_FILES['image-update']['name']);
    $expensions = array("jpeg","jpg","png");
      if ($file_size> 2097152) {
      $errors[] = 'Размер файла не должен превышать 2 МБ';
      }
      if (empty($errors) == true) {
      move_uploaded_file($file_tmp, "img/".$file_name);
      }else{
      print $errors;
      }
  }
}








/* Условие для ВИ*/
if ($viborvi == 'По результатам ВИ') {
	$noege = 'V';
}




/* Условие для формы обучения для ЭЛ*/
if ($formaob == 'очная') {
	$fo = 'очная';
} elseif ($formaob == 'очно-заочная') {
    $fo = 'очно-заочная';
} else {
    $fo = 'заочная';
}

/* Условие для формы обучения*/
if ($formaob == 'очная') {
	$formaoboch = 'V';
} elseif ($formaob == 'очно-заочная') {
    $formaobochzaoch = 'V';
} else {
    $formaobzaoch = 'V';
}




/* Условие срока обучения*/
if ($srokosop == 'Ускоренный') {
    $srokosop_dlya_pechati = 'ускоренным';
} else {
    $srokosop_dlya_pechati = 'полным';
}



/* Условие типа образования*/
if ($tipobraz == 'ВПО') {
    $vpo = 'V';
} else {
    $spo = 'V';
}







if(isset($_POST['sogl-na-zachisl'])) {
    require_once('sogl.html');
} elseif(isset($_POST['raspiska'])) {
    include './raspiska.html';
} elseif(isset($_POST['sogl-na-pd'])) {
	require_once('sogl-na-ob-pd.html');
} elseif(isset($_POST['zayavlenie'])) {
	require_once('zayav.html');
} elseif(isset($_POST['add'])) {
	require_once('addbd.php');
  } elseif(isset($_POST['update'])) {
  require_once('update-stud.php');
} elseif(isset($_POST['exlist'])) {
	require_once('exlist.html');
}




?>