<!DOCTYPE html>
<html>
<head>
	<title>Добавление направления</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-8">
        <h3>Добавить направление</h3>
	<form method="POST" action="">
       <label for="urobraz">Уровень образования</label>
       <select name="urobraz" class="form-control" id="urobraz">
          <option selected>Выбрать...</option>
          <option value="Бакалавриат">Бакалавриат</option>
          <option value="Магистратура">Магистратура</option>
          <option value="СПО">СПО</option>
          </select> <br>

      <label for="kod">Код направления</label>
  		<input name="kod" type="text" class="form-control" required /> <br>

      <label for="name">Наименование направления</label>
      <input name="name" type="text" class="form-control" required /> <br>
  		<br>
     <a type="button" class="btn btn-secondary" href="#" onclick="history.back();return false;">Вернуться назад</a>
        <button type="submit" class="btn btn-primary" name="dobnaprav">Сохранить в БД</button><br>
        <?php 
if (isset($_POST['name'], $_POST['urobraz'], $_POST['kod'])){ 
 // Переменные с формы


$urobraz = $_POST['urobraz'];
$kod = $_POST['kod'];
$name = $_POST['name'];


// Подключение к базе данных
include ('db.php'); 


// Добавление нового направления

$result = $mysqli->query("INSERT INTO napravleniya (kod, name, urobraz) VALUES ('$kod', '$name', '$urobraz')");


if ($result == true){
  echo "Новое направление добавлено в базу данных";
}else{
  echo "Ошибка при добавлении направления в БД. Возможно такая запись уже существует ";
}

}


?>
 </form>
 </div>
 </div>

</div>



</body>
</html>



