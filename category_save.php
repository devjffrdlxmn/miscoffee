<?php
    if(isset($_POST["name"])){
        //model
        include_once("model/categoryModel.php");
        //caller
        $caller=new category();
        $receive="";
        $receive=$caller->categorysaveFunction($_POST["name"]);
        echo  $receive;
    }
?>