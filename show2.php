<?php
include "db.php"; //Подключаем БД

//делаем запрос на профили этого направления

if (isset($_POST['mag'])) {
	$result = $mysqli->query("SELECT * FROM napravleniya where urobraz='Магистратура'");
	//Выводим профили и его ID
print "<option value='&nbsp;'>Выбрать...</option>";
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['ID'].">";
print $row['name'];
echo("</option>");
}
}


if (isset($_POST['bak'])) {
	$result = $mysqli->query("SELECT * FROM napravleniya where urobraz='Бакалавриат'");
	//Выводим профили и его ID
print "<option value='&nbsp;'>Выбрать...</option>";
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['ID'].">";
print $row['name'];
echo("</option>");
}
}

if (isset($_POST['spo'])) {
	$result = $mysqli->query("SELECT * FROM napravleniya where urobraz='СПО'");
	//Выводим профили и его ID
print "<option value='&nbsp;'>Выбрать...</option>";
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['ID'].">";
print $row['name'];
echo("</option>");
}
}


?>