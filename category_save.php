<?php
    if(isset($_POST["name"],$_POST["price"],$_POST["stock"])){
        //model
        include_once("model/categoryModel.php");
        //caller
        $caller=new category();
        $receive="";
        $receive=$caller->categorysaveFunction($_POST["name"],$_POST["price"],$_POST["stock"]);
        echo  $receive;
    }
?>