<?php
include 'database.php';
$connect = pg_connect("host=" . $host . " port=" . $port . " dbname=" . $databaseName . " user=" . $userName . " password=" . $password) or die("Die Verbindung konnte nicht aufgebaut werden.");
if(!empty($_POST))
{
    echo ($_POST["sel_sup"]);
//    echo ($_POST["ingredient_id"]);
    $output = '';
    $message = '';
    $ing_id=pg_escape_string($connect,$_POST["ingredient_id"]);
    $iname = pg_escape_string($connect, $_POST["iname"]);
    $sel_region = pg_escape_string($connect, $_POST["sel_region"]);
    $sel_sup = pg_escape_string($connect, $_POST["sel_sup"]);
    $stock = pg_escape_string($connect, $_POST["stock"]);
    $price = pg_escape_string($connect, $_POST["price"]);


    echo $_POST["ingredient_id"];
    if($_POST["ingredient_id"] != '')
    {
        $sql="select update_ingredients(".$_POST["ingredient_id"].",'".$iname."',".$sel_region.",".$price.",".$sel_sup.",".$stock.")";
        $result = pg_query($db_handle, $sql);

        $message = 'Data Updated';
    }
    else
    {
        $sql ="select add_ingredients('".$sel_region."',".$iname.",".$price.",".$stock.",".$sel_sup.") ";

        $result = pg_query($db_handle, $sql);
        $message = 'Data Inserted';

    }

    echo $message;
}
?>