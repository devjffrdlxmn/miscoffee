<?php

    include_once("model/productModel.php");
    //caller
    $product=new Product();
    $receive="";
    if(isset($_POST["productName"],$_POST["productPrice"],$_POST["productStocks"]
    ,$_POST["productCategory"],$_POST["productType"])){
        $receive=$product->save($_POST["productName"],$_POST["productPrice"],$_POST["productStocks"]
        ,$_POST["productCategory"],$_POST["productType"]);
        echo   $receive;
    }
    
        
?>