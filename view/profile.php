<?php
//session_start();
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
                height: 700px;
                
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
            .logout_bt:hover{
                background-color: red;
                color: white;
            }
        </style>
    </head>
    <body id="main_body">
        <div id="header">
            <img src="../logo.png" alt="logo" class="logo">
            <a class="logout_bt" href="logout.php">Log Out</a>
        </div>
        <div id="left_side_box">
            <img src="<?php echo "../images/.".$data['image']?>" alt="photo" style="width:130px;height: 130px; margin-left: 40px;margin-top: 10px;">
            
            <a class="edit_bt" href="edit_profile.php?unique_id=<?php echo $data['unique_id'];?>">Edit profile</a>   
        </div>
        <div id="view_box">
            <h1><?php echo strtoupper($data['first_name']." ".$data['last_name']);?></h1>
            <?php if(!empty($data['email'])){
                echo"<h3>"."Email : ".$data['email']."</h3>";
                }?>
            <?php if(!empty($data['company'])){
                echo"<h3>"."Working Place : ".$data['company']."</h3>";
                }?>
            <?php if(!empty($data['mobile_phone'])){
                echo"<h3>"."Mobile  : ".$data['mobile_phone']."</h3>";
                }?>
            
          </div>
    </body>
</html>
<?php
        
}
 else {
    echo "Opps!Some this worng";    
}
?>

