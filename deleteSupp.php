<?php
include "database.php";
if(isset($_POST["supplier_id"]))
{

    $sql =  "select delete_supplier(".$_POST["supplier_id"].")" ;

    $result = pg_query($db_handle, $sql);
    $message="Data deleted";
    echo $message;
}



