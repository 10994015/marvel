<?php 
if(isset($_GET['msg']) && $_GET['msg']==1){
    echo "<script>alert('登入失敗!')</script>";
}
?>
<!DOCTYPE html>
<html lang="zh-Hant-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes, minimum-scale=1.0, maximum-scale=3.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding: 0;
        }
        body{
            background-color: #212121;
            color:#fff;
        }
        a{
            text-decoration: none;
        }
            .login {
            width: 100%;
            height: 100vh;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
                -ms-flex-pack: center;
                    justify-content: center;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                -ms-flex-direction: column;
                    flex-direction: column;
            }

            .login > h1 {
            margin-bottom: 20px;
            font-size: 50px;
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
            border-bottom: 5px #fff solid;
            }

            .login > form {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
                -ms-flex-direction: column;
                    flex-direction: column;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
            width: 350px;
            }

            .login > form > p {
            -ms-flex-item-align: start;
                align-self: flex-start;
            color: #bbb;
            margin-bottom: 10px;
            }

            .login > form > input {
            width: 100%;
            height: 40px;
            border: 1px #aaa solid;
            background-color: #121212;
            outline: none;
            margin: 8px 0;
            padding: 0 5px;
            color: #fff;
            font-size: 16px;
            }

            .login > form > .link {
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
                -ms-flex-align: center;
                    align-items: center;
            -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                    justify-content: space-between;
            padding: 10px 0;
            }

            .login > form > .link > .registerlink {
            color: #fff;
            font-weight: 600;
            }

            .login > form > .link > #forgettext {
            color: #aaa;
            }

            .login > form > .submit-btn {
            color: #121212;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            background-color: #fff;
            height: 50px;
            }
    </style>
</head>
<body>
<div class="content">
        <div class="login">
            <h1>LOGIN</h1>
            <form action="./member_check.php" method="POST">
                <p>登入您的後台帳號</p>
                <input type="text" name="username" class="mem_mail" placeholder="請輸入帳號...." required/>
                <input type="password" name="pwd" class="mem_pwd" placeholder="請輸入密碼...." required/>
                <input type="submit" class="submit-btn" value="登入" />
            </form>
        </div>
        
    </div>
</body>
</html>