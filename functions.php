<?php  
function spisok_naprav()
{
	include 'db.php';
	print "<option value='&nbsp;'>Выбрать...</option>";
	$result = $mysqli->query("SELECT napravlenie FROM abiturienti GROUP BY napravlenie");
	//Выводим направления код и его ID
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['napravlenie'].">";
$result2 = $mysqli->query("SELECT * FROM napravleniya WHERE id =".$row['napravlenie']."");
$row2=mysqli_fetch_array($result2);
print $row2['name']." (".$row2['urobraz'].")";
echo("</option>");
}
}

function spisok_profili()
{
	include 'db.php';
	print "<option value='&nbsp;'>Выбрать...</option>";
	$result = $mysqli->query("SELECT profil FROM abiturienti GROUP BY profil");

	//Выводим профили и его ID
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['profil'].">";
$result2 = $mysqli->query("SELECT * FROM profili WHERE id =".$row['profil']."");
$row2=mysqli_fetch_array($result2);
print $row2['Profil'];
echo("</option>");
}
}

function mesyc_oplati()
{
	include 'db.php';
	print "<option value='&nbsp;'>Выбрать...</option>";
	$result = $mysqli->query("SELECT * FROM datioplati");
	//Выводим направления код и его ID
while ($row=mysqli_fetch_array($result))
{
print "<option value=".$row['ID'].">";
print $row['datioplati'];
echo("</option>");
}
}