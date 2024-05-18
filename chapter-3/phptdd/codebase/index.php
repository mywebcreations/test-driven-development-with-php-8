<?php

$dbHost         = "server-mysql";
$dbUsername     = "root";
$dbPassword     = "my12*uitsa&";
$dbName         = "mysql";
try {
    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "MySQL: Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
//Show PHP info:
phpinfo();

?>