<?php
    if(isset($_POST["id"],$_POST["name"],$_POST["price"],$_POST["stock"])){
        //model
        include_once("model/addonsModel.php");
        //caller
        $caller=new addOns();
        $receive="";
        $receive=$caller->addonsupdateFunction($_POST["id"],$_POST["name"],$_POST["price"],$_POST["stock"]);
        echo  $receive;
    }
?>