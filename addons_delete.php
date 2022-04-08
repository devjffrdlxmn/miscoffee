<?php
    if(isset($_POST["id"])){
        //model
        include_once("model/addonsModel.php");
        //caller
        $caller=new addOns();
        $receive="";
        $receive=$caller->addonsdeleteFunction($_POST["id"]);
        echo  $receive;
    }
?>