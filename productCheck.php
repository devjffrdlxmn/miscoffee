<?php
    include_once('model/productModel.php');

    if(isset($_POST['productName']))
    {
        $product = new Product();
        $checkProduct = $product->checkProductExist($_POST['productName']);
        
        if($checkProduct == 1)
        {
            echo "alert($checkProduct)";
            echo '1';
        }
        else{
            echo '0';
        }

        
    }
   


?>
