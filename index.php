<?
// Страница авторизации

// Соединямся с БД
include 'db.php';

//проверяем есть ли забитые куки
if (isset($_COOKIE['id']) and isset($_COOKIE['hash'])) 
{
    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
    if ($_COOKIE['id'] == $userdata['user_id'] or $userdata['user_hash'] == $_COOKIE['hash']) 
    {
        include 'students.php';
        exit();    
    }
}

$bag = '';

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

// Соединямся с БД
include 'db.php';


if(isset($_POST['submit']))
{
    // Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($mysqli,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($mysqli,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);

    // Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        if(!empty($_POST['not_attach_ip']))
        {
            // Если пользователя выбрал привязку к IP
            // Переводим IP в строку
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }

        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($mysqli, "UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");

        // Ставим куки
        setcookie("id", $data['user_id'], time()+60*60*24, "/");
        setcookie("hash", $hash, time()+60*60*24, "/", null, null, true); // httponly !!!

        // Переадресовываем браузер на страницу проверки нашего скрипта
        header("Location: check.php"); exit();

    }
    else
    {
        $bag = "Вы ввели неправильный логин/пароль";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Авторизация</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/sr.css" >
</head>
<body>
    <div class="conteiner">
        <div class="row">
            <div class="col blok-avtorizaciya">
                <h3>АВТОРИЗАЦИЯ</h3><br>
                    <form method="POST">
                        <input name="login" type="text" required class="form-control" placeholder="Логин"><br>
                        <input name="password" type="password" required placeholder="Пароль" class="form-control"><br>
                        <input name="submit" type="submit" value="Войти" class="btn btn-warning">
                    </form>
                    <div><p><?php echo "$bag"; ?></p></div>
                <div class="col" style="padding-top: 15px"><a href="admin/register.php" style="text-decoration: none; color: #fff; font-size: 1.2rem">Регистрация в системе</a></div>    
            </div>
        </div>        
    </div>
</body>
</html>