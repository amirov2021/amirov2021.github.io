<?php
include 'header.php'; 

/*Условие для обычного поиска*/ 
if (isset($_GET['poisk']) and ($_GET['poisk'] != "") ){
	include 'db.php';
	$search = $_GET['poisk'];
	$search = preg_replace("#[^0-9a-z]i#","", $search);
    $probel = " ";
    $poiskprobela = strripos($search, $probel);
    if ($poiskprobela === false) {
        $result = $mysqli->query("SELECT * FROM abiturienti WHERE familiya LIKE '%$search%' OR imya LIKE '%$search%'");
    }else{
	$search_a = explode(" ", $search);
    $result = $mysqli->query("SELECT * FROM abiturienti WHERE familiya LIKE '%$search_a[0]%' and imya LIKE '%$search_a[1]%'");}

} 

/*Условие для расширенного поиска*/ 

if (isset($_GET['fp-familiya']) and ($_GET['fp-familiya'] != "")) {
    $search = $_GET['fp-familiya'];

    $result = $mysqli->query("SELECT * FROM abiturienti WHERE familiya LIKE '%$search%'");
}


if  (isset($_GET['fp-imya']) and ($_GET['fp-imya'] != "")) {
    $search = $_GET['fp-imya'];
    $result = $mysqli->query("SELECT * FROM abiturienti WHERE imya LIKE '%$search%'");
}

if  (isset($_GET['fp-otchestvo']) and ($_GET['fp-otchestvo'] != "")) {
    $search = $_GET['fp-otchestvo'];
    $result = $mysqli->query("SELECT * FROM abiturienti WHERE otchestvo LIKE '%$search%'");
}

if  (isset($_GET['fp-phone']) and ($_GET['fp-phone'] != "")) {
    $search = $_GET['fp-phone'];
    $result = $mysqli->query("SELECT * FROM abiturienti WHERE phone LIKE '%$search%'");
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Поиск</title>
</head>
<body>
	<div class="container-fluid">

		<div class="row">
			<div class="col">
				<?php if (isset($search)){echo "<h1>Результаты поиска: \"$search\"</h1> <a href=\"/\">Сбросить фильтр</a>";} else {
					echo "<h1>$eror</h1></h1>";
				} ?>
			</div>
		</div>
		<div class="row">
			<?php
		if ($result) {
		  	// Начало нумерации таблицы 
			$nomer = 0;
		  	$rows = mysqli_num_rows($result); // количество полученных строк
		  	echo "<div class='col'><table class='table'><thead class='thead-dark'><tr><th>№</th><th>ФИО слушателя</th><th>Программа</th><th>Договор </th><th>Телефон</th><th>Эл. почта</th><th>Опции</th></tr></thead>";
		  	for ($i = 0 ; $i < $rows ; ++$i){
		  		$row = $result->fetch_assoc();
		  		echo "<tr>";
		  		//Увеличить номер строки на 1
            	$nomer = ++$nomer;
            	//Присваиваем id
            	$id = $row['ID'];
            	//Выводим ФИО одной строкой
            	$fio = $row['familiya']." ".$row['imya']." ".$row['otchestvo'];
            	//выводим направления
            	$zaprosnaprav = 'SELECT name FROM napravleniya WHERE id = '.$row['napravlenie'].'';
            	$otvetnazapros = mysqli_query($mysqli, $zaprosnaprav);
            	$naprav = mysqli_fetch_array($otvetnazapros);
            	// выводим уровень образования
            	$urobraz = " ";
            	if ($row['urobraz'] == "Бакалавриат")
             	{$urobraz = "БАК";} 
            	elseif ($row['urobraz'] == "Магистратура") {
                 $urobraz = "МАГ";}
            	elseif ($row['urobraz'] == "СПО") {
                 $urobraz = "СПО";}
            	//выводим профиль
            	$zaprosprofil = 'SELECT Profil FROM profili WHERE ID = '.$row['profil'].'';
            	$otvetnazapros2 = mysqli_query($mysqli, $zaprosprofil);
            	$profil = mysqli_fetch_array($otvetnazapros2);
            	//Договор с датой читаемого формата
            	$datadog = $row['datadog'];
            	$datadog = date("d.m.Y", strtotime($datadog));
            	$dogovor = $row['nomdog']." от ".$datadog;
            	//выводим номер телефона
            	$phone = $row['nomerstud'];
            	//выводим эл.почту
            	$email = $row['emailstud'];
            	//выводим пароль от ЛК
            	$pass = $row['emailstud'];

                  
                echo "<td>$nomer</td><td><a href=\"editstudents.php?id=$id\">$fio</a></td> <td>$naprav[0] </td> <td>$dogovor</td><td>$phone</td> <td>$email</td> 
<td>
<form enctype='multipart/form-data' action='deletestud.php' method='post'>
<button type='submit' name='deleteid' value='\"$id\"'><img src='/img/delete.png'></button></form></div>

           </td>";
       echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    mysqli_free_result($result);
}
			
  	
		?>
	</div>
</body>
</html>