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
    <style>
        *{
            margin:0;
            padding:0;
        }
        .form{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background: url("./images2/bg.jpg") no-repeat;
            background-size: cover;
            box-sizing: border-box;
            padding: 10px;

        }
        form{
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        form>input{
            margin: 15px 0;
            width: 100%;
            height: 50px;
            border:none;
            outline: none;
            border:1px #ccc solid;
            border-radius: 10px;
            padding: 0 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        form>input[type="submit"]{
            width: 100%;
            background-color: #ccc;
            color:#fff;
            font-weight: 600;
            font-size: 18px;
        }
        .view{
            display: flex;
            flex-direction: column;
        }
        .Satisfaction{
            background-color: #fff;
            padding: 5px;
            border-radius: 10px;
            box-sizing: border-box;
            width: 100%;
            height: 100px;
            display: flex;
            justify-content: center;
            flex-direction: column;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif,"微軟正黑體";
            margin-bottom: 20px;
        }
        .Satisfaction>select{
            width: 90%;
            margin: auto;
            height: 40px;
            border:none;
            outline: none;
            border:1px #333 solid;
            border-radius: 5px;
        }
    
    </style>
</head>
<body>
   <div class="form">
        <form action="add.php"" method="post">
            <input type="text" placeholder="請輸入學號" name="student" min="8" max="8" id="student" required>
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
            </div>
            <input type="hidden" name="inputData" value="insert">
            <input type="hidden" name="type" value="<?php echo $type; ?>">
            <input type="submit" value="完成" id="finish" disabled>
        </form>   
   </div>
    <script>
      const student = document.getElementById('student');
      const finish = document.getElementById('finish');
      const name = document.getElementById('name');
      student.addEventListener("change",()=>{
          console.log("okok");
          
        if(student!==" " && name!==" "){
            finish.disabled  =false;
            finish.style.background = "#BF3434";
            
        }
      });
      name.addEventListener("change",()=>{
        if(student!==" " && name!==" "){
            finish.disabled  =false;
            finish.style.background = "#BF3434";

        }
      });
      
      
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
