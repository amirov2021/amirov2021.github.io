<html>
<head>
    <title>Программа поиска книг (файл search_book.php)</title>
</head>
<body>
<?php
$searchterm = trim ( $_POST['searchterm'] );
if (!$searchterm)
    die ("Не все данные введены.<br>
    Пожалуйста, вернитесь назад и закончите ввод");
$searchterm = addslashes ($searchterm);
$link = mysql_pconnect ();
if ( !$link ) die ("Невозможно подключение к MySQL");
$db = "synergy";
mysql_select_db ( $db ) or die ("Невозможно открыть $db");
$query = "SELECT * FROM napravleniya WHERE "
    .$_POST['searchtype']." like '%".$searchterm."%'";
$result = mysql_query ( $query );
$n = mysql_num_rows ( $result );
for ( $i=0; $i<$n; $i++ )
{
    $row = mysql_fetch_array($result);
    echo "<p><b>".($i+1). $row['title']. "</b><br>";
    echo "ID: ".$row['id']."<br>";
    echo "Наименование: ".$row['name']."<br>";
    }
if ( $n == 0 ) echo "Ничего не можем предложить. Извините";
mysql_close ( $link );
?>
</body>
</html>