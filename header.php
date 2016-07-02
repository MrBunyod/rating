<?
// Скрипт проверки
if(!isset($_COOKIE['id']) and !isset($_COOKIE['hash'])){
	 header("Location: login.php"); 
	die();
}
include("db.php");


if(isset($_REQUEST['submit1'])){
//header('Location: '."uquvchi.php?id=1");
}
if(isset($_REQUEST['submit2'])){
header('Location: '."fan.php?id=2");
}
if(isset($_REQUEST['talaba_create'])){
    header('Location: '."uquvchi.php?id=1");
}
if(isset($_REQUEST['fan_create'])){
    header('Location: '."fan.php?id=2");
}
if(isset($_REQUEST['baho_create'])){
    header('Location: '."baho.php?id=4&create=1&uquvchi_id={$_REQUEST['uquvchi_id']}");
}
# Соединямся с БД
$link=mysqli_connect("localhost", "root", "", "reyting");
    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
    if(($userdata['user_hash'] !== $_COOKIE['hash']) or ($userdata['user_id'] !== $_COOKIE['id'])
 or (($userdata['user_ip'] !== $_SERVER['REMOTE_ADDR'])  and ($userdata['user_ip'] !== "0")))
    {
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
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
  <link rel="stylesheet" href="assets/fonts/font-awesome-4.5.0/css/font-awesome.css" />
   <!-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />-->
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" type="text/css" href="assets/style-css/demo.css" />
  <link href="assets/style-css/styleold.css@v=4.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="assets/js/jquery-ui.css" type="text/css" media="screen" />
    <script src="lib_datatabale/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="assets/js/jquery.table2excel.js"></script>
	<script type="text/javascript" src="assets/js/tableExport.js"></script>
	<script type="text/javascript" src="assets/js/jquery.base64.js"></script>
	<script type="text/javascript" src="assets/js/jspdf/libs/sprintf.js"></script>
	<script type="text/javascript" src="assets/js/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="assets/js/jspdf/libs/base64.js"></script>
	<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
	<script type="text/javascript" src="assets/js/jquery.ui.chatbox.js"></script>
    <link href="lib_datatabale/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- MetisMenu CSS -->
    <link href="lib_datatabale/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- DataTables CSS 
    <link href="lib_datatabale/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS 
    <link href="lib_datatabale/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="lib_datatabale/dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
</head>
<body>
<div class="wrapper">
<div style="width:1026px;
    position:relative;
    <?php if(empty($result['2'])){echo "margin: 0px auto 0 auto;"; }else{echo "margin: 220px auto 0 auto;";}  ?> 
   /* height:650px; */
    background-color: #fff;
    border-left: 1px solid #463461;
    border-right: 1px solid #463461;
  "> 
<nav class="navbar navbar-default">

	
	<div class="navbar-header">
<table class="table table-hover table-bordered " style="width:45%; float: right">	

	</table>
	<a class="navbar-brand" style="font-family: 'nasalization', sans-serif;font-size: 25px; margin-left: 180px;">Maktab o'quvchilarini baholash tizimi.</a>
	
	</div>
</nav>

<div class="container" >
<div style="float:right;">Hush kelibsiz! &nbsp; <a href="password.php?password_edit=1">parolni taxrirlash</a>&nbsp; |&nbsp; <a href="login.php?unlink=1">Chiqish</a></div>
<ul class="nav nav-tabs">
<li class="<?php if($_REQUEST['id']==1){echo "active";}?>"><a href="index.php?id=1">O'quvchilar ro'yhati</a></li>
<li class="<?php if($_REQUEST['id']==2){echo "active";}?>"><a href="fan.php?id=2">Fanlar</a></li>
<li class="<?php if($_REQUEST['id']==4){echo "active";}?>"><a href="baho.php?id=4">Baholarni ko'rish</a></li>

</ul>
<?php if($_REQUEST['confirm']==1){?>
		<div style="margin-top: 55px;
			width: 50%;
			margin: 95px auto 95px auto;
			background-color: #F8F8F8;
			border: 2px solid #dcdcdc;
			padding: 15px;">	
		<div style="font-size: 18px;    margin-bottom: 15px;">Rostdan ham o'chirmoqchimisiz?</div>
		<div><a class="btn btn-success" href="<?=$_SERVER['SCRIPT_NAME']?>?id=<?=$_REQUEST['id']?>">Orqaga</a>
		<a class="btn btn-danger" href="<?=$_SERVER['SCRIPT_NAME']?>?id=<?=$_REQUEST['id']?>&delete=<?=$_REQUEST['rid']?>">O'chirish</a> </div>
		</div>
<?php }?>