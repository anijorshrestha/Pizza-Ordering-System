<?php
//fetch.php
include "database.php";
if(isset($_POST["supplier_id"]))
{

    $sql =  "select * from get_supplierbyid(".$_POST["supplier_id"].")" ;

    $result = pg_query($db_handle, $sql);
    $row = pg_fetch_array($result);
    echo json_encode($row);
}

