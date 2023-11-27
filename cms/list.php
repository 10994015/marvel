<?php
require_once('../config/connection.php');
$sql_str = "SELECT giveback.*, game.name FROM giveback JOIN game ON giveback.student = game.student ORDER BY giveback.time DESC";
$stmt = $pdo->prepare($sql_str);
$stmt->execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>112年健康體育週 團體衛教講座</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./cms.css">
</head>
<body>
<div id="cms">
    <div class="center">
        <div class="header">
                <h2>112年健康體育週 團體衛教講座</h2>
        </div>
        <table class="table list-table">
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
                <th scope="col"><?php echo $item['score']; ?></th>
                <th scope="col"><?php echo $item['message']; ?></th>
                <th scope="col"><?php echo $item['time']; ?></th>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>