<?php
    if(isset($_POST["id"],$_POST["name"])){
        //model
        include_once("model/categoryModel.php");
        //caller
        $caller=new category();
        $receive="";
        $receive=$caller->categoryupdateFunction($_POST["id"],$_POST["name"]);
        echo  $receive;
    }
?>