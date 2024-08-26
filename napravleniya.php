<?php  
// Параметры для подключения
$db_host = "localhost"; 
$db_user = "root"; // Логин БД
$db_password = "root"; // Пароль БД
$db_base = 'synergy'; // Имя БД

// Подключение к базе данных
$mysqli = new mysqli($db_host,$db_user,$db_password,$db_base); 
// Подключение к базе данных



$sql = "SELECT * FROM napravleniya";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		echo "<br> Name: ".$row["name"];
	}
}


?>
