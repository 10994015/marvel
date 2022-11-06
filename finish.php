<?php
require_once('./config/connection.php');
$sql = "UPDATE no SET count=count+1";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$sql = "SELECT count from no";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$arr=$stmt->fetchAll(PDO::FETCH_ASSOC);
$connter = $arr[0]["count"];
$count = strlen($connter);
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
                .pass{
                position: fixed;
                top: 0;
                left: 0;
                width:100%;
                height: 100vh;
                background: #FFC9C9;
                color:#1F3864;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                z-index: 99999999999999999999999;
                transition: 1s;
                }
                .pass>h1{
                font-size:2.4rem;
                color:#BF3434;
                }
                .pass >img{
                width: 200px;
                height: 200px;
                }
                .pass>p{
                font-size: 1.1rem;
                font-weight: 600;
                text-align: center;
                line-height: 1.3;
                }

    </style>
</head>
<body>
        <div class="pass">
                <h1>闖關成功</h1>
                <h1 id="second">序號:
                <?php 
                        for($i=0;$i<$count;$i++){
                                echo $connter[$i];
                        }
                ?>
                </h1>
                <img src="images2/LOGO.png" alt="">
                <p>本活動為衛生保健組宣導各式健康促進議題</p>
                <p>結合時事以平易近人、生活化方式作為傳遞</p>
                <br>
                <p>請截圖本畫面+學生證/教職員證</p>
                <p>於4/25-27，10:00-16:00</p> 
                <p>至全人大道帳篷區，兌換神秘小禮物1份</p> 
                <p>1人1份，名額有限，送完為止</p> 
                <p>感謝您的參加，衛生保健組關心您</p> 
                
        </div>

        <script>
          window.history.pushState(null, null, "#");

        window.addEventListener("hashchange", e=> {
        console.log('Hash 更改後觸發');
        });

        window.addEventListener("popstate", e=> {
        window.location.replace('https://jiousaio.com/Lecture/');
        });
        </script>
</body>
</html>