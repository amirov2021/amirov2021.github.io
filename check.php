<?
// Скрипт проверки

// Соединямся с БД
include 'db.php';

if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
{ 
    $query = mysqli_query($mysqli, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
    if ($_COOKIE['id'] !== $userdata['user_id'] or $userdata['user_hash'] !== $_COOKIE['hash']) 
    {
        setcookie("id", "", time() - 10*60*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/", null, null, true); // httponly !!!
        print "Хм, что-то не получилось";
    }
    else 
    {
         // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: students.php"); exit();
    }
}
else
{
    print "Включите куки";
}
?>