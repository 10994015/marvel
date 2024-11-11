<?php
require_once('../config/connection.php');
require_once('../config/assist.php');
// if(isset($_SESSION['name'])){
date_default_timezone_set('Asia/Taipei');
if (isset($_SESSION['username'])) {
    $sql_str = "SELECT * FROM game WHERE 
(type1=1 AND type2=2 AND type3=3) 
OR (type1=1 AND type2=2 AND type4=4) 
OR (type1=1 AND type3=3 AND type4=4) 
OR (type2=2 AND type3=3 AND type4=4)";

    $stmt = $pdo->prepare($sql_str);
    $stmt->execute();
    $RS_users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $passTotal = $stmt->rowCount();



    $sql_str = "SELECT * FROM game";
    $stmt2 = $pdo->prepare($sql_str);
    $stmt2->execute();
    $RS_total_users = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    $total = $stmt2->rowCount();

    $sql_str = "SELECT giveback.*, game.name FROM giveback JOIN game ON giveback.student = game.student WHERE giveback.score=5";
    $sql_str = "WITH RankedStudents  AS ( SELECT *, ROW_NUMBER() OVER (PARTITION BY giveback.student ORDER BY giveback.id DESC) AS rn FROM giveback ) SELECT RankedStudents.*, game.name FROM RankedStudents JOIN game ON RankedStudents.student = game.student WHERE rn = 1 AND RankedStudents.score=5 ORDER BY RankedStudents.time DESC";
    $stmt3 = $pdo->prepare($sql_str);
    $stmt3->execute();
    $score_5 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
    $total5 = $stmt3->rowCount();

    $sql_str = "SELECT giveback.*, game.name FROM giveback JOIN game ON giveback.student = game.student WHERE giveback.score=4";
    $sql_str = "WITH RankedStudents  AS ( SELECT *, ROW_NUMBER() OVER (PARTITION BY giveback.student ORDER BY giveback.id DESC) AS rn FROM giveback ) SELECT RankedStudents.*, game.name FROM RankedStudents JOIN game ON RankedStudents.student = game.student WHERE rn = 1 AND RankedStudents.score=4 ORDER BY RankedStudents.time DESC";
    $stmt4 = $pdo->prepare($sql_str);
    $stmt4->execute();
    $score_4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
    $total4 = $stmt4->rowCount();

    $sql_str = "SELECT giveback.*, game.name FROM giveback JOIN game ON giveback.student = game.student WHERE giveback.score=3";
    $sql_str = "WITH RankedStudents  AS ( SELECT *, ROW_NUMBER() OVER (PARTITION BY giveback.student ORDER BY giveback.id DESC) AS rn FROM giveback ) SELECT RankedStudents.*, game.name FROM RankedStudents JOIN game ON RankedStudents.student = game.student WHERE rn = 1 AND RankedStudents.score=3 ORDER BY RankedStudents.time DESC";
    $stmt5 = $pdo->prepare($sql_str);
    $stmt5->execute();
    $score_3 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
    $total3 = $stmt5->rowCount();

    $sql_str = "SELECT giveback.*, game.name FROM giveback JOIN game ON giveback.student = game.student WHERE giveback.score=2";
    $sql_str = "WITH RankedStudents  AS ( SELECT *, ROW_NUMBER() OVER (PARTITION BY giveback.student ORDER BY giveback.id DESC) AS rn FROM giveback ) SELECT RankedStudents.*, game.name FROM RankedStudents JOIN game ON RankedStudents.student = game.student WHERE rn = 1 AND RankedStudents.score=2 ORDER BY RankedStudents.time DESC";
    $stmt6 = $pdo->prepare($sql_str);
    $stmt6->execute();
    $score_2 = $stmt6->fetchAll(PDO::FETCH_ASSOC);
    $total2 = $stmt6->rowCount();

    $sql_str = "SELECT giveback.*, game.name FROM giveback JOIN game ON giveback.student = game.student WHERE giveback.score=1";
    $sql_str = "WITH RankedStudents  AS ( SELECT *, ROW_NUMBER() OVER (PARTITION BY giveback.student ORDER BY giveback.id DESC) AS rn FROM giveback ) SELECT RankedStudents.*, game.name FROM RankedStudents JOIN game ON RankedStudents.student = game.student WHERE rn = 1 AND RankedStudents.score=1 ORDER BY RankedStudents.time DESC";
    $stmt7 = $pdo->prepare($sql_str);
    $stmt7->execute();
    $score_1 = $stmt7->fetchAll(PDO::FETCH_ASSOC);
    $total1 = $stmt7->rowCount();

    $sql_str = "SELECT AVG(score) FROM giveback";
    $sql_str = "WITH RankedStudents  AS ( SELECT *, ROW_NUMBER() OVER (PARTITION BY giveback.student ORDER BY giveback.id DESC) AS rn FROM giveback ) SELECT AVG(RankedStudents.score) FROM RankedStudents JOIN game ON RankedStudents.student = game.student WHERE rn = 1 ORDER BY RankedStudents.time DESC";
    $stmt8 = $pdo->prepare($sql_str);
    $stmt8->execute();
    $avg = $stmt8->fetchColumn();

?>

    <!DOCTYPE html>
    <html lang="zh-Hant-TW">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>113年健康體育週 團體衛教講座</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="./cms.css">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js" integrity="sha512-b94Z6431JyXY14iSXwgzeZurHHRNkLt9d6bAHt7BZT38eqV+GyngIi/tVye4jBKPYQ2lBdRs0glww4fmpuLRwA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>

    <body>
        <div id="cms" x-data="{
        init(){
            this.getUsers();
        },
        data:{},
        selectDate:1,
        changeDate(){
            this.getUsers();
        },
        getUsers(){
            axios.get('./getUserData.php?date='+this.selectDate).then(res=>{
                console.log(res)
                this.data = res.data
            })
        }
    }">
            <a href="./logout.php" class="logout btn btn-info">登出</a>
            <div class="center">
                <div class="header">
                    <h2>113年健康體育週 團體衛教講座</h2>
                </div>
                <div class="content">
                    <div class="left">
                        <select class="form-select" aria-label="Default select example" id="toggleView" x-model="selectDate" @change="changeDate()">
                            <option value="1" selected>全部(僅顯示符合資格者)</option>
                            <option value="1701475800">12/2 星期一 第一場 08:10-09:50</option>
                            <option value="1701483000">12/2 星期一 第二場 10:10-11:50</option>
                            <option value="1701493800">12/2 星期一 第三場 13:10-14:50</option>
                            <option value="1701501000">12/2 星期一 第四場 15:10-16:50</option>
                            <option value="1701562200">12/3 星期二 第一場 08:10-09:50</option>
                            <option value="1701569400">12/3 星期二 第二場 10:10-11:50</option>
                            <option value="1701580200">12/3 星期二 第三場 13:10-14:50</option>
                            <option value="1701587400">12/3 星期二 第四場 15:10-16:50</option>
                            <option value="1701648600">12/4 星期三 第一場 08:10-09:50</option>
                            <option value="1701666600">12/4 星期三 第二場 13:10-14:50</option>
                            <option value="1701673800">12/4 星期三 第三場 15:10-16:50</option>
                            <option value="1701735000">12/5 星期四 第一場 08:10-09:50</option>
                            <option value="1701742200">12/5 星期四 第二場 10:10-11:50</option>
                            <option value="1701753000">12/5 星期四 第三場 13:10-14:50</option>
                            <option value="1701760200">12/5 星期四 第四場 15:10-16:50</option>
                            <option value="1701821400">12/6 星期五 第一場 08:10-09:50</option>
                            <option value="1701828600">12/6 星期五 第二場 10:10-11:50</option>
                            <option value="1701839400">12/6 星期五 第三場 13:10-14:50</option>
                            <option value="1701846600">12/6 星期五 第四場 15:10-16:50</option>
                        </select>
                        <div class="list" id="passlist">
                            <template x-for="item in data">
                                <div class="item sample" x-html="item.student + '-' + item.name + '-' + item.time">10994015 - 李承諺 - 時間 : 5分 </div>
                            </template>
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
                    <p class="scoreView" id="score5View">非常滿意: <?php echo $total5; ?></p>
                    <p class="scoreView" id="score4View">滿意: <?php echo $total4; ?></p>
                    <p class="scoreView" id="score3View">普通: <?php echo $total3; ?></p>
                    <p class="scoreView" id="score2View">不滿意: <?php echo $total2; ?></p>
                    <p class="scoreView" id="score1View">非常不滿意: <?php echo $total1; ?></p>
                    <b>平均分數: <?php echo $avg; ?> </b>
                </div>
                <footer>
                    <a href="./list.php">中原大學衛保組</a>
                </footer>
            </div>
            <div class="scoreModal" id="score5">
                <div class="scoreModalback"></div>
                <div class="content">
                    <div class="header">非常滿意</div>
                    <ul>
                        <?php foreach ($score_5 as $item) { ?>
                            <li><?php echo $item['student'] . "-__" . $item['name'] . "-score:" . $item['score']; ?></li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
            <div class="scoreModal" id="score4">
                <div class="scoreModalback"></div>
                <div class="content">
                    <div class="header">滿意</div>
                    <ul>
                        <?php foreach ($score_4 as $item) { ?>
                            <li><?php echo $item['student'] . "-__" . $item['name'] . "-score:" . $item['score']; ?></li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
            <div class="scoreModal" id="score3">
                <div class="scoreModalback"></div>
                <div class="content">
                    <div class="header">普通</div>
                    <ul>
                        <?php foreach ($score_3 as $item) { ?>
                            <li><?php echo $item['student'] . "-__" . $item['name'] . "-score:" . $item['score']; ?></li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
            <div class="scoreModal" id="score2">
                <div class="scoreModalback"></div>
                <div class="content">
                    <div class="header">不滿意</div>
                    <ul>
                        <?php foreach ($score_2 as $item) { ?>
                            <li><?php echo $item['student'] . "-__" . $item['name'] . "-score:" . $item['score']; ?></li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
            <div class="scoreModal" id="score1">
                <div class="scoreModalback"></div>
                <div class="content">
                    <div class="header">非常不滿意</div>
                    <ul>
                        <?php foreach ($score_1 as $item) { ?>
                            <li><?php echo $item['student'] . "-__" . $item['name'] . "-score:" . $item['score']; ?></li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>

        </div>

        <script src="./cms.js"></script>
    </body>

    </html>
<?php } else {
    header('Location:./login.php');
} ?>