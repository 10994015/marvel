<?php
$randNum = rand(1, 4);
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>衛保組健促計畫</title>
    <link rel="stylesheet" href="./css/index2.css">
</head>

<body>
    <form method="post" action="start.php">
        <img src="images2/home.webp" />
        <!-- <a href="./start.php">開始遊戲</a> -->
        <input type="hidden" name="type" value="<?php echo $randNum; ?>">
        <div class="startBtn">
            <input type="submit" class="start" value="">
            <a href="./" class="prehome">開始遊戲</a>
        </div>
    </form>
</body>

</html>