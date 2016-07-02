<?php include("header.php");?>
<?php  if($_REQUEST['id']==2 && isset($_REQUEST['delete']) && $_REQUEST['confirm']!=1){
        $sql = "delete from `fanlar` where `id`={$_REQUEST['delete']}";
        $db->query($sql);
}?>
<?php
if(isset($_REQUEST['fan_create'])){
	

    if(isset($_POST['fan_nomi'])){$fan_nomi=$db->escape_value($_POST['fan_nomi']); if($fan_nomi==''){unset($fan_nomi);}}
    
 $db->query("INSERT INTO `fanlar` ( `fan_nomi`)
VALUES ('$fan_nomi');");


}

if(isset($_REQUEST['submit2'])){
	
	
	if(isset($_POST['id'])){$id=$db->escape_value($_POST['id']); if($id==''){unset($id);}}
    if(isset($_POST['fan_nomi'])){$fan_nomi=$db->escape_value($_POST['fan_nomi']); if($fan_nomi==''){unset($fan_nomi);}}
   
		$db->query("UPDATE  `fanlar` SET
		`fan_nomi` =  '$fan_nomi'
		WHERE  `fanlar`.`id` =$id;");
}

if(isset($_REQUEST['edit'])){
	if($_REQUEST['id']==2){
		$query = $db->query("select * from fanlar where id={$_REQUEST['edit']}");
		$val=$db->fetch_array($query);?>
	<div style="margin-top: 60px; margin-bottom: 15px" class="h3">Fanlarni  <span style="font-weight: bold;">taxrirlash</span></div>
<form  method="POST" name="id2" action="fan.php" enctype='multipart/form-data'>
<table style="margin: 5px auto; width: 55%; font-size: 15px" class="table table-hover table-striped table-bordered">
    <tr>
        <td style="width: 20%;">ID</td>
        <td style="width: 80%;"><input class="form-control"  type="text" name="id2" size="50" value="<?=$val['id']?>" disabled/></td>
    </tr>

    <tr>
        <td>Fan nomi</td>
        <td><input class="form-control"  type="text" name="fan_nomi" value="<?=$val['fan_nomi']?>" /></td>
    </tr>
   
        <td><input class="form-control"  type="hidden" name="id" size="50" value="<?=$val['id']?>"/></td>
        <td><input type="submit" name="submit2" value="Saqlash" class="btn btn-success"/> <a href="fan.php?id=<?=$_REQUEST['id']?>" class="btn btn-danger">Bekor</a> 
        </td>
    </tr>
        
</table>
</form>

	<?php } ?> <!--id-->	 
<?php } ?> <!--if(isset($_REQUEST['edit'])){-->

<?php if($_REQUEST['create']==1 && $_REQUEST['id']==2 ){ ?>

<div style="margin-top: 65px; margin-bottom: 25px" class="h3">Fan  <span style="font-weight: bold;">ro'yhatga olish</span></div>
  <form  method="POST" name="id2" action="fan.php" enctype='multipart/form-data'>
<table style="margin: 5px auto; width: 55%; font-size: 15px" class="table table-hover table-striped table-bordered">

    <tr>
        <td>Fan nomi</td>
        <td><input class="form-control"  type="text" name="fan_nomi" value="<?=$val['fan_nomi']?>" /></td>
    </tr>
   
        <td></td>
        <td><input type="submit" name="fan_create" value="Saqlash" class="btn btn-success"/> <a href="fan.php?id=<?=$_REQUEST['id']?>" class="btn btn-danger">Bekor</a> 
        </td>
    </tr>
        
</table>
</form>
    
    
    
    
<?php }?>


<?php 
if($_REQUEST['id']==2 && !isset($_REQUEST['edit']) && !isset($_REQUEST['create']) && !isset($_REQUEST['confirm'])){
?>	
	<div style="margin-top: 45px; margin-bottom: 0px" class="h3">Fanlar <span style="font-weight: bold;">ro'yhati</span></div>
<a style="float:right; margin:15px" class="btn btn-success"  href="fan.php?id=2&create=1">Yangi fan qo'shish</a>
<table id="dataTables-tulov" style="margin-left: 0px; margin-right:20px; width: 100%; font-size: 15px" id="talabalar" class="table table-hover table-striped table-bordered">
	<thead>
	<tr>
		<th style="width: 8%" class="noExl">ID</th>
		
		<th style="width: 45%">Fan nomi</th>
		<th></th>
	</tr>
	</thead>
	<tbody>
		<?php
	$query = $db->query("select * from fanlar");
    for($i=0; $i<$db->num_rows($query); $i++){
    $val=$db->fetch_array($query);

		?>
    <tr>
    <td ><?=$val['id'];?></td>
    
    <td style="text-align:left;"><?=$val['fan_nomi'];?></td>
	
    <td><a href="fan.php?id=<?=$_REQUEST['id']?>&edit=<?=$val[0]?>"><i class="fa fa-edit text-center icon text-success"></i></a>
	<a href="fan.php?id=2&rid=<?=$val[0]."&confirm=1"?>"><i class="fa fa-close text-center icon text-danger"></i></a>
        <input type="hidden" name="id" value="=<?=2?>" />
    <input type="hidden" name="rid" value="=<?=$val['id']?>" />
    </td>
    </tr>
	   <?php }?>
	   </tbody>
</table>  
   <?php }?>
   
   
<?php include("footer.php"); ?>