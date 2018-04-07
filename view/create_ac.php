<?php

session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
       
           <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>flash</title>
        <style>
            #main_body{
                margin: 0px;
                border: 0px;
                padding: 0px;
                background-color:white;
                height: 100%;
            }
            #header{
                margin: 0px;
                border: 0px;
                padding: 0px;
                width: 100%;
                height:70px;
                background-color: whitesmoke;
            }
            .signin_bt{
               padding-left:16px;
               padding-right: 16px;
               padding-top: 5px;
               padding-bottom: 5px;
               float: right;
               margin-right: 80px;
               margin-top: 20px;
               text-decoration:none;
               color: white;
               display: block;
               background-color:#4286f4;
               border-radius:3px;
               font-family: monospace;
               font-size:18px;
             
            }
            .logo{
                width:120px;
                height:70px;
                float: left;
                margin-left: 100px;
                margin-top: 0px;
                padding: 0px;
                margin: 0px;
            }
            #create_ac_box{
                width: 380px;
                height: 700px;
                float: right;
                margin-right:200px;
                background-color: whitesmoke;
            }
            input{
                width: 80%;
                
                margin-left: 10%;
                margin-top: 5px;
                padding: 5px;
            }
            lebel{
                width: 90%;
                margin-left:10%;
                float: left;
                margin-top: 20px;
            }
            .submit_bt{
                display: block;
                background-color:#4286f4;
                border: 0px;
                border-radius: 2px;
                margin-top: 20px;
                color: white;
                padding: 7px;
                cursor: pointer;
                float: left;
            }
            .error{
                color:red; 
                float: right;
                margin-top: 0px;
                line-height: 2px;
                position: absolute;
            }
        </style>
    </head>
    <body id="main_body">
        <div id="header">
            <img src="../logo.png" alt="logo" class="logo">
            <a class="signin_bt" href="signin.php">Sign in</a>
        </div>
        <p style="font-size: 45px;float: left;margin-left: 350px;margin-top: 20px;font-family:Arial Unicode MS;color: gray">Create your Flash Account</p>
        <div id="create_ac_box">
            <form action="../controller/user/create_ac.php" method="POSt">
                <lebel>Name<?php 
            if(isset($_SESSION['fist_name_error'])&& !empty($_SESSION['fist_name_error'])){
                echo "<p class='error'>".$_SESSION['fist_name_error']."</p>";
                unset($_SESSION['fist_name_error']);
            }
            ?></lebel><br>
            
            <input type="text" name="first_name"  placeholder="First" style="width:39%;">
            <input type="text" name="last_name" placeholder="Last" style="width: 39%;margin-left:2%">
            <lebel>Chose your account<?php 
            if(isset($_SESSION['email_error'])&& !empty($_SESSION['email_error'])){
                echo "<p class='error'>".$_SESSION['email_error']."</p>";
                unset($_SESSION['email_error']);
            }
            ?>
            
            </lebel>
            <input type="email" placeholder="                                                        @flash.com" name="email" >
            <lebel>Create a password 
            <?php 
            if(isset($_SESSION['password_error'])&& !empty($_SESSION['password_error'])){
                echo "<p class='error'>".$_SESSION['password_error']."</p>";
                unset($_SESSION['password_error']);
            }
            ?>
            </lebel>
            <input type="password" name="password" >
            <lebel>Confirm your password </lebel>
            <input type="password" name="con_password">
            <lebel>Birthday </lebel>
            <select name="month" style="padding:5px; margin-left: 10%;margin-top: 5px;width: 20%;">
               
                <option>January</option>
                 <option>February</option>
                 <option>March</option>
                 <option>April</option>
                 <option>May</option>
                 <option>June</option>
                 <option>July</option>
            </select>
            
            <input type="text"  name="day" placeholder="Day" style="width: 20%">
            <input type="text"  name="year" placeholder="Year" style="width: 20%">
            <lebel>Gender</lebel>
            <input type="text" name="gender">
            <lebel> Mobile phone</lebel>
            <input type="text" name="mobile_phone"  placeholder="+880">
            <lebel> Location</lebel>
            <select name="location" style="padding:5px; margin-left: 10%;margin-top: 5px;width: 80%">
               
                <option>Bangladesh</option>
                 <option>India</option>
                 <option>Pakistan</option>
                 <option>Dubai</option>
            </select><br>
            <input type="checkbox" required="" style="width:5%;float: left;margin-top: 15px;"><a href="#" style="text-decoration:none;float: left;width: 70%;margin-top:10px; color:#4286f4">I agree with terms & condition</a>
            <input type="submit" value="Submit " class="submit_bt">
            </form>    
        </div>
    </body>
</html>
