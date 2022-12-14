<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

// SQL server configuration
$serverName = "link-reporting.database.windows.net";
$dbUsername = "link";
$dbPassword = "tlc1985&Going";
$dbName = "reporting";

// Create database connection
try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$dbName", $dbUsername, $dbPassword);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error connecting to SQL Server: " . $e->getMessage());
}
