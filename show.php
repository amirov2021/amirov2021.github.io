<?php
include "db.php"; //Подключаем БД
//делаем запрос на профили этого направления
$result = $mysqli->query("SELECT * FROM profili where id_naprav=".$_REQUEST['napravlenie']."");



//Выводим профили и его ID
print "<option value='&nbsp;'>Выбрать...</option>";	
while ($row=mysqli_fetch_array($result))
{

print "<option value=".$row['ID'].">";
print $row['Profil'];
echo("</option>");
}
?>


