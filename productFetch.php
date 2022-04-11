<?php
    include('model/productModel.php');
    $product = new Product();
    $products = $product->fetch();

?>
<table  id="myTable" class="table table-stripped ">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">ID</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Name</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Price</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Stocks</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Category</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Type</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Action</th>
            
        </tr>
                    
    </thead>
    <tbody>
    <?php
       foreach( $products as $product)
       {
    ?>
            <tr role="row">   
                <td  role="cell"bgcolor="#FFF"><?php echo $product['id']; ?></td> 
                <td  role="cell"bgcolor="#FFF"><?php echo $product['name']; ?></td>  
                <td  role="cell"bgcolor="#FFF"><?php echo $product['price']; ?></td>  
                <td  role="cell"bgcolor="#FFF"><?php echo $product['stocks']; ?></td>  
                <td  role="cell"bgcolor="#FFF"><?php echo $product['category_name']; ?></td>  
                <td  role="cell"bgcolor="#FFF"><?php echo $product['type_name']; ?></td>  
                <td  role="cell" bgcolor="#FFF" >
                    <button type="button"  onclick="openUpdateModal(`<?php echo $product['id']; ?>`,`<?php echo $product['name']; ?>`,`<?php echo $product['price']; ?>`,
                    `<?php echo $product['stocks']; ?>`,`<?php echo $product['category_id']; ?>`,`<?php echo $product['type_id']; ?>`)" class="btn btn-success btn-sm">Update</button>
                    <button type="button"  onclick="Delete(`<?php echo $product['id']; ?>`)" class="btn btn-danger btn-sm">Delete</button>
                </td> 
            </tr>
    <?php
       }
    ?>    
    </tbody>
</table>

<script>
    $(document).ready( function () {
        var oTable = $('#myTable').dataTable({
        "iDisplayLength": 10,
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        "bFilter": true,
        }); 

        $('#selectCategory').on('change',function(){
          var selectedValue = $(this).val();
          if (selectedValue == 'All')
          {
            oTable.fnFilter('',4);
          }
          else{
            oTable.fnFilter("^"+selectedValue+"$", 4, true); //Exact value, column, reg
          }
        });
        $('#selectType').on('change',function(){
          var selectedValue = $(this).val();
          if (selectedValue == 'All')
          {
            oTable.fnFilter('',5);
          }
          else{
            oTable.fnFilter("^"+selectedValue+"$", 5, true); //Exact value, column, reg 
          }
        });
    } );
</script>            
