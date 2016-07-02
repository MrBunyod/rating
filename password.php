<?php include("header.php");?>
<?php
if(isset($_REQUEST['password_edit_submit'])){
$link=mysqli_connect("localhost", "root", "", "reyting");
    # проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT COUNT(user_id) FROM users WHERE user_login='".
	mysqli_real_escape_string($link, $_POST['login'])."'");
    # Если нет ошибок, то добавляем в БД нового пользователя
        $login = $_POST['login'];
# Убераем лишние пробелы и делаем двойное шифрование
        $password = md5(md5(trim($_POST['password'])));
		
		$users_query=$db->query("select user_id from users where display_name='admin'");
		$users_row=$db->fetch_array($users_query);
		if(mysql_num_rows($users_query) > 0){

		 mysqli_query($link,"
		UPDATE  `users` SET
		`user_login` =  '$login',
		`user_password` =  '$password'
		WHERE  `users`.`display_name`='admin';");
		
		}
		else{
			mysql_query("INSERT INTO users (`user_login`, `user_password`, `display_name`)
                       VALUES ('$login' ,'$password','$display_name');");
					 
       
		}
		?>	<div style="margin-top: 15px; margin-bottom: 25px" class="h3 text-success">Parol mufavvaqiyatli   <span style="font-weight: bold;">o'rnatildi</span></div> <?php
}
if(true){?>
	<div style="margin-top: 25px; margin-bottom: 25px" class="h3">Parolarni  <span style="font-weight: bold;">taxrirlash</span></div>
    <form method="POST" name="create" action="password.php" enctype='multipart/form-data'>
<table style="margin:80px auto; width: 35%; font-size: 15px" class="table table-striped table-hover table-bordered">
 
	<tr>
        <td>Login</td>
        <td><input style="width: 250px" class="form-control" type="text" name="login" size="50"  /></td>
    </tr>
	<tr>
        <td>Parol</td>
        <td><input style="width: 250px" class="form-control" type="password" name="password" size="50"  /></td>
    </tr>
	<tr>
        <td colspan="2"><input  class="form-control  btn btn-success" type="submit" name="password_edit_submit" value="Saqlash"/></td>
    </tr>
	</table>
<?php } ?>

<?php include("footer.php"); ?>