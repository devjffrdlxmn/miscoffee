<?php
    include('model/typeModel.php');
    $type = new Type();
    $types = $type->fetch();

?>
<table  id="myTable" class="table table-stripped ">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">ID</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Name</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Action</th>
            
        </tr>
                    
    </thead>
    <tbody>
    <?php
       foreach( $types as $type)
       {
    ?>
            <tr role="row">   
                <td  role="cell"bgcolor="#FFF"><?php echo $type['type_id']; ?></td> 
                <td  role="cell"bgcolor="#FFF"><?php echo $type['type_name']; ?></td>  
           
                <td  role="cell" bgcolor="#FFF" >
                    <button type="button"  onclick="openUpdateModal(`<?php echo $type['type_id']; ?>`,`<?php echo $type['type_name']; ?>`)" class="btn btn-success btn-sm">Update</button>
                    <button type="button"  onclick="Delete(`<?php echo $type['type_id']; ?>`)" class="btn btn-danger btn-sm">Delete</button>
                </td> 
            </tr>
    <?php
       }
    ?>    
    </tbody>
</table>

<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );

</script>            
