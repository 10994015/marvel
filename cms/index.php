<?php
require_once('../config/connection.php');
require_once('../config/assist.php');
// if(isset($_SESSION['name'])){
$sql_str = "SELECT * FROM game WHERE 
(type1=1 AND type2=2 AND type3=3) 
OR (type1=1 AND type2=2 AND type4=4) 
OR (type1=1 AND type3=3 AND type4=4) 
OR (type2=2 AND type3=3 AND type4=4)";

$stmt = $pdo -> prepare($sql_str);
$stmt->execute();
$RS_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
$passTotal = $stmt -> rowCount();



$sql_str = "SELECT * FROM game";
$stmt2 = $pdo -> prepare($sql_str);
$stmt2->execute();
$RS_total_users = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$total = $stmt2 -> rowCount();

$sql_str = "SELECT * FROM game WHERE score=5";
$stmt3 = $pdo -> prepare($sql_str);
$stmt3->execute();
$score_5 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$total5 = $stmt3 -> rowCount();

$sql_str = "SELECT * FROM game WHERE score=4";
$stmt4 = $pdo -> prepare($sql_str);
$stmt4->execute();
$score_4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
$total4 = $stmt4 -> rowCount();

$sql_str = "SELECT * FROM game WHERE score=3";
$stmt5 = $pdo -> prepare($sql_str);
$stmt5->execute();
$score_3 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
$total3 = $stmt5 -> rowCount();

$sql_str = "SELECT * FROM game WHERE score=2";
$stmt6 = $pdo -> prepare($sql_str);
$stmt6->execute();
$score_2 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
$total2 = $stmt6 -> rowCount();

$sql_str = "SELECT * FROM game WHERE score=1";
$stmt7 = $pdo -> prepare($sql_str);
$stmt7->execute();
$score_1 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
$total1 = $stmt7 -> rowCount();

$sql_str = "SELECT AVG(score) FROM game";
$stmt8 = $pdo -> prepare($sql_str);
$stmt8->execute();
$avg = $stmt8->fetchColumn();

?>
<?php 
if(isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>衛生保健組健康促進活動抽獎系統</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./cms.css">
</head>
<body>
    <div id="cms">
        <a href="./logout.php" class="logout btn btn-info">登出</a>
        <div class="center">
            <div class="header">
                <h2>衛生保健組健康促進活動抽獎系統</h2>
            </div>
            <div class="content">
                <div class="left">
                    <select class="form-select" aria-label="Default select example" id="toggleView">
                        <option value="1" selected>僅顯示符合資格者</option>
                    </select>
                    <div class="list" id="passlist">
                        <?php foreach($RS_users as $user){ ?>
                            <div class="item sample"><?php echo $user['student']."-".$user['name']." ".$user['time']; ?> <span style="color:#fff"><?php echo 'score:'.$user['score']; ?></span> </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="right">
                    <div class="choose">
                        <select class="form-select" id="lotterySelect" aria-label="Default select example">
                            <option selected value="0">抽獎人數</option>
                            <option value="1">1</option>
                            <option value="3">3</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                        </select>
                        <button type="button" class="btn btn-success" id="addSemple">加入樣本</button>
                        <button type="button" class="btn btn-primary" id="lotteryBtn">抽獎</button>
                    </div>
                    <div class="list" id="winnerList">
                    </div>
                </div>
            </div>
            <div class="bottom">
                <p>總人數: <?php echo $total; ?></p>
                <b>通過人數: <?php echo $passTotal; ?> </b>
                <p class="scoreView" id="score5View">非常滿意: <?php echo $total5; ?></p>
                <p class="scoreView" id="score4View">滿意: <?php echo $total4; ?></p>
                <p class="scoreView" id="score3View">普通: <?php echo $total3; ?></p>
                <p class="scoreView" id="score2View">不滿意: <?php echo $total2; ?></p>
                <p class="scoreView" id="score1View">非常不滿意: <?php echo $total1; ?></p>
                <b>平均分數: <?php echo $avg; ?> </b>
            </div>
            <footer>
                <p>中原大學衛保組</p>
            </footer>    
        </div>
        <div class="scoreModal" id="score5">
            <div class="scoreModalback"></div>
            <div class="content">
                <div class="header">非常滿意</div>
            <ul>
            <?php foreach($score_5 as $item){ ?>
                <li><?php echo $item['student']."-".$item['name']."-score:".$item['score']; ?></li>
            <?php  } ?>
            </ul>
            </div>
        </div>
        <div class="scoreModal" id="score4">
            <div class="scoreModalback"></div>
            <div class="content">
            <div class="header">滿意</div>
            <ul>
            <?php foreach($score_4 as $item){ ?>
                <li><?php echo $item['student']."-".$item['name']."-score:".$item['score']; ?></li>
            <?php  } ?>
            </ul>
            </div>
        </div>    
        <div class="scoreModal" id="score3">
            <div class="scoreModalback"></div>
            <div class="content">
            <div class="header">普通</div>
            <ul>
            <?php foreach($score_3 as $item){ ?>
                <li><?php echo $item['student']."-".$item['name']."-score:".$item['score']; ?></li>
            <?php  } ?>
            </ul>
            </div>
        </div>    
        <div class="scoreModal" id="score2">
            <div class="scoreModalback"></div>
            <div class="content">
            <div class="header">不滿意</div>
            <ul>
            <?php foreach($score_2 as $item){ ?>
                <li><?php echo $item['student']."-".$item['name']."-score:".$item['score']; ?></li>
            <?php  } ?>
            </ul>
            </div>
        </div>    
        <div class="scoreModal" id="score1">
            <div class="scoreModalback"></div>
            <div class="content">
            <div class="header">非常不滿意</div>
            <ul>
            <?php foreach($score_1 as $item){ ?>
                <li><?php echo $item['student']."-".$item['name']."-score:".$item['score']; ?></li>
            <?php  } ?>
            </ul>
            </div>
        </div>    

    </div>
    
    <script src="./cms.js"></script>
</body>
</html>
<?php }else{
    header('Location:./login.php');  
}?>