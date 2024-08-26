<!DOCTYPE html>
<html>
<head>
	<title>Добавление профиля</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-6">
        <h3>Добавить профиль</h3>
	<form method="POST" action="">

    <div class="form-group"> 
         <div>
          <label for="urobraz">Уровень образования <br></label>
           <select name="urobraz" class="form-control" id="urobraz">
            <option value='&nbsp;'>Выбрать...</option>
            <option value="Бакалавриат">Бакалавриат</option>
            <option value="Магистратура">Магистратура</option>
            <option value="СПО">СПО</option>
        </select>
        </div>
       
 
          <label for="napravlenie">Направление</label>
          <select name="napravlenie" class="form-control" id="napravlenie">
            
        </select>
        
          <label for="profil">Профиль</label>
          <input type="text" class="form-control" name="profil">    
        
          

  		<br>
     <a type="button" class="btn btn-secondary" href="#" onclick="history.back();return false;">Вернуться назад</a>
        <button type="submit" class="btn btn-primary" name="dobnaprav">Сохранить в БД</button><br>
        
       <?php 
if (isset($_POST['urobraz'], $_POST['napravlenie'], $_POST['profil'])){ 
 // Переменные с формы


$urobraz = $_POST['urobraz'];
$napravlenie = $_POST['napravlenie'];
$profil = $_POST['profil'];


// Подключение к базе данных
include ('db.php'); 


// Добавление нового направления

$result = $mysqli->query("INSERT INTO profili (Profil, id_naprav) VALUES ('$profil', '$napravlenie')");


if ($result == true){
  echo "Профиль $profil дабавлен в базу данных";
}else{
  echo "Ошибка при добавлении профиля в БД. Возможно такая запись уже существует ";
}

}


?>
 </form>
 </div>
 </div>

</div>





<!--Скрипт подбора направлений по уровню образования-->
<script>
$(document).ready(function(){

$('#urobraz').change(function(){
$.ajax({
type: "POST",
url: "show3.php",
data: "urobraz="+$("#urobraz").val(),
success: function(html){
$("#napravlenie").html(html);
}
});
return false;
});

});
</script>


</body>
</html>



