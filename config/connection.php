<?php 

try{
	$pdo = new PDO('mysql:host=localhost;dbname=marvel1127','root','');
}catch(PDOException $e){
	exit('資料庫錯誤.');
}
 ?>