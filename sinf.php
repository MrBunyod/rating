<?php include("header.php");?>
<?php 
if(isset($_REQUEST['delete']) && $_REQUEST['confirm']!=1){
        $sql = "delete from `sinf` where `id`={$_REQUEST['delete']}";
        $db->query($sql);
} ?>
<?php
if(isset($_REQUEST['sinf_create'])){
	
    if(isset($_POST['sinf_name'])){$sinf_name.=$db->escape_value($_POST['sinf_name']); if($sinf_name==''){unset($sinf_name);}}
$db->query("INSERT INTO `sinf` (`sinf`)
VALUES (\"$sinf_name\");");

}

?>
<?php
if(isset($_REQUEST['sinf_submit'])){
	  if(isset($_POST['gid'])){$gid=$db->escape_value($_POST['gid']); if($gid==''){unset($gid);}}
   if(isset($_POST['sinf_name'])){$sinf_name=$db->escape_value($_POST['sinf_name']); if($sinf_name==''){unset($sinf_name);}}  
  $db->query("UPDATE  `sinf` SET
  `sinf` =  '$sinf_name'
	WHERE  `sinf`.`id`='$gid';");
   }	
	


if(isset($_REQUEST['edit'])){
	$query = $db->query("select * from sinf where id={$_REQUEST['edit']}");
	$val=$db->fetch_array($query);  
?>
	<div style="margin-top: 60px; margin-bottom: 15px" class="h3">Sinf nomini <span style="font-weight: bold;">taxrirlash</span></div>
	<form method="POST" action="sinf.php" enctype='multipart/form-data'>
	<table style="margin:10px auto; width: 55%; font-size: 15px"  class="table table-striped table-hover table-bordered">
		<tr>
			<td style="width: 20%;">ID</td>
			<td style="width: 80%;"><input style="width:70px" class="form-control" type="text" name="id" size="50" value="<?=$val['id']?>" disabled/></td>
		</tr>
		<tr>
			<td>Sinf:</td>
			<td><input style="width:250px" class="form-control" type="text" name="sinf_name" size="50" value="<?=$val['sinf']?>" /></td>
		</tr>
				<tr>
			<td>
			<input type="hidden" name="gid"  value="<?=$val['id']?>"/>
			<input type="hidden" name="id"  value="1">
			</td>
			<td style="float:left"><input type="submit" name="sinf_submit" value="Saqlash" class="btn btn-success"/> <a href="sinf.php" class="btn btn-danger">Bekor</a> 
			</td>
		</tr>		
		</table>
		</form>
	<?php } ?>


<?php if($_REQUEST['sinf_yaratish']==1){?>
	<div style="margin-top: 65px; margin-bottom: 25px" class="h3">Sinf qo'shish <span style="font-weight: bold;"></span></div>

    <form method="POST" name="create" action="sinf.php" enctype='multipart/form-data'>

<table style="margin:10px auto; width: 55%; font-size: 15px" class="table table-striped table-hover table-bordered">

  <tr>
        <td>Sinf nomini kiriting: </td>
        <td><input style="width: 250px" class="form-control" type="text" name="sinf_name" size="50"  /></td>
    </tr>
	
	  <tr>
        <td><input type="hidden" name="id" value="1"/></td>
        <td><input  class="form-control  btn btn-success" type="submit" name="sinf_create" value="Saqlash"/></td>
    </tr>
	</table>
<?php }?>


<?php
if($_REQUEST['sinf_edit']!=1 && $_REQUEST['sinf_yaratish']!=1 && $_REQUEST['confirm']!=1){ ?>
<div style="margin: 50px auto;" class="h3"> Sinflar  <span style="font-weight: bold;">ro'yhati</span></div>
<a class="btn btn-success" style="float:right; margin-right:190px; margin-bottom: 30px"  href="sinf.php?id=1&sinf_yaratish=1">Sinf qo'shish</a>
<table  style="margin:5px auto; width: 70%; font-size: 15px"  class="table table-hover  table-striped table-bordered">
	<thead>
	<tr>
		<th style="width: 10%">Id</th>
		<th style="text-align:center">Sinflar</th>
		<th></th>
	</tr>
	</thead>
	<tbody>	
	<?php 
		$sinf=$db->query("select * from sinf");
		while($sinf_row=$db->fetch_array($sinf)){
			echo "<tr><td>".$sinf_row['id']."</td>";
		?>
		<td> 
		<?php echo $sinf_row['sinf'];?>
		</td>
		<td>
			 <a href="sinf.php?id=1&sinf_edit=1&edit=<?=$sinf_row['id']?>"><i class="fa fa-edit text-center icon text-success"></i></a>
    <a href="sinf.php?id=1&rid=<?=$sinf_row['id']."&confirm=1"?>"><i class="fa fa-close text-center icon text-danger"></i></a>    
		</td>
		</tr>
<?php } ?>

</tbody>
</table>
<?php } ?>


<?php include("footer.php"); ?>