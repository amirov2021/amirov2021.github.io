<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php


require ('db.php'); 



     
if(isset($_POST['deleteid'])){
    $id = $_POST['deleteid'];
    $stringid = mysqli_real_escape_string($mysqli, $id);
    $query = "DELETE FROM abiturienti WHERE ID = '$id'";
    $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
 
    mysqli_close($mysqli);
    // перенаправление на скрипт index.php
    
echo "<script>window.location.replace('http://synergy-men');</script>";
echo 'Перенаправление… Перейдите по <a href="http://synergy-men">ссылке</a>.';
exit();
}; ?>
 

</body>
</html>