<?php
include "database.php";
if(isset($_POST["ingredient_id"]))
{

    $sql =  "select restock(".$_POST["ingredient_id"].")" ;

    $result = pg_query($db_handle, $sql);
//    $row = pg_fetch_array($result);
    $message="Restocked";
    echo $message;
}



