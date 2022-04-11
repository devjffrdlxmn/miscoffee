<?php
    
    include_once("model/productModel.php");

    $product=new Product();
    $receive="";
    if(isset($_POST["productId"],$_POST["productName"],$_POST["productPrice"]
    ,$_POST["productStocks"],$_POST["productCategory"],$_POST["productType"]))
    {
        $receive=$product->update($_POST["productId"],$_POST["productName"],$_POST["productPrice"]
        ,$_POST["productStocks"],$_POST["productCategory"],$_POST["productType"]);
        echo   $receive;
    }

    
?>