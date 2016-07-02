<?php require_once("header.php");?>
<?php
if($_REQUEST['id']==1 && isset($_REQUEST['delete']) && $_REQUEST['confirm']!=1 ){
        $sql = "delete from `uquvchi` where `id`={$_REQUEST['delete']}";
        $db->query($sql);
}

?>
<?php

if(isset($_REQUEST['uquvchi_create'])){
    if(isset($_POST['ism'])){$ism=$db->escape_value($_POST['ism']); if($ism==''){unset($ism);}}
    if(isset($_POST['familiya'])){$familiya=$db->escape_value($_POST['familiya']); if($familiya==''){unset($familiya);}}
    if(isset($_POST['otasining_ismi'])){$otasining_ismi=$db->escape_value($_POST['otasining_ismi']); if($otasining_ismi==''){unset($otasining_ismi);}}	
	if(isset($_POST['jinsi'])){$jinsi=$db->escape_value($_POST['jinsi']); if($jinsi==''){unset($jinsi);}}
  
if(isset($_POST['telefon'])){$telefon=$db->escape_value($_POST['telefon']); if($telefon==''){unset($telefon);}}
  if(isset($_POST['uy_telefon'])){$uy_telefon=$db->escape_value($_POST['uy_telefon']); if($uy_telefon==''){unset($uy_telefon);}}
  if(isset($_POST['otasi_ish'])){$otasi_ish=$db->escape_value($_POST['otasi_ish']); if($otasi_ish==''){unset($otasi_ish);}}
  if(isset($_POST['onasi_ish'])){$onasi_ish=$db->escape_value($_POST['onasi_ish']); if($onasi_ish==''){unset($onasi_ish);}}
    
    if(isset($_POST['millati'])){$millati=$db->escape_value($_POST['millati']); if($millati==''){unset($millati);}}
    if(isset($_POST['yashash_joyi'])){$yashash_joyi=$db->escape_value($_POST['yashash_joyi']); if($yashash_joyi==''){unset($yashash_joyi);}}
	if(isset($_POST['sinf'])){$sinf=$db->escape_value($_POST['sinf']); if($sinf==''){unset($sinf);}}
  
    if(isset($_FILES['image']['name'])){
        $name_md5 = md5($_FILES['image']['name']);
        $name_md5 = "uquvchi_".$name_md5.".jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/uquvchilar/'.$name_md5);
		$name_md5= "assets/images/uquvchilar/".$name_md5;
        if($_FILES['image']['name']==''){$name_md5=$_POST['image_name'];}
       }
  
$db->query("INSERT INTO `uquvchi` (`ism`, `familiya`, `otasining_ismi`,  `millati`,`rasm_url`, `yashash_joyi`,`sinf_id`,`jinsi`, `telefon`, `uy_telefon`, `otasi_ish`, `onasi_ish`)
VALUES ('$ism', '$familiya', '$otasining_ismi', '$millati', '$name_md5', '$yashash_joyi','$sinf',  '$jinsi', '$telefon', '$uy_telefon', '$otasi_ish', '$onasi_ish');");

}




if(isset($_REQUEST['submit1'])){
	  if(isset($_POST['tid'])){$tid=$db->escape_value($_POST['tid']); if($tid==''){unset($tid);}}
  
     if(isset($_POST['ism'])){$ism=$db->escape_value($_POST['ism']); if($ism==''){unset($ism);}}
    if(isset($_POST['familiya'])){$familiya=$db->escape_value($_POST['familiya']); if($familiya==''){unset($familiya);}}
    if(isset($_POST['otasining_ismi'])){$otasining_ismi=$db->escape_value($_POST['otasining_ismi']); if($otasining_ismi==''){unset($otasining_ismi);}}
		    if(isset($_POST['jinsi'])){$jinsi=$db->escape_value($_POST['jinsi']); if($jinsi==''){unset($jinsi);}}
     if(isset($_POST['millati'])){$millati=$db->escape_value($_POST['millati']); if($millati==''){unset($millati);}}
	 
	 if(isset($_POST['telefon'])){$telefon=$db->escape_value($_POST['telefon']); if($telefon==''){unset($telefon);}}
  if(isset($_POST['uy_telefon'])){$uy_telefon=$db->escape_value($_POST['uy_telefon']); if($uy_telefon==''){unset($uy_telefon);}}
  if(isset($_POST['otasi_ish'])){$otasi_ish=$db->escape_value($_POST['otasi_ish']); if($otasi_ish==''){unset($otasi_ish);}}
  if(isset($_POST['onasi_ish'])){$onasi_ish=$db->escape_value($_POST['onasi_ish']); if($onasi_ish==''){unset($onasi_ish);}}
    
	
    if(isset($_POST['yashash_joyi'])){$yashash_joyi=$db->escape_value($_POST['yashash_joyi']); if($yashash_joyi==''){unset($yashash_joyi);}}
	if(isset($_POST['sinf'])){$sinf=$db->escape_value($_POST['sinf']); if($sinf==''){unset($sinf);}}
  
    if(isset($_FILES['image']['name'])){
        $name_md5 = md5($_FILES['image']['name']);
        $name_md5 = "uquvchi_".$name_md5.".jpg";
        move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/uquvchilar/'.$name_md5);
		$name_md5= "assets/images/uquvchilar/".$name_md5;
        if($_FILES['image']['name']==''){$name_md5=$_POST['image_name'];}
       }
  	$db->query("UPDATE  `uquvchi` SET
		`ism` =  '$ism',
		`familiya` =  '$familiya',
		`otasining_ismi` =  '$otasining_ismi' ,
		`jinsi` =  '$jinsi' ,
		`millati` =  '$millati',
		`yashash_joyi` =  '$yashash_joyi',
		`sinf_id` =  '$sinf',
		`telefon` =  '$telefon',
		`uy_telefon` = '$uy_telefon',
		`otasi_ish` = '$otasi_ish',
		`onasi_ish` = '$onasi_ish',
		`rasm_url` =  '$name_md5'
		WHERE  `uquvchi`.`id` =$tid;");
		var_dump($tid);
}



if(isset($_REQUEST['edit'])){
	if($_REQUEST['id']==1){
		$query = $db->query("select * from uquvchi where id={$_REQUEST['edit']}");
		$val=$db->fetch_array($query);  ?>
	<div style="margin-top: 60px; margin-bottom: 15px" class="h3">O'quvchilar ma'lumotlarini <span style="font-weight: bold;">taxrirlash</span></div>
<form method="POST" name="id1" action="index.php" enctype='multipart/form-data'>

<table style="margin:10px auto; width: 55%; font-size: 15px"  class="table table-striped table-hover table-bordered">
    <tr>
        <td style="width: 20%;">ID</td>
        <td style="width: 80%;"><input style="width:70px" class="form-control" type="text" name="id" size="50" value="<?=$val[0]?>" disabled/></td>
    </tr>
    <tr>
        <td>Ism</td>
        <td><input style="width:250px" class="form-control" type="text" name="ism" size="50" value="<?=$val['ism']?>" required/></td>
    </tr>
    <tr>
        <td >Familiya</td>
        <td><input style="width:250px" class="form-control" type="text" name="familiya" size="50" value="<?=$val['familiya']?>" required/></td>
    </tr>
    <tr>
        <td>Otasining_ismi</td>
        <td><input style="width:250px" class="form-control" type="text" name="otasining_ismi" size="50" value="<?=$val['otasining_ismi']?>" required/></td>
    </tr>
		<tr>
		<td>Jinsi</td>
		<td> 
		<select style="width: 250px"  class="form-control" name="jinsi" required>
		<option value="erkak" <?php if($val['jinsi']=="erkak")echo "selected"?>>Erkak</option>
		<option value="ayol" <?php if($val['jinsi']=="ayol")echo "selected"?>>Ayol</option>
		</select>
		</td>
	</tr>
    <tr>
        <td>Millati</td>
        <td><input style="width:250px" class="form-control" type="text" name="millati" size="50" value="<?=$val['millati']?>" required/></td>
    </tr>
	<tr>
        <td>Telefon</td>
        <td><input  style="width: 250px" class="form-control" type="text"  value="<?=$val['telefon']?>" name="telefon" size="50" /></td>
    </tr>
	<tr>
        <td>Uy telefon</td>
        <td><input  style="width: 250px" class="form-control" type="text"  value="<?=$val['uy_telefon']?>" name="uy_telefon" size="50" /></td>
    </tr>

	<tr>
        <td>Otasining ish joyi</td>
        <td><input  style="width: 250px" class="form-control" type="text"  value="<?=$val['otasi_ish']?>" name="otasi_ish" size="50" /></td>
    </tr>
	<tr>
        <td>Onasining ish joyi</td>
        <td><input  style="width: 250px" class="form-control" type="text"  value="<?=$val['onasi_ish']?>" name="onasi_ish" size="50" /></td>
    </tr>
    <tr>
        <td>Yashash joyi</td>
        <td><input style="width:250px" class="form-control" type="text" name="yashash_joyi" size="50" value="<?=$val['yashash_joyi'] ?>" /></td>
    </tr>
	 <tr>
		<td>Sinf:</td>
			
			<td> 	<select  style="width:150px"   class="form-control" name="sinf" required>
			<?php 
				$res = $db->query("select * from sinf");
			while ($row = $db->fetch_array($res)) {?>
			<option <?php if($val['sinf_id']==$row['id'])echo "selected"?> value="<?=$row['id']?>"><?=$row['sinf']?></option>
			<?php }?>
			</select>

			</td>
			

    </tr>

    <tr>
        <td>Rasm</td>
        <td style="text-align:left"> <img src="<?=$val['rasm_url']?>" width="100px" height="80px"  /><hr />
		<input type="hidden"  name="tid" value="<?=$val['id']?>"/> 
        <input  style="width:250px"  class="form-control" type="file" value="ochish" name="image" accept="image/*" width="50" height="50"  /></td>
    </tr>
     <tr>

    <tr>
        <td>
        </td>
        <td style="float:left"><input type="submit" name="submit1" value="Saqlash" class="btn btn-success"/> <a href="index.php?id=<?=$a?>" class="btn btn-danger">Bekor</a> 
        </td>
    </tr>
        
</table>
</form>
	<?php } ?> <!--id-->	
<?php } ?> <!--if(isset($_REQUEST['edit'])){ -->

<?php if($_REQUEST['create']==1 && $_REQUEST['id']==1){ ?>
<div style="margin-top: 65px; margin-bottom: 25px" class="h3">O'quvchilarni <span style="font-weight: bold;">ro'yhatga olish</span></div>

    <form method="POST" name="create" action="index.php" enctype='multipart/form-data'>

<table style="margin:10px auto; width: 55%; font-size: 15px" class="table table-striped table-hover table-bordered">

    <tr>
        <td>Ismi</td>
        <td><input style="width: 250px" class="form-control" type="text" name="ism" size="50"  required/></td>
    </tr>
    <tr>
        <td>Familiyasi</td>
        <td><input  style="width: 250px" class="form-control" type="text" name="familiya" size="50" required/></td>
    </tr>
    <tr>
        <td>Otasining ismi</td>
        <td><input style="width: 250px" class="form-control" type="text" name="otasining_ismi" size="50" required/></td>
    </tr>
	<tr>
		<td>Jinsi</td>
		<td> 
		<select style="width: 250px"  class="form-control" name="jinsi" required>
		<option value="erkak">Erkak</option>
		<option value="ayol">Ayol</option>
		</select>
		</td>
	</tr>
	<tr>
        <td>Millati</td>
        <td><input style="width: 250px" class="form-control" type="text" name="millati" size="50" required/></td>
    </tr>
	
	<tr>
        <td>Telefon</td>
        <td><input  style="width: 250px" class="form-control" type="text" name="telefon" size="50" /></td>
    </tr>
	<tr>
        <td>Uy telefon</td>
        <td><input  style="width: 250px" class="form-control" type="text" name="uy_telefon" size="50" /></td>
    </tr>
	<tr>
        <td>Otasining ish joyi</td>
        <td><input  style="width: 250px" class="form-control" type="text" name="otasi_ish" size="50" /></td>
    </tr>
	<tr>
        <td>Onasining ish joyi</td>
        <td><input  style="width: 250px" class="form-control" type="text" name="onasi_ish" size="50" /></td>
    </tr>
	<tr>
        <td>Yashash joyi</td>
        <td><input  style="width: 250px" class="form-control" type="text" name="yashash_joyi" size="50" /></td>
    </tr>
	<tr>
		<td>Sinf:</td>
			<td> 	<select   style="width: 150px" class="form-control" name="sinf" required>
			<?php 
			$res = $db->query("select * from sinf");
		
			while ($row = $db->fetch_array($res)) {?>
			<option value="<?=$row['id']?>"><?=$row['sinf']?></option>
			<?php }?>
			</select>

			</td>
			
    </tr>
    <tr>

        <td>Rasmi</td>
        <td>
        <input  style="width: 250px" class="form-control" type="file" value="ochish" name="image" accept="image/*" width="50" height="50"  /></td>
    </tr>
   
    <tr>
        <td>
        </td>
        <td style="float:left;"><input type="submit" name="uquvchi_create" value="Qo'shish" class="btn btn-success"/> 
		<a href="index.php?id=<?=$a?>" class="btn btn-danger">Bekor qilish</a> 
        </td>
    </tr>
        
</table>
</form>
    
    
    
    
<?php }?>


<?php 
if($_REQUEST['id']==1 && $_REQUEST['confirm']!=1 && $_REQUEST['kontrakt']!=1 && !isset($_REQUEST['edit']) && !isset($_REQUEST['create'])){
?>	
<div style="margin-top: 55px; margin-bottom: 0px" class="h3"> O'quvchilar <span style="font-weight: bold;">ro'yhati</span></div>
<a class="btn btn-success" style="float:right; margin:15px"  href="index.php?create=1&&id=1">O'quvchi qo'shish</a>
<a class="btn btn-success" style="float:right; margin:15px"  href="sinf.php?id=1&sinflar=1">Sinflar ro'yhati</a>
<table id="dataTables-uquvchi" style="margin-left: 0px; margin-right:20px; width: 100%; font-size: 15px"  class="table table-hover  table-striped table-bordered">
	<thead>
	<tr>

		<th>Ism</th>
		<th>Familiya</th>
		<th>Otasinig ismi</th>
		<th>Sinf</th>
	
		<th></th>
	</tr>
	</thead>
	<tbody>
	<?php 
	$query = $db->query("select * from uquvchi");
    for($i=0; $i<$db->num_rows($query); $i++){
    $val=$db->fetch_array($query);
    ?>
    <tr>
	<!--<td><img src="<?=$val['rasm_url']?>" width="60px" height="60px"/></td>-->
    <td><?=$val['ism'];?></td>
    <td><?=$val['familiya'];?></td>
    <td><?=$val['otasining_ismi'];?></td>
    <td><?php
	$query_sinf = $db->query("select * from sinf where id={$val['sinf_id']}");
	$result_sinf = $db->fetch_array($query_sinf);
	echo $result_sinf['sinf'];
	
	?></td>
    
    <!--<td><img src="<?=$val[9]?><?=$val[8]?>" width="60px" height="60px"/></td>-->
	
		 <td>
		 <a href="baho.php?create=1&id=4&uquvchi_id=<?=$val['0']?>"><i class="fa  fa-percent text-center icon text-success"></i></a>&nbsp;&nbsp;
   <a href="index.php?id=1&edit=<?=$val[0]?>"><i class="fa fa-edit text-center icon text-success"></i></a>
    <a href="index.php?id=1&rid=<?=$val[0]."&confirm=1"?>"><i class="fa fa-close text-center icon text-danger"></i></a>    

    <input type="hidden" name="id" value="=<?=1?>" />
    <input type="hidden" name="rid" value="=<?=$val[0]?>" />
       </td>
    </tr>

    <?php $GLOBALS['del_billboard']="index.php?id=$a"?>
    <?php }?>
	</tbody>
</table> 
<?php } ?>


<?php require_once("footer.php"); ?>