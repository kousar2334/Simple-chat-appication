<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">

          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign in |flash</title>
        <style>
            #main_body{
                margin: 0px;
                border: 0px;
                padding: 0px;
                background-color: white;
                height: 100%;
            }
            
            .logo{
                width:400px;
                height:100px;
                float: left;
                margin-left: 50px;
                margin-top: 0px;
                padding: 0px;
                margin: 0px;
            }
            #signin_box{
                width: 400px;
                height: 350px;
                float: left;
                margin-top: 20px;
                margin-left: 480px;
                background-color: whitesmoke;
                border-color: buttonface;
                box-shadow: 0px 3px 3px grey;
                
            }
            input{
                width: 70%;
                float: left;
                margin-left: 15%;
                margin-top: 20px;
                padding: 7px;
                font-size: 18px;
                color: grey;
                
            }
            .signin_bt{
                display: block;
                color: white;
                background-color:#4286f4;
               border-radius:3px;
               font-family: monospace;
               border: 0px;
               cursor: pointer;
            }
            .forgot_paw{
                float: right;
                margin-right: 10%;
                font-family: monospace;
                text-decoration: none;
                margin-top: 5px;
                color: #4286f4;
            }
            .user_icon{
                width: 120px;
                height: 120px;
                margin-top: 25px;
                margin-left: 140px;
                border-radius: 120px;
            }
            .create_ac{
                float: left;
                text-decoration: none;
                margin-left: 650px;
                margin-top: 30px;
                color: #4286f4;
            }
        </style>
    </head>
    <body id="main_body">
        <img src="../logo.png" alt="logo" style="width:200px; height: 90px; float: left;margin-left: 550px; margin-top: 20px"><br>
        <?php
            if(isset($_SESSION['invalid_login'])&&!empty($_SESSION['invalid_login'])){
                echo $_SESSION['invalid_login'];
                unset($_SESSION['invalid_login']);
            }
            
            ?>
            
            <?php
            if(isset($_SESSION['registermsg'])&&!empty($_SESSION['registermsg'])){
                echo $_SESSION['registermsg'];
                unset($_SESSION['registermsg']);
            }
            ?>
        <div id="signin_box">
            <img src="../user-icon.jpg" alt="user photo" class="user_icon">
            <?php
            if(isset($_SESSION['password_email_null'])&&!empty($_SESSION['password_email_null'])){
                echo $_SESSION['password_email_null'];
                unset($_SESSION['password_email_null']);
            }
            
            ?>
            
            <form action="../controller/user/login.php" method="POST">
            <?php
            if(isset($_SESSION['email_null'])&&!empty($_SESSION['email_null'])){
                echo $_SESSION['email_null'];
                unset($_SESSION['email_null']);
            }
            
            ?>
                <input type="test" name="email" placeholder="Enter your email" >
             <?php
            if(isset($_SESSION['password_null'])&&!empty($_SESSION['password_null'])){
                echo $_SESSION['password_null'];
                unset($_SESSION['password_null']);
            }
            
            ?>
                <input type="password" name="password" placeholder="Enter your password">
                <input type="submit" value="Sign in" class="signin_bt">
            </form>
            <a href="#" class="forgot_paw">Forgot password?</a>
        </div>
        <a href="create_ac.php" class="create_ac">Create account</a>
    </body>
</html>

