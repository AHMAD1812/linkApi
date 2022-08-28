<?php 

require('./config');

$sql = "SELECT * FROM SALESREP_ZIPCODE where ZIPCODE=".$_GET['zip'];
$query = $conn->prepare($sql);
$query->execute();
$members = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($members);