<?php
include("./config/connection.php");

if( isset($_POST['hidden']) && $_POST['hidden']=='correct' ){


try {
    $type = $_POST['type'];
    $sql_str = "SELECT * FROM game ORDER BY time DESC";
   
    $RS_mb = $pdo -> query($sql_str);
    $total_RS_mb = $RS_mb -> rowCount();
  } 
  catch ( PDOException $e ){
    die("ERROR!!!: ". $e->getMessage());
  }
  ?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>衛保組健促計畫</title>
    <link rel="stylesheet" href="./css/input.css">
</head>
<body>
   <div class="form">
        <form action="add.php" method="post" id="form">
            <input type="number" placeholder="請輸入學號" name="student" min="8" max="8" id="student" required>
            <input type="text" placeholder="請輸入姓名" name="name" required id="name">
            <div class="Satisfaction">
                <p style="text-align:center;font-size:18px;font-weight: 600;">您對本次活動的滿意度為何?</p>
                <select name="score" id="">
                    <option value="5">非常滿意</option>
                    <option value="4">滿意</option>
                    <option value="3">普通</option>
                    <option value="2">不滿意</option>
                    <option value="1">非常不滿意</option>
                </select>
                <p style="text-align:center;font-size:18px;font-weight: 600;margin-top:10px">您覺得本次活動學習到?(可複選)</p>
                <label for="q1">
                    <input type="checkbox" id="q1" name="q1" class="study">瞭解運動對身體的好處及重要性，願意培養運動習慣。
                </label>
                <label for="q2">
                    <input type="checkbox" id="q2" name="q2" class="study">瞭解含糖飲料對身體的負面影響及多喝白開水的益處。
                </label>
                <label for="q3">
                    <input type="checkbox" id="q3" name="q3" class="study">飲料紅黃綠燈有助於選擇飲品的判斷。
                </label>
                <label for="q4">
                    <input type="checkbox" id="q4" name="q4" class="study">瞭解如何照顧傷口，降低紅腫熱痛感染的發生。
                </label>
                <label for="q5">
                    <input type="checkbox" id="q5" name="q5" class="study">學會執行簡易自我傷口處理。
                </label>
                <label for="q6">
                    <input type="checkbox" id="q6" name="q6" class="study">我願意將今日所學的健康知識傳遞給身邊的朋友與同學。
                </label>
                <label for="q7">
                    <input type="checkbox" id="q7" name="q7" class="study">我會想主動學習更多有關運動、減糖、護眼及傷害預防處理的知識。
                </label>
                <textarea name="message" id="" placeholder="您對本次活動心得回饋..."></textarea>
            </div>
            <input type="hidden" name="inputData" value="insert">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <input type="button" value="完成" id="finish" disabled>
        </form>   
   </div>
    <script src="./js/input.js"></script>
    <script>
        finish.addEventListener('click', ()=>{
            if(student.value == '' || student.value == 0){
                alert('請輸入正確學號!')
                return
            }
            if(name.value == '' || name.value == 0){
                alert('請輸入正確姓名!')
                return
            }
            form.submit();
        })
    </script>
</body>
</html>
<?php
}else{

    ?>
    <style>
    *{
        margin: 0;
        padding: 0;
    }
    .error403{
        display: flex;
        justify-content: center;
        align-items: center;
        min-width:100%;
        min-height:100vh;
    }
    .error403 h1{
        font-size: 60px;
    }
    </style>
    <div class="error403"><h1>請先玩遊戲!</h1></div>
    <?php
   
}
