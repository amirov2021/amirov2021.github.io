<?php
include "db.php"; //Подключаем БД

//делаем запрос на направления этого уровня образования

if (isset($_POST['urobraz'])) {

if ($_POST['urobraz']=='Бакалавриат') {
	$result = $mysqli->query("SELECT * FROM napravleniya where urobraz='Бакалавриат'");
	//Выводим направления и его ID
print "<option value='&nbsp;'>Выбрать...</option>";
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['ID'].">";
print $row['name'];
echo("</option>");
}
}


elseif ($_POST['urobraz']=='Магистратура') {
	$result = $mysqli->query("SELECT * FROM napravleniya where urobraz='Магистратура'");
	//Выводим направления и его ID
print "<option value='&nbsp;'>Выбрать...</option>";
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['ID'].">";
print $row['name'];
echo("</option>");
}

}

elseif ($_POST['urobraz']=='СПО') {
	$result = $mysqli->query("SELECT * FROM napravleniya where urobraz='СПО'");
	//Выводим направления и его ID
print "<option value='&nbsp;'>Выбрать...</option>";
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['ID'].">";
print $row['name'];
echo("</option>");
}

}








}





?>