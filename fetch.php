<?php
//fetch.php
include "database.php";
if(isset($_POST["ingredient_id"]))
{

    $sql =  "select * from get_ingredientsById(".$_POST["ingredient_id"].")" ;

    $result = pg_query($db_handle, $sql);
    $row = pg_fetch_array($result);
    echo json_encode($row);
}

 