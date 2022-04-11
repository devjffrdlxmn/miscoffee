<?php

    include_once("model/typeModel.php");
    //caller
    $type=new Type();
    $receive="";
    if(isset($_POST["typeName"])){
        $receive=$type->save($_POST["typeName"]);
        echo   $receive;
    }
    
        
?>