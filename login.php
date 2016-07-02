<?
// Страница авторизации

# Функция для генерации случайной строки
if($_REQUEST['unlink']==1){
	unset($_COOKIE['id']);
	unset($_COOKIE['hash']);
	setcookie('id', null, -1, '/');
    setcookie('hash', null, -1, '/');
}
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

# Соединямся с БД
$link=mysqli_connect("localhost", "root", "", "reyting");

if(isset($_POST['submit']))
{
    # Вытаскиваем из БД запись, у которой логин равняеться введенному
    $query = mysqli_query($link,"SELECT user_id, user_password, display_name FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
    $data = mysqli_fetch_assoc($query);
    # Сравниваем пароли
    if($data['user_password'] === md5(md5($_POST['password'])))
    {
        # Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        if(!@$_POST['not_attach_ip'])
        {
            # Если пользователя выбрал привязку к IP
            # Переводим IP в строку
            $insip = ", user_ip=INET_ATON('".$_SERVER['REMOTE_ADDR']."')";
        }

        # Записываем в БД новый хеш авторизации и IP
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' ".$insip." WHERE user_id='".$data['user_id']."'");

        # Ставим куки
      

        # Переадресовываем браузер на страницу проверки нашего скрипта
		if($data['display_name']==='admin'){	
		setcookie("id", $data['user_id'], time()+60*60*24*30);
        setcookie("hash", $hash, time()+60*60*24*30);		
        header("Location: index.php?id=1"); exit();
		 
		}
    }
    else
    {
       echo "";
    }
}
?>
 
 
 <!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon" />
  <meta name="description" content="" />
    <link href="lib_datatabale/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container" >
 <form method="POST" name="create" action="login.php" enctype='multipart/form-data'>

<table style="margin:100px auto; width: 30%; font-size: 15px" class="table table-striped table-bordered">
	<tr>
		<td colspan="2" style="font-size: 20px; margin:0 auto;text-align:center" class="text-success" >Maktab o'quvchilarini baholash tizimi</td>
	</tr>
    <tr>
        <td>Login</td>
        <td><input style="width: 250px" class="form-control" type="text" name="login" size="50"  /></td>
    </tr>
  <tr>
        <td>Parol</td>
        <td><input style="width: 250px" class="form-control" type="password" name="password" size="50"  /></td>
    </tr>
	  <tr>
        
        <td colspan="2"><label><input style="margin-left: 50px;" type="checkbox" name="not_attach_ip"> Eslab qolish</label></td>
    </tr>
	  <tr>
        
        <td colspan="2"><input style="width:200px; margin-left: 50px;" class="form-control  btn btn-success" type="submit" name="submit" value="Kirish"/></td>
    </tr>
	</table>
	</div>
	</body>
	</html>