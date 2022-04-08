<?php 
//model
include_once("model/addonsModel.php");
//caller
$caller=new addOns();

?>

<!--script to set the corresponding slect value base on the session-->	
<script> document.getElementById("selectfilters").value='<?php echo $datastatus_select;?>';</script>

<table  id="myTable" class="table table-stripped ">
    <thead>
        <tr>
			<th bgcolor="#101820" style="color:white;padding-left:15px;">No.</th>
            <th bgcolor="#101820" style="color:white;padding-left:15px;">Name</th>
            <th bgcolor="#101820" style="color:white;padding-left:15px;">Numerical Rating</th>
            <th bgcolor="#101820" style="color:white;padding-left:15px;">Descriptive Rating</th>
			<th bgcolor="#101820" style="color:white;padding-left:15px;">Report</th>
        </tr>
    </thead>
    <tbody>
		<?php
		$counter=1;
		$datatableoutput=array();
		$datatableoutput=$caller->addonsFunction();
			foreach($datatableoutput as $datatableoutputfetch){
			?>
			<tr role="row">
				<td role="cell" bgcolor="#FFF" style="vertical-align: middle;" ><?php echo $counter;$counter++;?></td> 
				<td role="cell" bgcolor="#FFF" style="vertical-align: middle;text-align:center;"><?php echo $datatableoutputfetch["addons_name"];?></td> 
				<td role="cell" bgcolor="#FFF" style="vertical-align: middle;text-align:center;"><?php echo $datatableoutputfetch["price"];?></td>  
				<td role="cell" bgcolor="#FFF" style="vertical-align: middle;text-align:center;"><?php echo $datatableoutputfetch["stocks"];?></td> 
				<td role="cell" bgcolor="#FFF" style="vertical-align: middle;text-align:center;">
					<button onclick="openUpdateModal(`<?php echo $datatableoutputfetch['id'];?>`,`<?php echo $datatableoutputfetch['addons_name'];?>`,`<?php echo $datatableoutputfetch['price'];?>`,`<?php echo $datatableoutputfetch['stocks'];?>`);" id="summaryReport"  class="btn btn-success btn-sm mt-1" style="width:100px">UPDATE</button>
					<button onclick="deleteAddons(`<?php echo $datatableoutputfetch['id'];?>`);" id="summaryReport"  class="btn btn-success btn-sm mt-1" style="width:100px">DELETE</button>
				</td> 
			</tr>  
			<?php
				}
			
				if(empty($datatableoutput)){
						echo "<script>document.getElementById('summaryReport').style.display='none';</script>";
					}	
			
			?>
    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

    //refresh table and set filter base on session
    $('#myTable').DataTable({
   "lengthMenu": [ [20,50, 100, -1], [20,50, 100, "All"] ],
    });

    //cloasing loading sweetalert after loading the table
    //swal.close()
</script>