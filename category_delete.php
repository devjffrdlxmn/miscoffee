<?php
    if(isset($_POST["id"])){
        //model
        include_once("model/categoryModel.php");
        //caller
        $caller=new category();
        $receive="";
        $receive=$caller->categorydeleteFunction($_POST["id"]);
        echo  $receive;
    }
?>