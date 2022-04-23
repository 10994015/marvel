<?php
$randNum = rand(1,4);
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>衛保組健促計畫</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        form{
            background:#050C26;
            position: relative;

        }
        form>img{
            
            width: 100%;
            height: 100vh;
            object-fit: contain;
        }
        form > .start{
            position: absolute;
            display: block;
            bottom: 10%;
            left:calc(50% - 150px);
            width: 140px;
            height: 140px;
            border-radius: 50%;
            background-color: #BF3334;
            text-align: center;
            line-height: 140px;
            color:#fff;
            font-weight: 600;
            text-decoration: none;
            font-size: 1.8rem;
            animation: shadow 2s infinite;
            box-shadow: 0 0 10px  #fff;
            outline: none;
            border:none;
            cursor: pointer;
        }
        @keyframes shadow{
            0%{
                transform: scale(1);
               
            }
            50%{
                transform: scale(1.2);
            }
            100%{
                transform: scale(1);
            }
        }
        form > a:hover{
            background-color: #862424;
            transition: .5s;
        }
    </style>
</head>
<body>
    <form method="post" action="start.php"> 
        <img src="images2/bg.png" alt="">
        <!-- <a href="./start.php">開始遊戲</a> -->
        <input type="hidden" name="type" value="<?php echo $randNum; ?>">
        <input type="submit" class="start" value="開始遊戲">
    </form>
</body>
</html>