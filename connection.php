<?php 

try{
	$pdo = new PDO('mysql:host=localhost;dbname=marvel','root','');
}catch(PDOException $e){
	exit('資料庫錯誤.');
}

 ?>