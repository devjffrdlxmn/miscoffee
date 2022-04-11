<?php
    
    include_once("model/typeModel.php");
    $type=new Type();
    $receive="";
    if(isset($_POST["typeId"])){
        $receive=$type->delete($_POST["typeId"]);
        echo   $receive;
    }
    
?>