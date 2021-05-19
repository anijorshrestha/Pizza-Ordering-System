<?php
include 'database.php';
$connect = pg_connect("host=" . $host . " port=" . $port . " dbname=" . $databaseName . " user=" . $userName . " password=" . $password) or die("Die Verbindung konnte nicht aufgebaut werden.");
if(!empty($_POST))
{
    $output = '';
    $message = '';
    $supp_id=pg_escape_string($connect,$_POST["supplier_id"]);
    $sname = pg_escape_string($connect, $_POST["sname"]);


    if($_POST["supplier_id"] != '')
    {
        $sql="select update_supplier('".$sname."',".$supp_id.")";
        $result = pg_query($db_handle, $sql);

        $message = 'Data Updated';
    }
    else
    {
        $sql ="select add_supplier ('".$sname."') ";
        $result = pg_query($db_handle, $sql);
        $message = 'Data Inserted';

    }


    echo $message;
}
?>