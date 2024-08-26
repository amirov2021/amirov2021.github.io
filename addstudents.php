<!-- Шапка -->
    <?php include 'header.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Ввод данных</title>
  
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
  
</head>
<body style="background: #EEEFEF;">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Выводим номер ЛД из БД и прибавляем +1-->
<?php
              include ('db.php');         
              // Выбираем БД для работы в MySQL.
              $db_select = mysqli_select_db ($mysqli, $db_base);

              
            
            if ($db_select == true) {$result = $mysqli->query("SELECT * FROM `abiturienti` ORDER BY `nomerld` DESC LIMIT 1");
            $pzap = mysqli_fetch_row($result);
            $newnomerld = ++$pzap[1];
            }
            
            // Текущая дата для заявления.   
            $p = date("Y-m-d");

        ?>



<!-- Начало страницы-->
  <div class="container">
    <form enctype="multipart/form-data" action="./obr.php" method="post">
     <div class="row">
      <div class="form-group col-6">
        <h1>Форма ввода данных</h1>
      </div>
       <div class="form-group col-3">
        <label for="nomerld">Номер личного дела</label>
        <input type="number" class="form-control" name="nomerld" value="<?php echo $newnomerld; ?>">
        </div>
        <div class="form-group col-3" id="prov"> 
          <label for="datazayav">Дата заявления</label>
         <input type="date" class="form-control" name="datazayav" value="<?php echo $p?>">
        </div>
      </div>
      <hr>
      <h3 style="text-align: center;">Паспортные данные абитуриента</h3>
     <div class="row">
       <div class="form-group col">
        <label for="familiya">Фамилия</label>
        <input type="text" class="form-control" name="familiya">
        </div>
        <div class="form-group col"> 
          <label for="imya">Имя</label>
         <input type="text" class="form-control" name="imya">
        </div>
        <div class="form-group col"> 
         <label for="otchestvo">Отчество</label>
         <input type="text" class="form-control" name="otchestvo"><br>
       </div>
       <div class="form-group col">
        <div class="form-group">
    		<label for="image">Фото</label>
    		<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    		<input type="file" class="form-control-file" id="image" name="image">
  		</div>
       </div>
      </div>
      <div class="row">
      	<div class="form-group col-2">
        <div>
          <label for="pol">Пол <br></label> </div>
            <label class="radio-inline"><input type="radio" name="pol" checked value="Муж."> Муж.</label>
            <label class="radio-inline"><input type="radio" name="pol" value="Жен."> Жен.</label>
       </div>
       <div class="form-group col-2">
         <label for="datarozhd">Дата рождения</label>
         <input type="date" class="form-control" name="datarozhd" placeholder="Дата рождения">
        </div>
        <div class="form-group col"> 
         <label for="mestorozhd">Место рождения</label>
         <input type="text" class="form-control" name="mestorozhd"><br>
        </div>
      </div>
      <div class="row">
       <div class="form-group col-4">
        <label for="grazhd">Гражданство</label>
        <select name="grazhd" class="form-control" onchange="select_gr(this.value)">
          <option selected>Выбрать...</option>
          <option value="РФ">РФ</option>
          <option value="Азербайджан">Азербайджан</option>
          <option value="Украина">Украина</option>
          <option value="Казахстан">Казахстан</option>
          <option value="Казахстан">Узбекистан</option>
        </select>
      </div>
        <div class="form-group col-4"> 
          <label for="docudl">Документ, удостоверяющий личность</label>
          <select name="docudl" class="form-control" id="docudl">
            <option selected>Выбрать...</option>
            <option value="Паспорт гражданина РФ">Паспорт гражданина РФ</option>
            <option value="Паспорт иностранного гражданина">Паспорт иностранного гражданина</option>
          </select>
        </div>
        <div class="form-group col-2"> 
         <label for="seriyapasporta">Серия паспорта</label>
         <input type="text" class="form-control" name="seriyapasporta">
       </div>
       <div class="form-group col-2"> 
         <label for="nomerpasporta">Номер паспорта</label>
         <input type="text" class="form-control" name="nomerpasporta"><br>
       </div>
      </div>
      <div class="row">
       <div class="form-group col-4">
         <label for="datavidachi">Дата выдачи</label>
         <input type="date" class="form-control" name="datavidachi" >
        </div>
        <div class="form-group col-8"> 
         <label for="organvidachi">Кем выдан</label>
         <input type="text" class="form-control" name="organvidachi"><br>
        </div>
      </div>
      <div class="row">
        <div class="form-group col-12"> 
         <label for="adresprozhivaniya">Адрес проживания</label>
         <input type="text" class="form-control" name="adresprozhivaniya"><br>
        </div>
      </div>
      <h3 style="text-align: center;">Документ о предыдущем образовании</h3>
      <hr>
      <div class="row">
         <div class="form-group col"> 
          <label for="dokobob">Тип документа</label>
          <select name="dokobob" class="form-control" id="dokobob" onchange="select_tipdoc(this.value)">
            <option selected>Выбрать...</option>
            <option>Аттестат</option>
            <option>Диплом</option>
          </select>
        </div>
       <div class="form-group col"> 
         <label for="godokan">Год окончания</label>
         <input type="text" class="form-control" name="godokan"><br>
       </div>
       <div class="form-group col"> 
         <label for="serdok">Серия документа</label>
         <input type="text" class="form-control" name="serdok"><br>
       </div>
       <div class="form-group col"> 
         <label for="nomerdok">Номер документа</label>
         <input type="text" class="form-control" name="nomerdok"><br>
       </div>
      </div>
      <div class="row">
        <div class="form-group col"> 
         <label for="uchzaved">Учебное заведение:</label>
         <input type="text" class="form-control" name="uchzaved">
       </div>
      </div>
      <h3 style="text-align: center;">Контактные данные абитуриента</h3>
      <hr>
      <div class="row">
         <div class="form-group col"> 
          <label for="nomerstud">Телефон студента</label>
         <input type="text" class="form-control" name="nomerstud">
        </div>
        <div class="form-group col"> 
         <label for="nomerpred">Телефон представителя</label>
         <input type="text" class="form-control" name="nomerpred">
       </div>
       <div class="form-group col"> 
         <label for="emailstud">Эл. почта</label>
         <input type="email" class="form-control" name="emailstud"><br>
       </div>
      </div>
      <h3 style="text-align: center;">Выбор образовательного продукта</h3>
      <hr>
      <div class="row">
        <div class="form-group col"> 
         <div>
          <label for="tipobraz">Тип образования <br></label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipobraz" id="tipobraz" value="ВПО" onclick="select_tipobraz(this.value)">
          <label class="form-check-label" for="tipobraz"> Высшее образование</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="tipobraz" id="tipobraz" value="СПО" onclick="select_tipobraz(this.value)">
          <label class="form-check-label" for="tipobraz"> Среднее профессиональное образование</label>
      </div>
     </div>
      <div class="form-group col"> 
         <div>
          <label for="urobraz">Уровень образования <br></label>
        </div>
        <div class="form-check" id="urobraz_bak">
          <input class="form-check-input" type="radio" name="urobraz" id="bak" value="Бакалавриат">
          <label class="form-check-label" for="urobraz" > Бакалавриат</label>
        </div>
        <div class="form-check" id="urobraz_mag">
          <input class="form-check-input" type="radio" name="urobraz" id="mag" value="Магистратура">
          <label class="form-check-label" for="urobraz"> Магистратура</label>
        </div>
        <div class="form-check" id="urobraz_spo">
          <input class="form-check-input" type="radio" name="urobraz" id="spo" value="СПО">
          <label class="form-check-label" for="urobraz"> СПО</label>
        </div>
     </div>
     <div class="form-group col"> 
         <div>
          <label for="formaob">Форма обучения <br></label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaob" id="formaob" value="Очная" >
          <label class="form-check-label" for="formaob"> Очная</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaob" id="formaob" value="Очно-заочная">
          <label class="form-check-label" for="formaob"> Очно-заочная</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="formaob" id="formaob" value="Заочная">
          <label class="form-check-label" for="formaob"> Заочная</label>
        </div>
     </div>
     <div class="form-group col"> 
         <div>
          <label for="srokosop">Cрок освоения образовательной программы <br></label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="srokosop" id="srokosop_u" value="Ускоренный">
          <label class="form-check-label" for="srokosop"> Ускоренный</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="srokosop" id="srokosop_p" value="Полный">
          <label class="form-check-label" for="srokosop"> Полный</label>
        </div>
     </div>
     </div>
     
    
    </script>
      <div class="row">
        <div class="form-group col-6"> 
          <label for="napravlenie">Направление <a href="./dobnapravlenie.php">(+)</a></label>
          <select name="napravlenie" class="form-control" id="napravlenie">
            
				</select>
        </div>         
        <div class="form-group col-6"> 
          <label for="profil">Профиль <a href="./dobprofil.php">(+)</a></label>
          <select name="profil" class="form-control" id="profili">


           
        </select>          
        </div>
      </div>
      <div class="row">
        <div class="form-group col-3"> 
        <label for="nomdog">Номер договора</label>
        <input type="text" class="form-control" name="nomdog">
        </div>
        <div class="form-group col-2"> 
        <label for="datadog">Дата договора</label>
        <input type="date" class="form-control" name="datadog">
        </div>
        <div class="form-group col-3"> 
        <label for="stoimostob">Стоимость обучения (руб.)</label>
        <input type="number" class="form-control" name="stoimostob">
        </div>
        <div class="form-group col-4"> 
        <label for="kolsem">Количество семестров</label>
        <input type="number" class="form-control" name="kolsem">
        </div>
        </div>
        <div class="row">
         <div class="form-group col-2"> 
          <label for="nomerprikaza">Приказ о зачислении</label>
         <input type="text" class="form-control" name="nomerprikaza">
        </div>
        <div class="form-group col-3"> 
         <label for="datanachob">Дата начала обучения</label>
         <input type="date" class="form-control" name="datanachob">
       </div>
       <div class="form-group col-3"> 
        <label for="datioplati">Месяца оплаты</label>
          <select name="datioplati" class="form-control">
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
            echo "<option value='&nbsp;'>Выбрать...</option>";
            while($object = mysqli_fetch_object($result_select)){
            echo "<option value='$object->datioplati' > $object->datioplati </option>";}    
            ?>
        </select>          
        </div>
         
       
       <div class="form-group col-4"> 
         <label for="parol">Пароль от ЛК</label>
         <input type="text" class="form-control" name="pass"><br>
       </div>
      </div>
      <div id="blok-vi" style="display: none;">
      <h3 style="text-align: center;">Вступительные испытания</h3>
      <hr>
      <div class="row">
        <div class="form-check col">
          <label><input class="form-check-input position-static" type="radio" name="viborvi"  value="По результатам ЕГЭ" aria-label="..." onclick="select_vi(this.value)"> 
Участвую в конкурсе с результатами ЕГЭ Результат (балл)</label>
        </div>
        <div class="form-check col">
          <label><input class="form-check-input position-static" type="radio" name="viborvi"  value="По результатам ВИ" aria-label="..." onclick="select_vi(this.value)"> 
Сдаю вступительные испытания в Университет "Синергия"</label>
        </div>
        </div>
      
      <div class="row">
        <div class="form-group col"> 
          <label for="predmet1">Предмет 1</label>
          <select name="predmet1" class="form-control" id="predmet1">
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
      <div class="row" id="datiex" style="display:none;">
        <div class="form-group col">
          <label for="dataex1">Дата первого ВИ</label>
          <input type="date" class="form-control" name="dataex1">
        </div>
        <div class="form-group col">
          <label for="dataex2">Дата второго ВИ</label>
          <input type="date" class="form-control" name="dataex2">
        </div>
        <div class="form-group col">
          <label for="dataex3">Дата третьего ВИ</label>
          <input type="date" class="form-control" name="dataex3">
        </div>
      </div>
      <div class="row" id="balliege" style="display:none;">
        <div class="form-group col">
          <label for="balli1pred">Баллы ЕГЭ</label>
          <input type="number" class="form-control" name="balli1pred">
        </div>
        <div class="form-group col">
          <label for="balli2pred">Баллы ЕГЭ</label>
          <input type="number" class="form-control" name="balli2pred">
        </div>
        <div class="form-group col">
          <label for="balli3pred">Баллы ЕГЭ</label>
          <input type="number" class="form-control" name="balli3pred">
        </div>
      </div>
      <div id="osnvi" style="display: none;">
      <em style="font-size: 12pt; font-weight: bold;">Основания для участия в конкурсе по результатам вступительных испытаний, проводимых Университетом:</em>
      <div class="row">
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="1" aria-label="..."> 
ребенок-инвалид, инвалид</label>
      </div>
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="2" aria-label="..."> 
иностранный гражданин</label>
      </div>
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="3" aria-label="..." > 
лицо, поступающее на обучение на базе профессионального образования</label>
      </div>
      </div>
      <div class="row">
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="4" aria-label="..."> 
лицо, которое получило документ о среднем общем образовании в течение одного года до дня завершения приема документов и вступительных испытаний включительно, и все пройденные мною в указанный период аттестационные испытания государственной итоговой аттестации по образовательным программам среднего общего образования сданы не в форме ЕГЭ (либо прошло итоговые аттестационные процедуры в иностранных образовательных организациях и не сдавало ЕГЭ в указанный период).</label>
      </div>
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="5" aria-label="..."> 
лицо, которое прошло государственную итоговую аттестацию по общеобразовательным предметам в форме государственного выпускного экзамена, и получило документ о среднем общем образовании в течение одного года до дня завершения приема документов и вступительных испытаний включительно и в этот период не сдавали ЕГЭ по соответствующим общеобразовательным предметам</label>
      </div>
      <div class="form-check col">
        <label><input class="form-check-input position-static" type="radio" name="osnuchvkon" id="osnuchvkon" value="6" aria-label="..."> 
лицо, признанное гражданином РФ, или лицо, постоянно проживавшим на территории Крыма</label>
      </div>
      </div>
      </div>
      </div>
      <br>
  	
      
      <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
        <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
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

function select_vi(name) {
  switch (name) {
    case "По результатам ВИ" :
    document.getElementById("balliege").style.display = "none";
    document.getElementById("datiex").style.display = "";
    document.getElementById("osnvi").style.display = "";
    break;
    case "По результатам ЕГЭ" :
    document.getElementById("datiex").style.display = "none";
    document.getElementById("osnvi").style.display = "none";
    document.getElementById("balliege").style.display = "";
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
    document.getElementById("blok-vi").style.display = "";
    break;
    case "СПО" :
    document.getElementById("urobraz_spo").style.display = "";
    document.getElementById("urobraz_bak").style.display = "none";
    document.getElementById("urobraz_mag").style.display = "none";
    document.getElementById("blok-vi").style.display = "none";
    break;
  }
}
</script>

<!-- Выбор паспорта по гражданству -->
<script language="javascript">

function select_gr(name) {
  switch (name) {
    case "РФ" :
    document.getElementById('docudl').value = "Паспорт гражданина РФ";
    break;
    case "Азербайджан" :
    case "Казахстан" :
    case "Украина" :
    case "Узбекистан" :
    document.getElementById('docudl').value = "Паспорт иностранного гражданина";
    break;
  }
}
</script>

<!-- Выбор срока освоения ОП по документу об образовании -->
<script language="javascript">

function select_tipdoc(name) {
  switch (name) {
    case "Аттестат" :
    document.getElementById('srokosop_p').checked = true;
    break;
    case "Диплом" :
    document.getElementById('srokosop_u').checked = true;
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