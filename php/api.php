<?php
header("Content-Type: application/json");
$data = ["messaggio" => "Benvenuto nell'API PHP!", "status" => 200];
echo json_encode($data);
?>