<?php
    include_once('model/typeModel.php');
    $type = new Type();
    if(isset($_POST['typeName']))
    {
        $checkType = $type->checkTypetExist($_POST['typeName']);
        if($checkType == 1)echo '1';   
    }
?>
