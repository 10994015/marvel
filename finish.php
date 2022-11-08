<?php
require_once('./config/connection.php');
$sql = "UPDATE no SET count=count+1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$sql = "SELECT count from no";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$arr=$stmt->fetch(PDO::FETCH_ASSOC);
$connter = $arr["count"];
$count = strlen($connter);
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>衛保組健促計畫</title>
    <link rel="stylesheet" href="./css/finish2.css">
</head>
<body>
        <div class="pass">
                <h1>英雄Online</h1>
                <h1 style="margin-left:100px">健康Mylife</h1>
                <!-- <h1 id="second">序號:
                </h1> -->
                <div class="second">
                <img src="images2/LOGO.png" alt="">
                <p>闖關成功<br>序號:<?php echo $connter; ?></p>
                </div>
                
                <p class="text">
                本活動為衛生保健組宣導各式健康促進議題<br>
                結合時事以平易近人、生活化方式作為傳遞<br>
                <br>
                請截圖本畫面+學生證/教職員證<br>
                於11/14-11/16，10:00-16:00<br>
                至全人大到帳篷區，兌換神秘小禮物1份<br>
                1人1份，名額有限，送完為止<br>
                <br>
                集滿3種不同角色背景，<br>
                11/17進行線上抽獎，贈送500元禮券，<br>
                共10名 (由系統自動判別符合資格者)，<br>
                感謝您的參加，衛生保健組關心您。
                </p>
                <a href="./" class="prehome">返回首頁</a>
                
        </div>

        <script>
          window.history.pushState(null, null, "#");

        window.addEventListener("hashchange", e=> {
        console.log('Hash 更改後觸發');
        });

        window.addEventListener("popstate", e=> {
        window.location.replace('https://jiousaio.com/Marvel/');
        });
        </script>
</body>
</html>