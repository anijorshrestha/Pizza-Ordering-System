<?php
include 'database.php';
$connect = pg_connect("host=" . $host . " port=" . $port . " dbname=" . $databaseName . " user=" . $userName . " password=" . $password) or die("Die Verbindung konnte nicht aufgebaut werden.");
if(!empty($_POST))
{
    $output = '';
    $message = '';

    $inamein = pg_escape_string($connect, $_POST["inamein"]);
    $sql="select add_ingredient('".$inamein."')";
    $result = pg_query($db_handle, $sql);

    $message = 'Data Updated';


//    echo $_POST["ingredient_id"];
//    if($_POST["ingredient_id"] != '')
//    {
//        $sql="select update_ingredients(".$_POST["ingredient_id"].",'".$iname."',".$sel_region.",".$price.",".$sel_sup.",".$stock.")";
//        $result = pg_query($db_handle, $sql);
//
//        $message = 'Data Updated';
//    }
//    else
//    {
//        $sql ="select add_ingredients('".$iname."',".$sel_region.",".$sel_sup.",".$price.") ";
//        $result = pg_query($db_handle, $sql);
//        $message = 'Data Inserted';
//
//    }

    echo $message;
}
?>