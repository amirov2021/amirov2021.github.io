

<?php include 'header.php'; ?>

<div class="container-fluid">
	

		<?php 
// Подключение к базе данных
include ('db.php');
// Начало нумерации таблицы 
$nomer = 0;
//выбераем таблицу в БД
$result = $mysqli->query("SELECT * FROM abiturienti ORDER BY familiya");

if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк?> 
    
     
    <div class='col'>
        <table class='table'>
            <thead class='thead-dark'>
                <tr>
                    <th>№</th>
                    <th>ФИО слушателя</th>
                    <th>Программа</th>
                    <th>Договор </th>
                    <th>Телефон</th>
                    <th>Эл. почта</th>
                    <!--<th>Пароль от ЛК</th>-->
                    <th>Опции</th>
                </tr>
            </thead>
      <?php   
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row=$result->fetch_assoc();

            echo "<tr>";
            //Увеличить номер строки на 1
            $nomer = ++$nomer;
            //Присваиваем id
            $id = $row['ID'];
            //Выводим ФИО одной строкой
            $fio = $row['familiya']." ".$row['imya']." ".$row['otchestvo'];
            //выводим направления
            $zaprosnaprav = 'SELECT name FROM napravleniya WHERE id = '.$row['napravlenie'].'';
            $otvetnazapros = mysqli_query($mysqli, $zaprosnaprav);
            $naprav = mysqli_fetch_array($otvetnazapros);
            // выводим уровень образования
            $urobraz = " ";
            if ($row['urobraz'] == "Бакалавриат")
             {$urobraz = "БАК";} 
            elseif ($row['urobraz'] == "Магистратура") {
                 $urobraz = "МАГ";}
            elseif ($row['urobraz'] == "СПО") {
                 $urobraz = "СПО";}
            //выводим профиль
            $zaprosprofil = 'SELECT * FROM profili WHERE ID = '.$row['profil'].'';
            $otvetnazapros2 = mysqli_query($mysqli, $zaprosprofil);
            $profil = mysqli_fetch_array($otvetnazapros2);
            //Договор с датой читаемого формата
            $datadog = $row['datadog'];
            $datadog = date("d.m.Y", strtotime($datadog));
            $dogovor = $row['nomdog']." от ".$datadog;
            //выводим номер телефона
            $phone = $row['nomerstud'];
            //выводим эл.почту
            $email = $row['emailstud'];
            //выводим пароль от ЛК
            $pass = $row['Pass'];

                  
                echo "<td>$nomer</td><td><a href=\"editstudents.php?id=$id\">$fio</a></td> <td>$naprav[0] </td> <td>$dogovor</td><td>$phone</td> <td>$email</td> 

<td>
<form enctype='multipart/form-data' action='deletestud.php' method='post'>
<button type='submit' name='deleteid' value='$id'><img src='/img/delete.png'></button></form></div>

           </td>";
       echo "</tr>";
    }
    echo "</table>";

    // очищаем результат
    mysqli_free_result($result);
}





mysqli_close($mysqli);



 ?>


</div>

	</div>

</div>


</body>
</html>