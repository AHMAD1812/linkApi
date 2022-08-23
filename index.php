<?php 
// SQL server configuration 
$serverName = "link-reporting.database.windows.net"; 
$dbUsername = "link"; 
$dbPassword = "tlc1985&Going"; 
$dbName     = "reporting"; 
 
// Create database connection 
try {   
   $conn = new PDO( "sqlsrv:Server=$serverName;Database=$dbName", $dbUsername, $dbPassword);    
   $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );   
}   
   
catch( PDOException $e ) {   
   die( "Error connecting to SQL Server: ".$e->getMessage() );    
}

$sql = "SELECT * FROM SALESREP_ZIPCODE where ZIPCODE=".$_GET['zip'];
$query = $conn->prepare($sql);
$query->execute();
$members = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($members);