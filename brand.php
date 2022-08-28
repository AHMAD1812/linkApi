<?php

require('./config');

$sql = "SELECT * FROM SALESREP_ZIP_VENDOR";
$query = $conn->prepare($sql);
$query->execute();
$members = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($members);
