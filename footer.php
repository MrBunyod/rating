</div>
</div>
 <div id="footer">
    <div class="centerBody">
    <div class="footerText">                	
    <table border="0" cellpadding="1" cellspacing="1" style="width: 100%; table-layout: fixed;">
	<tbody>
		<tr>
			<td style="width: 33%; text-align: left; vertical-align: top;">
			</td>
			<td style="width: 33%; text-align: center; vertical-align: bottom;">
			<div>TATU UF - <a  href="http://ubtuit.uz/" >2016</a></div>
			</td>
			<td style="width: 33%; text-align: right; vertical-align: bottom;">	&nbsp;</td>
		</tr>
	</tbody>
</table>
</div>
</div>
</div>
</div>
    <!-- Bootstrap Core JavaScript -->
    <script src="assets/lib_datatabale/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/lib_datatabale/bower_components/metisMenu/dist/metisMenu.min.js"></script>
    <!-- DataTables JavaScript -->
    <script src="assets/lib_datatabale/bower_components/datatables/media/js/jquery.dataTables.js"></script>
    <script src="assets/lib_datatabale/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="assets/lib_datatabale/dist/js/sb-admin-2.js"></script>
    <script>

	$("#xls").click(function(){
	  $("#hisobot_sinf").table2excel({
		// exclude CSS class
			exclude: ".noExl",
			name: "Excel Document Name",
			filename: "<?php if(isset($row_uquvchi)){
				echo  $row_uquvchi['ism'];
				echo ' ';
				echo $row_uquvchi['familiya'];
				echo ' ';
				echo $row_uquvchi['otasining_ismi'];
				
			}else echo 'export'?>",
			fileext: ".xls",
			exclude_img: true,
			exclude_links: true,
			exclude_inputs: true
	  }); 
	});

    $(document).ready(function() {
        $('#dataTables-uquvchi').DataTable({
                responsive: true,
				 aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "Hammasi"]
    ],
        });
		
		
	$('#dataTables-tulov').DataTable({
                responsive: true,
				 aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "Hammasi"]
    ],
        });
		
	$('#dataTables-sinf').DataTable({
                responsive: true,
				 aLengthMenu: [
        [25, 50, 100, 200, -1],
        [25, 50, 100, 200, "Hammasi"]
    ],
        });
		
		
    });
    </script>
</body>
</html> 
