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

if(isset($_GET['zip'])){
   $sql = "SELECT * FROM SALESREP_ZIPCODE where ZIPCODE=" . $_GET['zip'];
   $query = $conn->prepare($sql);
   $query->execute();
   $members = $query->fetchAll(PDO::FETCH_ASSOC);

   echo json_encode($members);
}else if(isset($_GET['zipcode']) && isset($_GET['brand'])){
   try{
      $sql = "SELECT * FROM SALESREP_ZIP_VENDOR where BRAND_NAME = '".$_GET['brand']."' AND ZIPCODE='".$_GET['zipcode']."'";
      $query = $conn->prepare($sql);
      $query->execute();
      $members = $query->fetchAll(PDO::FETCH_ASSOC);

      echo json_encode($members);
   }catch(PDOException $e){
      die("Error " . $e->getMessage());
   }
}