<?php
require_once('../config/connection.php');
require_once('../config/assist.php');
date_default_timezone_set('Asia/Taipei');
if(isset($_SESSION['username'])){
$sql_str = "SELECT giveback.*, game.name FROM giveback JOIN game ON giveback.student = game.student ORDER BY giveback.time DESC";
$stmt = $pdo->prepare($sql_str);
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$score = [
    1=>'非常不滿意',
    2=>'不滿意',
    3=>'普通',
    4=>'滿意',
    5=>'非常滿意'
];
$sql_str = "SELECT COUNT(CASE WHEN q1 = 1 THEN 1 END) AS count_q1, COUNT(CASE WHEN q2 = 1 THEN 1 END) AS count_q2, COUNT(CASE WHEN q3 = 1 THEN 1 END) AS count_q3, COUNT(CASE WHEN q4 = 1 THEN 1 END) AS count_q4, COUNT(CASE WHEN q5 = 1 THEN 1 END) AS count_q5, COUNT(CASE WHEN q6 = 1 THEN 1 END) AS count_q6, COUNT(CASE WHEN q7 = 1 THEN 1 END) AS count_q7 FROM giveback";
$stmt = $pdo->prepare($sql_str);
$stmt->execute();
$feedback = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>112年健康體育週 團體衛教講座</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./cms.css">
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- 引入 jQuery -->
   
</head>
<body>
<div id="cms" x-data="{
    list:{
        1:{show:true},
        2:{show:false}
    },
    toggleList(type){
        this.list[1].show = false
        this.list[2].show = false
        this.list[type].show = true
    },
    tableToExel(){
        var table2excel = new Table2Excel();
        if(this.list[1].show){
            this.list[2].show = true
            table2excel.export(document.querySelectorAll('table'));
        }else{
            this.list[1].show = true
            table2excel.export(document.querySelectorAll('table'));
        }
    }
}">
    <a href="./" class="goback btn btn-primary">回列表</a>
    <a href="./logout.php" class="logout btn btn-info">登出</a>
    <div class="center">
        <div class="header">
                <h2>112年健康體育週 團體衛教講座</h2>
        </div>
        <div class="sidebar">
            <button type="button" :class="['btn', (list[1].show) ?  'btn-primary' : 'btn-secondary']" @click="toggleList(1)">使用者統計</button>
            <button type="button" :class="['btn', (list[2].show) ?  'btn-primary' : 'btn-secondary']" @click="toggleList(2)">回饋統計</button>
        </div>
        <div class="export-excel">
            <button class="btn btn-success" @click="tableToExel()">匯出Excel</button>
        </div>
        <table class="table list-table" x-show="list[1].show"  x-ref="table1">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">學號</th>
                <th scope="col">姓名</th>
                <th scope="col">內容</th>
                <th scope="col">分數</th>
                <th scope="col">想說的話</th>
                <th scope="col">時間</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($list as $item): ?>
                <tr>
                <th scope="col"><?php echo $item['id']; ?></th>
                <th scope="col"><?php echo $item['student']; ?></th>
                <th scope="col"><?php echo $item['name']; ?></th>
                <th scope="col">
                    <ul>
                    <?php
                     echo $item['q1']==1 ? '<li>瞭解運動對身體的好處及重要性，願意培養運動習慣。</li>' : '';
                     echo $item['q2']==1 ? '<li>瞭解含糖飲料對身體的負面影響及多喝白開水的益處。</li>' : '';
                     echo $item['q3']==1 ? '<li>飲料紅黃綠燈有助於選擇飲品的判斷。</li>' : '';
                     echo $item['q4']==1 ? '<li>瞭解如何照顧傷口，降低紅腫熱痛感染的發生。</li>' : '';
                     echo $item['q5']==1 ? '<li>學會執行簡易自我傷口處理。</li>' : '';
                     echo $item['q6']==1 ? '<li>我願意將今日所學的健康知識傳遞給身邊的朋友與同學。</li>' : '';
                     echo $item['q7']==1 ? '<li>我會想主動學習更多有關運動、減糖、護眼及傷害預防處理的知識。</li>' : '';
                    ?>
                    </ul>
                </th>
                <th scope="col"><?php echo $score[$item['score']]; ?></th>
                <th scope="col"><?php echo $item['message']; ?></th>
                <th scope="col"><?php echo $item['time']; ?></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <table class="table list-table" x-show="list[2].show"  x-ref="table2">
            <tr>
                <th>瞭解運動對身體的好處及重要性，願意培養運動習慣。</th>
                <th><?php echo $feedback['count_q1']; ?></th>
            </tr>
            <tr>
                <th>瞭解含糖飲料對身體的負面影響及多喝白開水的益處。</th>
                <th><?php echo $feedback['count_q2']; ?></th>
            </tr>
            <tr>
                <th>飲料紅黃綠燈有助於選擇飲品的判斷。</th>
                <th><?php echo $feedback['count_q3']; ?></th>
            </tr>
            <tr>
                <th>瞭解如何照顧傷口，降低紅腫熱痛感染的發生。</th>
                <th><?php echo $feedback['count_q4']; ?></th>
            </tr>
            <tr>
                <th>學會執行簡易自我傷口處理。</th>
                <th><?php echo $feedback['count_q5']; ?></th>
            </tr>
            <tr>
                <th>我願意將今日所學的健康知識傳遞給身邊的朋友與同學。</th>
                <th><?php echo $feedback['count_q6']; ?></th>
            </tr>
            <tr>
                <th>我會想主動學習更多有關運動、減糖、護眼及傷害預防處理的知識。</th>
                <th><?php echo $feedback['count_q7']; ?></th>
            </tr>
            
        </table>
        <footer>
            <a href="./list.php">中原大學衛保組</a>
        </footer>  
    </div>
</div>
</body>
</html>

<script src="./table2excel.js"></script>
<script>
    function tableToExel(){
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll('table'));
    }
</script>
<?php }else{header('Location:./login.php');  }  ?>