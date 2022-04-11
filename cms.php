<?php
require_once('connection.php');
require_once('assist.php');
// if(isset($_SESSION['name'])){
$sql_str = "SELECT * FROM game WHERE type1=1 AND type2=2 AND type3=3 AND type4=4";

$user = $pdo -> query($sql_str);

$total = $user -> rowCount();


?>
<?php 

?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding: 0;
        }
    </style>
</head>
<body>
    <?php foreach($user as $item){?>
        <div class="userlist">
            <p class="user"><?php echo $item['name']; ?>-<?php echo $item['student']; ?> </p>
        </div>
    <?php } ?>
    
    <script>
       
    </script>
</body>
</html>

