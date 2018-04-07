<?php
include_once '../src/user/User.php';
$obj=new User();

if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
$obj->prepare($_GET);
$data=$obj->view(); 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Profile-<?php echo $_SESSION['user']['first_name']?></title>
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
            .logout_bt{
               padding-left:16px;
               padding-right: 16px;
               padding-top: 5px;
               padding-bottom: 5px;
               float: right;
               margin-right: 80px;
               margin-top: 20px;
               text-decoration:none;
               color: gray;
               display: block;
               
               border-radius:3px;
               font-family: monospace;
               font-size:18px;
             
            }
            .logout_bt:hover{
                background-color: red;
                color: white;
            }
            .logo{
                width:120px;
                height:70px;
                float: left;
                margin-top: 0px;
                padding: 0px;
                margin: 0px;
            }
            #left_side_box{
                float: left;
                width: 16%;
                height: 700px;
                border-right:1px solid whitesmoke;
                
            }
            #view_box{
                float: left;
                width: 83%;
                height:auto;
                
            }
            h1{
                margin-left: 50px;
            }
            h3{
                margin-left: 50px;
            }
            .edit_bt{
                float: left;
                color: gray;
                border:1px solid gray;
                display: block;
                padding: 3px;
                width: 100px;
                text-decoration: none;
                text-align: center;
                border-radius: 5px;
                margin-left: 50px;
                
            }
            .edit_bt:hover{
                background-color: #4286f4;
                color:white;
                border:0px;
            }
            label{
                text-align: justify;
                font-size: 17px;
            }
            input{
              font-size: 15px;  
              color: grey;
            }
            #footer{
                width: 100%;
                height: 200px;
                background-color: gainsboro;
            }
            .profile_upd_bt{
                display: block;
                background-color:#4286f4;
                border: 0px;
                border-radius: 2px;
                color: white;
                padding: 7px;
                width: 15%;
                font-size: 16px;
                cursor: pointer;
                float: right;
                margin-right: 12%;
            }
        </style>
    </head>
    <body id="main_body">
        <div id="header">
            <img src="../logo.png" alt="logo" class="logo">
            <a class="logout_bt" href="logout.php">Log Out</a>
        </div>
        <div id="left_side_box">
            
        </div>
        <div id="view_box">
            <form action="../controller/user/profile_update.php" method="POST" enctype="multipart/form-data" role="form">
                <img src="<?php echo"../images/.".$data['image']?>" style="width: 100px;height: 100px;margin-top: 10px;">
                <input type="file" name="image"><br><br>
                <h2 style="width: 100%;border-bottom: 1px solid gray">About Me</h2>
                <label>First name: </label>
                <input type="text" name="first_name" style="margin-left:100px;width: 19%;"value="<?php echo $data['first_name']?>"><br><br>
                <label>Last name: </label>
                <input type="text" name="last_name" style="margin-left:100px;width: 19%;"value="<?php echo $data['last_name']?>"><br><br>
                <label>Email: </label>
                <input type="email" name="email" style="margin-left:129px;width: 19%;"value="<?php echo $data['email']?>"> <br><br>
                
                <label>Change Password</label>
                <input type="password" style="margin-left:50px;width: 19%;"name="password" ><br><br>
               <label>Confirm Password</label>
                <input type="password"style="margin-left:45px;width: 19%;" name="con_password"><br><br>
                <label>Birth Day</label>
                <select name="month" style="padding:5px; margin-left: 9.2%;margin-top: 5px;width:8%;" >
               
                 <option>January</option>
                 <option>February</option>
                 <option>March</option>
                 <option>April</option>
                 <option>May</option>
                 <option>June</option>
                 <option>July</option>
                </select>
            
            <input type="text"  name="day" placeholder="Day"value="<?php echo $data['day']?>" style="width: 5%">
            <input type="text"  name="year" placeholder="Year" value="<?php echo $data['year']?>"style="width: 5%"><br><br>
            <label>Gender</label>
            <select name="gender" style="padding:5px; margin-left: 10.6%;margin-top: 5px;width:10%">
               
                <option>Male</option>
                 <option>Female</option>
                 
            </select><br><br>
            
            <label>Mobile Phone</label>
            <input type="text" style="margin-left:70px;width: 19%;"name="mobile_phone" value="<?php echo $data['mobile_phone']?>" placeholder="+880"><br><br>
            <label>Location</label>
            <select name="location" style="padding:5px; margin-left: 9.2%;margin-top: 5px;width: 15%">
               
                <option>Bangladesh</option>
                 <option>India</option>
                 <option>Pakistan</option>
                 <option>Dubai</option>
            </select><br><br>
            <h2 style="width: 100%;border-bottom: 1px solid gray">Education</h2>
            <label>School: </label>
                <input type="text" name="school"style="margin-left:9%;width: 25%;" value="<?php echo $data['school']?>"><br><br>
                <label>Collage: </label>
                <input type="text" name="collage"style="margin-left:8.6%;width: 25%;" value="<?php echo $data['collage']?>"><br><br>
                <label>Graduation: </label>
                <input type="text" name="graduation"style="margin-left:6.3%;width: 25%;" value="<?php echo $data['graduation']?>"> <br><br>
            <h2 style="width: 100%;border-bottom: 1px solid gray">Working Place</h2>
            <label>Name of Institution </label>
                <input type="text" name="company"style="margin-left:1%;width: 25%;" value="<?php echo $data['company']?>"><br><br>
                   
            <input type="hidden" name="unique_id" value="<?php echo $data['unique_id']?>"><br><br>
            <input type="submit" value="Update Profile"class="profile_upd_bt">
                
            </form>
        </div>
        <p>Footer</p>
    </body>
</html>
<?php
        
}
 else {
    echo "Opps!Some this worng";    
}
?>
