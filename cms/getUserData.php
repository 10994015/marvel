<?php
require_once('../config/connection.php');
date_default_timezone_set('Asia/Taipei');
$timestamp = $_GET['date'];
if($timestamp == 1){

    $startdate = date("2000-1-1 00:00");
    $enddate = date("2030-1-1 00:00");
}else{
    $startdate = date("Y-m-d H:i", $timestamp);
    $dateTime = new DateTime($startdate);
    $dateTime->add(new DateInterval('PT1H40M'));
    $enddate =  $dateTime->format('Y/m/d H:i');
}

$sql_str = "SELECT * FROM game WHERE time BETWEEN :startdate AND :enddate";
$stmt = $pdo->prepare($sql_str);
$stmt->bindParam(':startdate',$startdate);
$stmt->bindParam(':enddate',$enddate);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);