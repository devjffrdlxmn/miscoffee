<table  id="myTable" class="table table-stripped ">
    <thead>
        <tr >
            <th bgcolor="#101820" style="color:white;padding:15px;">ID</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Name</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Price</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Stocks</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Category</th>
            <th bgcolor="#101820" style="color:white;padding:15px;">Type</th>
            
        </tr>
                    
    </thead>
    <tbody>
    <?php
       include('model/productModel.php');
       $product = new Product();
       $products = $product->getproductInfo();

       foreach( $products as $product)
       {
    ?>
            <tr role="row">   
                <td  role="cell"bgcolor="#FFF"><?php echo $product['id']; ?></td> 
                <td  role="cell"bgcolor="#FFF"><?php echo $product['name']; ?></td>  
                <td  role="cell"bgcolor="#FFF"><?php echo $product['stocks']; ?></td>  
                <td  role="cell"bgcolor="#FFF"><?php echo $product['category_name']; ?></td>  
                <td  role="cell"bgcolor="#FFF"><?php echo $product['type_name']; ?></td>  
                <td  role="cell" bgcolor="#FFF" >
                    <button type="button"  onclick="openResetModal(`<?php echo $id; ?>`,`<?php echo $username; ?>`)" class="btn btn-success btn-sm">RESET PASSWORD</button>
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
