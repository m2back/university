<?php
$serverName="localhost";
$databaseName="university";
$username="root";
$password="";
$dsn="mysql:host=$serverName;dbname=$databaseName;charset=utf8";

try{
    $connection=new PDO($dsn,$username,$password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection Falied".$e->getMessage();

}

?>
