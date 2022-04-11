<?php
    
    include_once("model/productModel.php");

    $product=new Product();
    $receive="";
    if(isset($_POST["productId"]))
    {
        $receive=$product->delete($_POST["productId"]);
        echo   $receive;
    }

    
?>