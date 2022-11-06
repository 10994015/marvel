<?php
include("./config/connection.php");
if(isset($_POST['type']) && $_POST['type'] !=""){
    
    $type = $_POST['type'];
    $scripturl = "script".$type.".js";
    $questionurl = "question".$type.".js";
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <title>衛保組健促計畫</title>
    
    
</head>
<body>   
<body> 

    
    <div class="randomBtn" id="randomBtn1">
        <a href="javascript:;" class="clickBtn" id="clickBtn"> <img src="./images2/click.png"></a>
    </div>
    
    
    
    <div class="all">
        
    <div class="main">
        <div id="hiddenLayer">
           <h1 id="touchH1">輕觸螢幕開始遊戲</h1>
        </div>
        <img src="./images2/head.png" class="head">
        <p class="hp">HP</p>
            <div class="progressBar" id="progressBar">
            
                <!-- <div class="progressBarItem"></div> -->
               
            </div>
            <div id="progressBarNum">100/100</div>
            <img src="" alt="" id="squid">
            <img src="" id="arms">
            <img src="" alt="" id="player">
            <p id="addscore">-2%</p>
    </div>

    <div class="qaAll">
            <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
            <div class="qa">
                    <p>(1).<span id="question1"></span></p>
                    <label for="q1-a"><input type="radio" name="q1" id="q1-a" class="option1"><span id="q1a"></span></label>
                    <label for="q1-b"><input type="radio" name="q1" id="q1-b" class="option1"><span id="q1b"></span></label>
                    <label for="q1-c"><input type="radio" name="q1" id="q1-c" class="option1"><span id="q1c"></span></label>
                    <!-- <strong id="hint1"></strong> -->
                    <button class="send">送出</button>
            </div>
            
            
            
            
    </div>

    <div class="qaAll">
        <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
            <div class="qa">
                    <p>(2).<span id="question2"></span></p>
                    <label for="q2-a"><input type="radio" name="q2" id="q2-a" class="option2"><span id="q2a"></span></label>
                    <label for="q2-b"><input type="radio" name="q2" id="q2-b" class="option2"><span id="q2b"></span></label>
                    <label for="q2-c"><input type="radio" name="q2" id="q2-c" class="option2"><span id="q2c"></span></label>
                    <!-- <strong id="hint2"></strong> -->
                    <button class="send">送出</button>
                </div>
    </div>

    <div class="qaAll">
        <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
        <div class="qa">
                <p>(3).<span id="question3"></span></p>
                <label for="q3-a"><input type="radio" name="q3" id="q3-a" class="option3"><span id="q3a"></span></label>
                <label for="q3-b"><input type="radio" name="q3" id="q3-b" class="option3"><span id="q3b"></span></label>
                <label for="q3-c"><input type="radio" name="q3" id="q3-c" class="option3"><span id="q3c"></span></label>
                <!-- <strong id="hint3"></strong> -->
                <button class="send">送出</button>
            </div>
    </div>

    <div class="qaAll">
        <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
        <div class="qa">
                <p>(4).<span id="question4"></span></p>
                <label for="q4-a"><input type="radio" name="q4" id="q4-a" class="option4"><span id="q4a"></span></label>
                <label for="q4-b"><input type="radio" name="q4" id="q4-b" class="option4"><span id="q4b"></span></label>
                <label for="q4-c"><input type="radio" name="q4" id="q4-c" class="option4"><span id="q4c"></span></label>
                <!-- <strong id="hint4"></strong> -->
                <button class="send">送出</button>
            </div>
    </div>

    <div class="qaAll">
        <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
        <div class="qa">
                <p>(5).<span id="question5"></span></p>
                <label for="q5-a"><input type="radio" name="q5" id="q5-a" class="option5"><span id="q5a"></span></label>
                <label for="q5-b"><input type="radio" name="q5" id="q5-b" class="option5"><span id="q5b"></span></label>
                <label for="q5-c"><input type="radio" name="q5" id="q5-c" class="option5"><span id="q5c"></span></label>
                <label for="q5-d"><input type="radio" name="q5" id="q5-d" class="option5"><span id="q5d"></span></label>
                <!-- <strong id="hint5"></strong> -->
                <button class="send">送出</button>
            </div>
    </div>
    <div class="qaAll">
        <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
        <div class="qa">
                <p>(6).<span id="question6"></span></p>
                <label for="q6-a"><input type="radio" name="q6" id="q6-a" class="option6"><span id="q6a"></span></label>
                <label for="q6-b"><input type="radio" name="q6" id="q6-b" class="option6"><span id="q6b"></span></label>
                <label for="q6-c"><input type="radio" name="q6" id="q6-c" class="option6"><span id="q6c"></span></label>
                <label for="q6-d"><input type="radio" name="q6" id="q6-d" class="option6"><span id="q6d"></span></label>
                <!-- <strong id="hint6"></strong> -->
                <button class="send">送出</button>
            </div>
    </div>

    <div class="qaAll">
        <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
        <div class="qa">
                <p>(7).<span id="question7"></span></p>
                <label for="q7-a"><input type="radio" name="q7" id="q7-a" class="option7"><span id="q7a"></span></label>
                <label for="q7-b"><input type="radio" name="q7" id="q7-b" class="option7"><span id="q7b"></span></label>
                <label for="q7-c"><input type="radio" name="q7" id="q7-c" class="option7"><span id="q7c"></span></label>
                <label for="q7-d"><input type="radio" name="q7" id="q7-d" class="option7"><span id="q7d"></span></label>
                <!-- <strong id="hint6"></strong> -->
                <button class="send">送出</button>
            </div>
    </div>

    <div class="qaAll">
        <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
        <div class="qa">
                <p>(8).<span id="question8"></span></p>
                <label for="q8-a"><input type="radio" name="q8" id="q8-a" class="option8"><span id="q8a"></span></label>
                <label for="q8-b"><input type="radio" name="q8" id="q8-b" class="option8"><span id="q8b"></span></label>
                <label for="q8-c"><input type="radio" name="q8" id="q8-c" class="option8"><span id="q8c"></span></label>
                <label for="q8-d"><input type="radio" name="q8" id="q8-d" class="option8"><span id="q8d"></span></label>
                <!-- <strong id="hint6"></strong> -->
                <button class="send">送出</button>
            </div>
    </div>

    <div class="qaAll">
        <h1 class="error">答錯了!再答一次!<br><i class="fas fa-times-circle"></i></h1>
        <div class="qa">
                <p>(9).<span id="question9"></span></p>
                <label for="q9-a"><input type="radio" name="q9" id="q9-a" class="option9"><span id="q9a"></span></label>
                <label for="q9-b"><input type="radio" name="q9" id="q9-b" class="option9"><span id="q9b"></span></label>
                <label for="q9-c"><input type="radio" name="q9" id="q9-c" class="option9"><span id="q9c"></span></label>
                <label for="q9-d"><input type="radio" name="q9" id="q9-d" class="option9"><span id="q9d"></span></label>
                <!-- <strong id="hint6"></strong> -->
                <button class="send">送出</button>
            </div>
    </div>
   

    
    <div class="bingo">
        <strong id="hint1"></strong>
        <h1>答對了!點擊繼續</h1>
    </div>
    <div class="bingo">
        <strong id="hint2"></strong>
        <h1>答對了!點擊繼續</h1>
    </div>
    <div class="bingo">
        <strong id="hint3"></strong>
        <h1>答對了!點擊繼續</h1>
    </div>
    <div class="bingo">
        <strong id="hint4"></strong>
        <h1>答對了!點擊繼續</h1>
    </div>
    <div class="bingo">
        <strong id="hint5"></strong>
        <h1>答對了!點擊繼續</h1>
    </div>
    <div class="bingo">
        <strong id="hint6"></strong>
        <h1>答對了!點擊繼續</h1>
    </div>
    <div class="bingo">
        <strong id="hint7"></strong>
        <h1>答對了!點擊繼續</h1>
    </div>
    <div class="bingo">
        <strong id="hint8"></strong>
        <h1>答對了!點擊繼續</h1>
    </div>
   
    <form class="bingo" action="./input.php" method="post"> 
        <strong id="hint9"></strong>
        <h1>闖關成功!點擊繼續</h1>
        <input type="hidden" name="hidden" value="correct">
        <input type="hidden" name="type" value="<?php echo $type; ?>">
        <input type="submit">
    </form>

    <div class="loading">
        <div class="loader"></div>
    </div>

    <div id="pass">
        <h1>闖關成功</h1>
        <h1 id="second">0</h1>
        <!-- <img src="images/LOGO.png"> -->
        <p>本活動為衛生保健組宣導各式健康促進議題</p>
        <p>結合時事以平易近人、生活化方式作為傳遞</p>
        <p>感謝您的參加</p>
        <p>請截圖完成畫面+學生證/教職員證</p> 
        <p>至活動現場兌換神秘小禮物 1 份</p> 
        <p>1人1份，名額有限，送完為止</p> 
        <p>衛生保健組 關心您</p> 
        
    </div>


    <style>
        .loading{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, .2);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999999999999999999999;
            display: none;
        }
        .loader{
            height: 50px;
            width:50px;
            border:10px solid #63666b;
            border-top-color:#2a88e6;
            position:absolute;
            margin:auto;
            top: 0;
            bottom:0;
            left:0;
            right:0;
            border-radius: 50%;
            animation:spin 1.5s infinite linear;
        }
        @keyframes spin{
            0%{
                transform: rotate(0deg);
            }
            100%{
                transform: rotate(360deg);
            }
        }
    </style>
    
    <script src="./js/<?php echo $scripturl; ?>"></script>
    <script src="./js/<?php echo $questionurl; ?>"></script>
    <script src="./js/randomBtn.js"></script>
</body>
</body>
</html>

<?php }else{echo "錯誤!";} ?>