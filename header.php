<?php  
// Соединямся с БД
include 'db.php';
require 'functions.php';



    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
    if ($_COOKIE['id'] == $userdata['user_id'] or $userdata['user_hash'] == $_COOKIE['hash']) 
    {
        $user_name = $userdata['user_name']." ".$userdata['user_fam']; 
    }


?>
<!DOCTYPE html>
<html>
<head>
	<title>БД слушателей ЦИТИРО "Интеллект"</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/sr.css" >
</head>
<body id="shapka-header">
  <div class="container-fluid shapka">
    <nav class="navbar navbar-expand-lg navbar navbar-dark" style="background-color: #007BFF;">
  <a class="navbar-brand" href="/"><img src="img/logo_intelekt2.png" width="100px" style="padding-left: 25px;"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="addstudents.php">Добравить слушателя</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
      <input class="form-control mr-sm-2" type="search" required placeholder="Поиск по Фамилии" aria-label="Search" name="poisk">
      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Поиск</button>
      
  
</div>
    </form>
    <!--<span>&nbsp;&nbsp;</span>
    <button class="btn btn-outline-light my-2 my-sm-0" type="submit" value="full-poisk" onclick="full_poisk(this.value)">Расширенный поиск</button>-->
  </div>
  
  <div class="col">
        <div class="btn-group blok-avtorizaciya-top" role="group" aria-label="Button group with nested dropdown">

  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <?php  echo "$user_name" ?>
    </button>
    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <li><a class="dropdown-item" href="admin/logout.php">Выйти</a></li>
    </ul>
  </div>
</div>
</nav>
<br>


     
    
  </div>
	
<div class="col" id="blok-full-poisk" style="display: none; ">
  <?php include 'full-poisk.php'; ?>
</div>


<!-- Подгрузить скрипт расширенного поиска -->
<script language="javascript">

function full_poisk(name) {
  switch (name) {
    case "full-poisk" :
    document.getElementById("blok-full-poisk").style.display = "";
    break;
    case "zakrit" :
    document.getElementById("blok-full-poisk").style.display = "none";
    break;
  }
}
</script>