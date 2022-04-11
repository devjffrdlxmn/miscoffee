<?php
    include_once('model/productModel.php');
    $product = new Product();
    if(isset($_POST['productName']))
    {
        $checkProduct = $product->checkProductExist($_POST['productName']);
        if($checkProduct == 1)echo '1';   
    }
?>
