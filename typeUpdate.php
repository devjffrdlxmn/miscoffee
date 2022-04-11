<?php
    
    include_once("model/typeModel.php");
    //caller
    $type=new Type();
    $receive="";
    if(isset($_POST["typeId"],$_POST["typeName"])){

        $receive=$type->update($_POST["typeId"],$_POST["typeName"]);
        echo   $receive;
    }
    
?>