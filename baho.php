<?php include("header.php");?>
<?php  if($_REQUEST['id']==4 && isset($_REQUEST['delete']) && $_REQUEST['confirm']!=1){
        $sql = "delete from `bsho` where `id`={$_REQUEST['delete']}";
        $db->query($sql);
}?>
<?php
if(isset($_REQUEST['baho_create'])){
	
	if(isset($_POST['uquvchi_id'])){$uquvchi_id=$db->escape_value($_POST['uquvchi_id']); if($uquvchi_id==''){unset($uquvchi_id);}}
    if(isset($_POST['fan_id'])){$fan_id=$db->escape_value($_POST['fan_id']); if($fan_id==''){unset($fan_id);}}
    if(isset($_POST['chorak_1'])){$chorak_1=$db->escape_value($_POST['chorak_1']); if($chorak_1==''){unset($chorak_1);}}
  if(isset($_POST['chorak_2'])){$chorak_2=$db->escape_value($_POST['chorak_2']); if($chorak_1==''){unset($chorak_2);}}
  if(isset($_POST['chorak_3'])){$chorak_3=$db->escape_value($_POST['chorak_3']); if($chorak_1==''){unset($chorak_3);}}
  if(isset($_POST['chorak_4'])){$chorak_4=$db->escape_value($_POST['chorak_4']); if($chorak_1==''){unset($chorak_4);}}
 $result_baho=$db->query("INSERT INTO `baho` (`uquvchi_id`, `fan_id`, `1_chorak`, `2_chorak`, `3_chorak`, `4_chorak`)
VALUES ('$uquvchi_id', '$fan_id', '$chorak_1', '$chorak_2', '$chorak_3', '$chorak_4');");
	echo "<div style=\"margin-top: 65px; margin-bottom: 25px\" class=\"h3 text-success\"uquvchi";
		$query_uquvchi=$db->query("select * from uquvchi where `id`= $uquvchi_id");
		$uquvchi_row=$db->fetch_array($query_uquvchi);
		echo $uquvchi_row['ism']." ".$uquvchi_row['familiya']." ".$uquvchi_row['otasining_ismi']." ga ";
	echo "baho 	<span style=\"font-weight: bold;\">qo'yildi</span>";

}


?>
<?php if($_REQUEST['create']==1 && $_REQUEST['id']==4){ ?>

<div style="margin-top: 65px; margin-bottom: 25px" class="h3">O'quvchilarni  <span style="font-weight: bold;">baholash</span></div>
  <form  method="POST" name="id2" action="baho.php" enctype='multipart/form-data'>
<table style="margin: 5px auto; width: 55%; font-size: 15px" class="table table-hover table-striped table-bordered">

    <tr>
        <td>FIO</td>
		<td>
		
		<?php
		$uquvchi_id=$_REQUEST['uquvchi_id'];
		$res=$db->query("select * from uquvchi WHERE id=$uquvchi_id");
		$result = $db->fetch_array($res);
		?>
		
		<input class="form-control"  type="text" name="uquvchi_fio" size="5" value="<?php echo $result['ism']." ".$result['familiya']." ".$result['otasining_ismi']?>" disabled/>
       </td>
    </tr>
	<tr>
        <td>Fan nomi</td>
        <td>
		<select class="form-control" name="fan_id" required>
		<?php
			$fan_query = $db->query("select * from fanlar");
			while($fan_row=$db->fetch_array($fan_query)){
				echo "<option value='{$fan_row['id']}'";
				if($_REQUEST['fan_id']==$fan_row['id']) echo "selected";
				echo ">";
				echo $fan_row['fan_nomi'];
				echo "</option>";
			}
		?>
		</select>
		</td>
	
    </tr>
	<tr>
	<td>1 chorak</td>
	<td>
	<input type="text" name="chorak_1" style="width:150px" class="form-control"/>
	</td>
	</tr>
	<tr>
	<td>2 chorak</td>
	<td>
	<input type="text" name="chorak_2" style="width:150px" class="form-control"/>
	</td>
	</tr>
	<tr>
	<td>3 chorak</td>
	<td>
	<input type="text" name="chorak_3" style="width:150px" class="form-control"/>
	</td>
	</tr>
	<tr>
	<td>4 chorak</td>
	<td>
	<input type="text" name="chorak_4" style="width:150px" class="form-control"/>
	</td>
	</tr>

	<tr>
        <td><input class="form-control" type="hidden" name="uquvchi_id" value="<?=$uquvchi_id?>" /></td>
        <td><input type="submit" name="baho_create" value="Saqlash" class="btn btn-success"/> <a href="index.php" class="btn btn-danger">Bekor</a> 
        </td>
    </tr>
        
</table>
</form>
    
    
    
    
<?php }?>


<?php if(!isset($_REQUEST['show']) and !isset($_REQUEST['create'])){?>

<div style="margin: 30px auto;" class="h3"> O'quvchilarning <span style="font-weight: bold;">baholarini ko'rish </span></div>
<table id="dataTables-uquvchi" style="margin: 10px auto; width: 100%; font-size: 15px"  class="table table-hover  table-striped table-bordered">
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
		 <a href="baho.php?show=1&id=4&uquvchi_id=<?=$val['0']?>" class="btn btn-success">Bahosini ko'rish</a>
      

    <input type="hidden" name="id" value="=<?=1?>" />
    <input type="hidden" name="rid" value="=<?=$val[0]?>" />
       </td>
    </tr>

    <?php $GLOBALS['del_billboard']="index.php?id=$a"?>
    <?php }?>
	</tbody>
</table> 
<?php } ?>













<?php
if(isset($_REQUEST['show']) and !isset($_REQUEST['create'])){
	?>
	<div style="margin-top: 45px; margin-bottom: 25px" class="h3"><b><?php
$query_uquvchi=$db->query("select * from uquvchi where id='{$_REQUEST['uquvchi_id']}'");
$row_uquvchi=$db->fetch_array($query_uquvchi);
echo $row_uquvchi['ism']." ".$row_uquvchi['familiya']." ".$row_uquvchi['otasining_ismi'];
	?></b>ning  baholari</div>
	<button style="float: right; margin:15px" class="btn btn-success" id="xls">MS Excel orqali yuklash</button>
		<table id="hisobot_sinf" style="margin:10px auto; width: 100%; font-size: 15px"  class="table ">
		<thead>
		<tr>
			<th class="noExl" style="width: 7%;     color: #ffffff;
    background-color: #555555;" >T/r</th>
			
	<th style="color: #ffffff;
    background-color: #555555;" >Fan</th>
			<th style="color: #ffffff;
    background-color: #555555;" >1-chorak</th>
			<th style="color: #ffffff;
    background-color: #555555;" >2-chorak</th>
			<th style="color: #ffffff;
    background-color: #555555;" >3-chorak</th>
			<th style="color: #ffffff;
    background-color: #555555;" >4-chorak</th>
			<th style="color: #ffffff;
    background-color: #555555;" >Umumiy</th>
		</tr>
		</thead>
	<tbody>
	<?php
	if(isset($_POST['group'])){$group=$db->escape_value($_POST['group']); if($group==''){unset($group);}}
		$query_fan=$db->query("select * from fanlar");
			
$query_uquvchi=$db->query("select * from uquvchi where id='{$_REQUEST['uquvchi_id']}'");
$row_uquvchi=$db->fetch_array($query_uquvchi);
		 while($fan=$db->fetch_array($query_fan)){	
		 $query_baho=$db->query("select * from baho where fan_id='{$fan['id']}' and uquvchi_id='{$_REQUEST['uquvchi_id']}'");
		 $baho_row=$db->fetch_array($query_baho);

		 ?>
	<tr>
		<td><?=++$r;?></td>
		<td><?php 
			echo $fan['fan_nomi'];?>
		</td>
		<td>
		<?php if(isset($baho_row['1_chorak'])){
		echo $baho_row['1_chorak'];
		}?>
		</td>
		
		<td>
		<?php if(isset($baho_row['2_chorak'])){
		echo $baho_row['2_chorak'];
		}?>
		</td>
		
		<td>
		<?php if(isset($baho_row['3_chorak'])){
		echo $baho_row['3_chorak'];
		}?>
		</td>
		<td>
		<?php if(isset($baho_row['4_chorak'])){
		echo $baho_row['4_chorak'];
		}?>
		</td>
		<td><?php
		echo ($baho_row['1_chorak']+$baho_row['2_chorak']+$baho_row['3_chorak']+$baho_row['4_chorak'])/4
		?></td>
		</tr>
	<?php } ?>
	<tr>
	<td>
	&nbsp;
	</td>
	</tr>
	<tr>
	
	
	<td colspan="7" style="text-align: center; font-size:11px">
	<br />
	<br />
	<br />
	<div><span>Maktab direktori:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="margin-left:105px">____________</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:100px">___________________________</span>
				
	</td>
	</tr>
	<tr>
	<td colspan="7" style="text-align: center; font-size:11px">
	
						<span style="display:block;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:80px"><i>(Imzo)</i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=" margin-left:150px" ><i>(Ism, familiya)</i></span></span>
	</td>
	</tr>
	
<tr>
	
	
	<td colspan="7" style="text-align: center; font-size:11px">
	<br />
	<br />
	<br />
	<div><span>Sinf rahbari:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span style="margin-left:105px">____________</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:100px">__________________________</span>
				
	</td>
	</tr>
	<tr>
	<td colspan="7" style="text-align: center; font-size:11px">
	
						<span style="display:block;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:80px"><i>(Imzo)</i></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=" margin-left:150px" ><i>(Ism, familiya)</i></span></span>
	</td>
	</tr>
	</tbody>
	</table>
	<?php }?>
	
<?php require("footer.php");?>