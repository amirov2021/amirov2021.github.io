<html>
<head>
 <title>Добавление направления</title>
</head>
<body>
 <form method="POST" action="">
  <input name="name" type="text" placeholder="Наименование направления"/>
   <input type="submit" value="Сохранить в БД"/>
 </form>


<?php  
 // Переменные с формы
$name = $_POST['name'];


// Подключение к базе данных
include ('db.php'); 

$result = $mysqli->query("INSERT INTO napravleniya (name) VALUES ('$name')");

if ($result == true){
	echo "Информация занесена в базу данных";
}else{
	echo "Информация не занесена в базу данных";
}



?>
</body>
</html>