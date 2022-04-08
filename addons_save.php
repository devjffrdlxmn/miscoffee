<?php
    if(isset($_POST["name"],$_POST["price"],$_POST["stock"])){
        //model
        include_once("model/addonsModel.php");
        //caller
        $caller=new addOns();
        $receive="";
        $receive=$caller->addonssaveFunction($_POST["name"],$_POST["price"],$_POST["stock"]);
        echo  $receive;
    }
?>