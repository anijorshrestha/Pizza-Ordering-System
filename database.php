<?php

//$host = "localhost";
//$port = "5432"; // should be 5432
//$databaseName = "crud";
//$userName = "postgres";
//$password = "Rojin@1!";
//$tableName = "pizzen";
$host = "localhost";
$port = "5432"; // should be 5432
$databaseName = "postgres";
$userName = "postgres";
$password = "Rojin@1!";

$db_handle = pg_connect("host=" . $host . " port=" . $port . " dbname=" . $databaseName . " user=" . $userName . " password=" . $password) or die("Die Verbindung konnte nicht aufgebaut werden.");
//if(pg_connection_status($db_handle) === PGSQL_CONNECTION_OK)
//{
////    echo "Connected to database.<br/>\r\n";
////    var_dump($db_handle);
//}?>