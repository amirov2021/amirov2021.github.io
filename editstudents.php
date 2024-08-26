<?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Редактирование данных</title>
  
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
</head>

<body style="background: #EEEFEF;">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<?php 

require ('db.php'); 

$id = $_GET['id'];

 
$result = $mysqli->query("SELECT * FROM `abiturienti` WHERE `id` = '$id'");
$row = $result->fetch_assoc();

 ?>

  <!-- Содержимое -->
  <div class="container">
      <form enctype="multipart/form-data" action="./obr.php" method="post">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактирование данных</li>
          </ol>
        </nav>
     <div class="row">
      <div class="form-group col-6">
        <h1>Редактирование данных</h1>
        <input type="hidden" name="id" value="<?php echo "$id"; ?>">
      </div>
       <div class="form-group col-3">
        <label for="familiya">Номер личного дела</label>
        <input type="number" class="form-control" name="nomerld" value="<?php echo $row['nomerld']; ?>">
        </div>
        <div class="form-group col-3"> 
          <label for="imya">Дата заявления</label>
         <input type="date" class="form-control" name="datazayav" value="<?php echo $row['datazayav']; ?>">
        </div>
      </div>
      <hr>
      <h3 style="text-align: center;">Паспортные данные абитуриента</h3>
     <div class="row">
        <div class="col short-div" style="padding-left: 0;">
       <div class="form-group col">
        <label for="familiya">Фамилия</label>
        <input type="text" class="form-control" name="familiya" value="<?php echo $row['familiya']; ?>">
        </div>
        <div class="form-group col"> 
          <label for="imya">Имя</label>
         <input type="text" class="form-control" name="imya" value="<?php echo $row['imya']; ?>">
        </div>
        <div class="form-group col"> 
         <label for="otchestvo">Отчество</label>
         <input type="text" class="form-control" name="otchestvo" value="<?php echo $row['otchestvo']; ?>"><br>
       </div>
     </div>
       <div class="form-group col-3">
        <div class="form-group">
    		<label for="image">Фото</label>
        <br>
        <?php if (isset($row['foto'])) {
          $foto = $row['foto'];
          echo "<img src=\"img/$foto\" height=\"150px\">";
        } 

        ?>
        <br>
        <br>
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <input type="file" class="form-control-file" id="image-update" name="image-update">
  		</div>
       </div>
      </div>
      <div class="row">
      	<div class="form-group col-2">
        <div>
          <label for="pol">Пол <br></label> </div>
            <label class="radio-inline"><input type="radio" name="pol" value="<?php if ($row['pol']=='Муж.') {echo $row['pol'];}; ?>" <?php if ($row['pol']=='Муж.') {echo 'checked';}; ?>> Муж.</label>
            <label class="radio-inline"><input type="radio" name="pol" value="<?php if ($row['pol']=='Жен.') {echo $row['pol'];}; ?>" <?php if ($row['pol']=='Жен.') {echo 'checked';}; ?>> Жен.</label>
       </div>
       <div class="form-group col-2">
         <label for="datarozhd">Дата рождения</label>
         <input type="date" class="form-control" name="datarozhd" placeholder="Дата рождения" value="<?php echo $row['datarozhd']; ?>">
        </div>
        <div class="form-group col"> 
         <label for="mestorozhd">Место рождения</label>
         <input type="text" class="form-control" name="mestorozhd" value="<?php echo $row['mestorozhd']; ?>"><br>
        </div>
      </div>
      <div class="row">
       <div class="form-group col-4">
        <label for="grazhd">Гражданство</label>
        <select name="grazhd" class="form-control">
          <option <?php if ($row['grazhd']=='') {echo 'selected';}; ?>>Выбрать...</option>
          <option <?php if ($row['grazhd']=='Азербайджан') {echo 'selected';}; ?> value="Азербайджан">Азербайджан</option>
          <option <?php if ($row['grazhd']=='РФ') {echo 'selected';}; ?> value="РФ">РФ</option>
          <option <?php if ($row['grazhd']=='Украина') {echo 'selected';}; ?> value="Украина">Украина</option>
          <option <?php if ($row['grazhd']=='Казахстан') {echo 'selected';}; ?> value="Казахстан">Казахстан</option>
        </select>
      </div>
        <div class="form-group col-4"> 
          <label for="docudl">Документ, удостоверяющий личность</label>
          <select name="docudl" class="form-control" id="docudl">
            <option selected>Выбрать...</option>
            <option <?php if ($row['docudl']=='Паспорт гражданина РФ') {echo 'selected';}; ?> value="Паспорт гражданина РФ">Паспорт гражданина РФ</option>
            <option <?php if ($row['docudl']=='Паспорт иностранного гражданина') {echo 'selected';}; ?> value="Паспорт иностранного гражданина">Паспорт иностранного гражданина</option>
          </select>
        </div>
        <div class="form-group col-2"> 
         <label for="seriyapasporta">Серия паспорта</label>
         <input type="text" class="form-control"  name="seriyapasporta" value="<?php echo $row['seriyapasporta']; ?>">
       </div>
       <div class="form-group col-2"> 
         <label for="nomerpasporta">Номер паспорта</label>
         <input type="text" class="form-control"  name="nomerpasporta" value="<?php echo $row['nomerpasporta']; ?>"><br>
       </div>
      </div>
      <div class="row">
       <div class="form-group col-4">
         <label for="datavidachi">Дата выдачи</label>
         <input type="date" class="form-control" name="datavidachi" value="<?php echo $row['datavidachi']; ?>">
        </div>
        <div class="form-group col-8"> 
         <label for="organvidachi">Кем выдан</label>
         <input type="text" class="form-control" name="organvidachi" value="<?php echo $row['organvidachi']; ?>"><br>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12"> 
         <label for="adresprozhivaniya">Адрес проживания</label>
         <input type="text" class="form-control" name="adresprozhivaniya" value="<?php echo $row['adresprozhivaniya']; ?>"><br>
        </div>
      </div>
      <h3 style="text-align: center;">Документ о предыдущем образовании</h3>
      <hr>
      <div class="row">
         <div class="form-group col"> 
          <label for="dokobob">Тип документа</label>
          <select name="dokobob" class="form-control" id="dokobob">
            <option <?php if ($row['dokobob']=='') {echo 'selected';}; ?> >Выбрать...</option>
            <option <?php if ($row['dokobob']=='Аттестат') {echo 'selected';}; ?> >Аттестат</option>
            <option <?php if ($row['dokobob']=='Диплом') {echo 'selected';}; ?> >Диплом</option>
          </select>
        </div>
       <div class="form-group col"> 
         <label for="godokan">Год окончания</label>
         <input type="text" class="form-control" name="godokan" value="<?php echo $row['godokan']; ?>"><br>
       </div>
       <div class="form-group col"> 
         <label for="serdok">Серия документа</label>
         <input type="text" class="form-control" name="serdok" value="<?php echo $row['serdok']; ?>"><br>
       </div>
       <div class="form-group col"> 
         <label for="nomerdok">Номер документа</label>
         <input type="text" class="form-control" name="nomerdok" value="<?php echo $row['nomerdok']; ?>"><br>
       </div>
      </div>
      <div class="row">
        <div class="form-group col"> 
         <label for="uchzaved">Учебное заведение:</label>
         <?php $uchzaved=$row['uchzaved']?>
         <input type="text" class="form-control" name="uchzaved" value="<?php echo htmlspecialchars($uchzaved,ENT_QUOTES)?>">
       </div>
      </div>
      <h3 style="text-align: center;">Контактные данные абитуриента</h3>
      <hr>
      <div class="row">
         <div class="form-group col"> 
          <label for="nomerstud">Телефон студента</label>
         <input type="text" class="form-control" name="nomerstud" value="<?php echo $row['nomerstud']; ?>">
        </div>
        <div class="form-group col"> 
         <label for="nomerpred">Телефон представителя</label>
         <input type="text" class="form-control" name="nomerpred" value="<?php echo $row['nomerpred']; ?>">
       </div>
       <div class="form-group col"> 
         <label for="emailstud">Эл. почта</label>
         <input type="email" class="form-control" name="emailstud" value="<?php echo $row['emailstud']; ?>"><br>
       </div>
      </div>
      <h3 style="text-align: center;">Выбор образовательного продукта</h3>
      <div class="form-check" style="text-align: center;">
      <input type="checkbox" name="edit_product" id="edit_product" value="edit">
      <label class="form-check-label" for="edit_product"> Редактировать</label>
      </div>
      <hr>
      <div class="row">
        <div class="form-group col"> 
         <div>
          <label for="tipobraz">Тип образования <br></label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipobraz" id="tipobraz" value="ВПО"  <?php if ($row['tipobraz']=='ВПО') {echo 'checked';}; ?>>
          <label class="form-check-label" for="tipobraz"> Высшее образование</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipobraz" id="tipobraz" value="СПО"  <?php if ($row['tipobraz']=='СПО') {echo 'checked ';}; ?>>
          <label class="form-check-label" for="tipobraz"> Среднее профессиональное образование</label>
      </div>
     </div>
      <div class="form-group col"> 
         <div>
          <label for="urobraz">Уровень образования <br></label>
        </div>
        <div class="form-check" id="urobraz_bak">
          <input class="form-check-input" type="radio" name="urobraz" id="bak" value="Бакалавриат"  <?php if ($row['urobraz']=='Бакалавриат') {echo 'checked';}; ?>>
          <label class="form-check-label" for="urobraz"> Бакалавриат</label>
        </div>
        <div class="form-check" id="urobraz_mag">
          <input class="form-check-input" type="radio" name="urobraz" id="mag" value="Магистратура"  <?php if ($row['urobraz']=='Магистратура') {echo 'checked';}; ?>>
          <label class="form-check-label" for="urobraz"> Магистратура</label>
        </div>
        <div class="form-check" id="urobraz_spo">
          <input class="form-check-input" type="radio" name="urobraz" id="spo" value="СПО"  <?php if ($row['urobraz']=='СПО') {echo 'checked';}; ?>>
          <label class="form-check-label" for="urobraz"> СПО</label>
        </div>
     </div>
     <div class="form-group col"> 
         <div>
          <label for="formaob">Форма обучения <br></label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaob" id="formaob" value="Очная"  <?php if ($row['formaob']=='Очная') {echo 'checked';}; ?>>
          <label class="form-check-label" for="formaob"> Очная</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaob" id="formaob" value="Очно-заочная"  <?php if ($row['formaob']=='Очно-заочная') {echo 'checked';}; ?>>
          <label class="form-check-label" for="formaob"> Очно-заочная</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaob" id="formaob" value="Заочная"  <?php if ($row['formaob']=='Заочная') {echo 'checked';}; ?>>
          <label class="form-check-label" for="formaob"> Заочная</label>
        </div>
     </div>
     <div class="form-group col"> 
         <div>
          <label for="srokosop">Cрок освоения образовательной программы <br></label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="srokosop" id="srokosop" value="Ускоренный" <?php if ($row['srokosop']=='Ускоренный') {echo 'checked';}; ?>>
          <label class="form-check-label" for="srokosop"> Ускоренный</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="srokosop" id="srokosop" value="Полный"  <?php if ($row['srokosop']=='Полный') {echo 'checked';}; ?> >
          <label class="form-check-label" for="srokosop"> Полный</label>
        </div>
     </div>
     </div>
      <div class="row">
        
        <div class="form-group col-6"> 
          <label for="napravlenie">Направление <a href="./dobnapravlenie.php">(+)</a></label>
          <select name="napravlenie" class="form-control">
            <?php  //выводим направления
            $zaprosnaprav = 'SELECT * FROM napravleniya WHERE id = '.$row['napravlenie'].'';
            $otvetnazapros = mysqli_query($mysqli, $zaprosnaprav);
            $naprav = $otvetnazapros->fetch_assoc();
            ?>
            <option value="<?php echo $naprav['ID']; ?>"><?php echo $naprav['name']; ?></option>



          	<?php
          		include ('db.php'); 

       			$db_base_ref = 'napravleniya';// Имя таблицы
				mysqli_set_charset($mysqli, "utf8");
				// Выбираем БД для работы в MySQL.
				 $db_select = mysqli_select_db ($mysqli, $db_base);
				if (!$db_select) {
				echo "Не удалось выбрать БД MySQL.";
				exit;
				}
				// Делаем выборку из таблицы.
				$sql = 'SELECT * FROM napravleniya WHERE id != '.$row['napravlenie'].'';
				$result_select = mysqli_query($mysqli, $sql);  
				while($object = mysqli_fetch_object($result_select)){
				
				echo "<option value='$object->name' > $object->name </option>";}
				
				?>
				</select>	         
        </div>
        <div class="form-group col-6"> 
          <label for="profil">Профиль <a href="./dobprofil.php">(+)</a></label>
          <?php  //выводим выбранный профиль
            $zaprosprofil = 'SELECT Profil FROM profili WHERE ID = '.$row['profil'].'';
            $otvetnazapros2 = mysqli_query($mysqli, $zaprosprofil);
            $profil = $otvetnazapros2 ->fetch_assoc();
            ?>
          <select name="profil" class="form-control" id="profili">
           <option value="<?php echo $row['profil']; ?>"><?php echo $profil['Profil']; ?></option>
           <?php  //выводим остальные профили
            $zaprosprofil2 = 'SELECT Profil FROM profili WHERE ID != '.$row['profil'].' AND id_naprav = '.$row['napravlenie'].'';
            $otvetnazapros3 = mysqli_query($mysqli, $zaprosprofil2);
            while($object = mysqli_fetch_object($otvetnazapros3)) {
            echo "<option value='$object->ID' > $object->Profil </option>";}  
            ?>
        </select>          
        </div>
        <div class="form-group col-3"> 
        <label for="nomdog">Номер договора</label>
        <input type="text" class="form-control" name="nomdog" value="<?php echo $row['nomdog']; ?>">
        </div>
        <div class="form-group col-2"> 
        <label for="datadog">Дата договора</label>
        <input type="date" class="form-control" name="datadog" value="<?php echo $row['datadog']; ?>">
        </div>
        <div class="form-group col-3"> 
        <label for="stoimostob">Стоимость обучения (руб.)</label>
        <input type="number" class="form-control" name="stoimostob" value="<?php echo $row['stoimostob']; ?>">
        </div>
        <div class="form-group col-4"> 
        <label for="kolsem">Количество семестров</label>
        <input type="number" class="form-control" name="kolsem" value="<?php echo $row['kolsem']; ?>">
        </div>
      </div>
      <div class="row">
         <div class="form-group col-2"> 
          <label for="nomerprikaza">Приказ о зачислении</label>
         <input type="text" class="form-control" name="nomerprikaza" value="<?php echo $row['prikaz']; ?>">
        </div>
        <div class="form-group col-3"> 
         <label for="datanachob">Дата начала обучения</label>
         <input type="date" class="form-control" name="datanachob" value="<?php echo $row['datanachob']; ?>">
       </div>
       <div class="form-group col-3"> 
        <?php $datioplati = $row['datioplati']; ?>
        <label for="datioplati">Месяца оплаты</label>
          <select name="datioplati" class="form-control" >
            <?php
            mysqli_set_charset($mysqli, "utf8");
            // Выбираем БД для работы в MySQL.
            $db_select = mysqli_select_db ($mysqli, $db_base);
            if (!$db_select) {
            echo "Не удалось выбрать БД MySQL.";
            exit;
            }
            // Делаем выборку из таблицы.
            $sql = "SELECT * FROM datioplati";
            $result_select = mysqli_query($mysqli, $sql);  
            echo "<option value='&nbsp;'>$datioplati</option>";
            while($object = mysqli_fetch_object($result_select)){
            echo "<option value='$object->datioplati' > $object->datioplati </option>";}    
            ?>
        </select>          
        </div>
         
       
       <div class="form-group col-2"> 
         <label for="login">Логин</label>
         <input type="text" class="form-control" name="login" value="<?php echo $row['login']; ?>"><br>
       </div>
       <div class="form-group col-2"> 
         <label for="parol">Пароль</label>
         <input type="text" class="form-control" name="pass" value="<?php echo $row['Pass']; ?>"><br>
       </div>
      </div>
      <h3 style="text-align: center;">Вступительные испытания</h3>
      <hr>
      <div class="row">
        <div class="form-check col">
          <label><input class="form-check-input position-static" type="radio" name="viborvi" id="viborvi" value="По результатам ЕГЭ" aria-label="..." onclick="select_(this.value)" <?php if ($row['viborvi']=='По результатам ЕГЭ') {echo 'checked';}; ?>> 
Участвую в конкурсе с результатами ЕГЭ Результат (балл)</label>
        </div>
        <div class="form-check col">
          <label><input class="form-check-input position-static" type="radio" name="viborvi" id="viborvi" value="По результатам ВИ" aria-label="..." onclick="select_(this.value)" <?php if ($row['viborvi']=='По результатам ВИ') {echo 'checked';}; ?>> 
Сдаю вступительные испытания в Университет "Синергия"</label>
        </div>
      </div>
      <div class="row">
        <div class="form-group col"> 
          <label for="predmet1">Предмет 1</label>
          <select name="predmet1" class="form-control" id="predmet1">
            <option value="<?php echo $row['predmet1']; ?>"><?php echo $row['predmet1']; ?></option>
          		<?php
          		include ('db.php'); 
				$db_base_ref = 'disciplinivi';// Имя таблицы
				mysqli_set_charset($mysqli, "utf8");
				// Выбираем БД для работы в MySQL.
				 $db_select = mysqli_select_db ($mysqli, $db_base);
				if (!$db_select) {
				echo "Не удалось выбрать БД MySQL.";
				exit;
				}
				// Делаем выборку из таблицы.
				$sql = "SELECT * FROM disciplinivi";
				$result_select = mysqli_query($mysqli, $sql);  
				echo "<option value='&nbsp;'>Выбрать...</option>";
				while($object = mysqli_fetch_object($result_select)){

				echo "<option value='$object->Name' > $object->Name</option>";}
				echo "</select>";
				?>
           </div>
        <div class="form-group col"> 
          <label for="predmet2">Предмет 2</label>
          <select name="predmet2" class="form-control" id="predmet2">
            <option value="<?php echo $row['predmet2']; ?>"><?php echo $row['predmet2']; ?></option>
            <?php
          		include ('db.php'); 
				$db_base_ref = 'disciplinivi';// Имя таблицы
				mysqli_set_charset($mysqli, "utf8");
				// Выбираем БД для работы в MySQL.
				 $db_select = mysqli_select_db ($mysqli, $db_base);
				if (!$db_select) {
				echo "Не удалось выбрать БД MySQL.";
				exit;
				}
				// Делаем выборку из таблицы.
				$sql = "SELECT * FROM disciplinivi";
				$result_select = mysqli_query($mysqli, $sql);  
				echo "<option value='&nbsp;'>Выбрать...</option>";
				while($object = mysqli_fetch_object($result_select)){
				echo "<option value='$object->Name' > $object->Name</option>";}
				echo "</select>";
				?>
          </div>
        <div class="form-group col"> 
          <label for="predmet3">Предмет 3</label>
          <select name="predmet3" class="form-control" id="predmet3">
            <option value="<?php echo $row['predmet3']; ?>"><?php echo $row['predmet3']; ?></option>
            <?php
          		include ('db.php');  //Подключение к БД
				$db_base_ref = 'disciplinivi';// Имя таблицы
				mysqli_set_charset($mysqli, "utf8"); //Перевод в кодировку utf8
				// Выбираем БД для работы в MySQL.
				 $db_select = mysqli_select_db ($mysqli, $db_base);
				if (!$db_select) {
				echo "Не удалось выбрать БД MySQL.";
				exit;
				}
				// Делаем выборку из таблицы.
				$sql = "SELECT * FROM disciplinivi";
				$result_select = mysqli_query($mysqli, $sql);  
				echo  "<option value='&nbsp;'>Выбрать...</option>";
				while($object = mysqli_fetch_object($result_select)){
				echo  "<option value='$object->Name' > $object->Name</option>";}
				?>
				</select>
        </div>
        </div>
        <!--Если графа предмет 1 подгрузилась, показать блок даты ВИ-->
        <?php if (isset($row['predmet1'])) {
          $pokaz = '';
        } else {
          $pokaz = "display:none;";
        }  ?>
      <div class="row" id="datiex" style="<?php echo $pokaz;?>">
        <div class="form-group col">
          <label for="dataex1">Дата первого ВИ</label>
          <input type="date" class="form-control" name="dataex1" value="<?php echo $row['dataex1']; ?>">
        </div>
        <div class="form-group col">
          <label for="dataex2">Дата второго ВИ</label>
          <input type="date" class="form-control" name="dataex2" value="<?php echo $row['dataex2']; ?>">
        </div>
        <div class="form-group col">
          <label for="dataex3">Дата третьего ВИ</label>
          <input type="date" class="form-control" name="dataex3" value="<?php echo $row['dataex3']; ?>">
        </div>
      </div>
      <!--Если графа ВИ по результатам ЕГЭ , показать блок Баллы, если нет, то показать основания для участия в конкурсе по результатам ВИ-->
        <?php if ($row['viborvi']=='По результатам ЕГЭ') {
          $pokaz2 = '';
          $pokaz3 = "display:none;";
        } else {
          $pokaz2 = "display:none;";
          $pokaz3 = '';
        }  ?>
      <div class="row" id="balliege" style="<?php echo $pokaz2;?>">
        <div class="form-group col">
          <label for="balli1pred">Баллы ЕГЭ</label>
          <input type="number" class="form-control" name="balli1pred" value="<?php echo $row[39]; ?>">
        </div>
        <div class="form-group col">
          <label for="balli2pred">Баллы ЕГЭ</label>
          <input type="number" class="form-control" name="balli2pred" value="<?php echo $row[40]; ?>">
        </div>
        <div class="form-group col">
          <label for="balli3pred">Баллы ЕГЭ</label>
          <input type="number" class="form-control" name="balli3pred" value="<?php echo $row[41]; ?>">
        </div>
      </div>
      <div id="osnvi" style="<?php echo $pokaz3;?>">
      <em style="font-size: 12pt; font-weight: bold;">Основания для участия в конкурсе по результатам вступительных испытаний, проводимых Университетом:</em>
      <div class="row">
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="1" aria-label="..." <?php if ($row["osnuchvkon"]=='1') {echo 'checked';}; ?>> 
ребенок-инвалид, инвалид</label>
      </div>
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="2" aria-label="..." <?php if ($row["osnuchvkon"]=='2') {echo 'checked';}; ?>> 
иностранный гражданин</label>
      </div>
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="3" aria-label="..." <?php if ($row["osnuchvkon"]=='3') {echo 'checked';}; ?>> 
лицо, поступающее на обучение на базе профессионального образования</label>
      </div>
      </div>
      <div class="row">
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="4" aria-label="..." <?php if ($row["osnuchvkon"]=='4') {echo 'checked';}; ?>> 
лицо, которое получило документ о среднем общем образовании в течение одного года до дня завершения приема документов и вступительных испытаний включительно, и все пройденные мною в указанный период аттестационные испытания государственной итоговой аттестации по образовательным программам среднего общего образования сданы не в форме ЕГЭ (либо прошло итоговые аттестационные процедуры в иностранных образовательных организациях и не сдавало ЕГЭ в указанный период).</label>
      </div>
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="5" aria-label="..." <?php if ($row["osnuchvkon"]=='5') {echo 'checked';}; ?>> 
лицо, которое прошло государственную итоговую аттестацию по общеобразовательным предметам в форме государственного выпускного экзамена, и получило документ о среднем общем образовании в течение одного года до дня завершения приема документов и вступительных испытаний включительно и в этот период не сдавали ЕГЭ по соответствующим общеобразовательным предметам</label>
      </div>
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="6" aria-label="..." <?php if ($row["osnuchvkon"]=='5') {echo 'checked';}; ?>> 
лицо, признанное гражданином РФ, или лицо, постоянно проживавшим на территории Крыма</label>
      </div>
      </div>
      </div>
      <br>
  	 <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <button type="submit" class="btn btn-primary" name="update">Сохранить</button>
        <div class="btn-group" role="group">
          <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Печатные формы</button>
          <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <li><button type="submit" class="dropdown-item" name="zayavlenie">Заявление</button></li>
            <li><button type="submit" class="dropdown-item" name="sogl-na-zachisl">Согласие на зачисление</button></li>
            <li><button type="submit" class="dropdown-item" name="sogl-na-pd">Согласие на обработку ПД</button></li>
            <li><button type="submit" class="dropdown-item" name="zayavlenie">Договор</button></li>
            <li><button type="submit" class="dropdown-item" name="exlist">Экзаменационный лист</button></li>
            <li><button type="submit" class="dropdown-item" name="raspiska">Расписка</button></li>
          </ul>
        </div>
    </div>     
    </form>
    
  </div>  

      </div>
    </div>
  </div>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
</div>


<!-- Показать скрытые дивы -->
<script language="javascript">

function select_(name) {
  switch (name) {
    case "По результатам ВИ" :
    document.getElementById("datiex").style.display = "";
    document.getElementById("balliege").style.display = "none";
    document.getElementById("osnvi").style.display = "";
    break;
    case "По результатам ЕГЭ" :
    document.getElementById("datiex").style.display = "none";
    document.getElementById("balliege").style.display = "";
    document.getElementById("osnvi").style.display = "none";
    break;
  }
}
</script>


<!-- Показать скрытые дивы -->
<script language="javascript">

function select_gr(name) {
  switch (name) {
    case "РФ" :
    document.getElementById('docudl').value = "Паспорт гражданина РФ";
    break;
    case "Азербайджан" :
    case "Казахстан" :
    case "Украина" :
    document.getElementById('docudl').value = "Паспорт иностранного гражданина";
    break;
  }
}
</script>



<!-- Cкрыть дивы по выбору уровня образования -->
<script language="javascript">

function select_tipobraz(name) {
  switch (name) {
    case "ВПО" :
    document.getElementById("urobraz_spo").style.display = "none";
    document.getElementById("urobraz_bak").style.display = "";
    document.getElementById("urobraz_mag").style.display = "";
    break;
    case "СПО" :
    document.getElementById("urobraz_spo").style.display = "";
    document.getElementById("urobraz_bak").style.display = "none";
    document.getElementById("urobraz_mag").style.display = "none";
    break;
  }
}
</script>

<!--Скрипт подбора направлений по уровню образования-->
<script>
$(document).ready(function(){

$('#bak').change(function(){
$.ajax({
type: "POST",
url: "show2.php",
data: "bak="+$("#bak").val(),
success: function(html){
$("#napravlenie").html(html);
}
});
return false;
});

});
</script>

<script>
$(document).ready(function(){

$('#mag').change(function(){
$.ajax({
type: "POST",
url: "show2.php",
data: "mag="+$("#mag").val(),
success: function(html){
$("#napravlenie").html(html);
}
});
return false;
});

});
</script>

<script>
$(document).ready(function(){

$('#spo').change(function(){
$.ajax({
type: "POST",
url: "show2.php",
data: "spo="+$("#spo").val(),
success: function(html){
$("#napravlenie").html(html);
}
});
return false;
});

});
</script>


<!--Скрипт подбора профилей-->
<script>
$(document).ready(function(){

$('#napravlenie').change(function(){
$.ajax({
type: "POST",
url: "show.php",
data: "napravlenie="+$("#napravlenie").val(),
success: function(html){
$("#profili").html(html);
}
});
return false;
});

});
</script>





</body>
</html>