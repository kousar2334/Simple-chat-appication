<?php
//session_start();
include_once '../src/user/User.php';
$obj=new User();

$data=$obj->index();
    
if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
//  include_once '../src/user/User.php';
    

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
        <title>Home page -<?php echo $_SESSION['user']['first_name']."?id".$_SESSION['user']['unique_id']?></title>
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
            
            .logo{
                width:120px;
                height:70px;
                float: left;
                margin-top: 0px;
                padding: 0px;
                margin: 0px;
            }
            #left_side{
                width: 250px;
                height: 530px;
                float: left;
                background-color:whitesmoke;
                margin-top: 2px;
            }
            .user_box{
                float: right;
                margin-right: 50px;
                margin-top: 7px;
                padding: 0px;
                border: 0px;
            }
            #user_dialouge_box{
                width: 350px;
                height: 180px;
                float:left;
                margin-left:945px;
                margin-top: 65px;
                background-color: whitesmoke;
                border-color: buttonface;
                box-shadow: 0px 3px 3px grey;
                
                display: none;
                position: absolute;
                
                
            }
            .avatar{
                width: 38%;
                height: 75%;
                float: left;
                background-color: white;
                
            }
            .user_information{
                float: left;
                width: 62%;
                height: 75%;
                background-color: white;
            }
            .user_dialouge_box_bottom{
                width: 100%;
                float: left;
                height: 25%;
                background-color: whitesmoke;
            }
            .logout_bt{
                float: right;
                display: block;
                margin-right: 10%;
                padding: 5px;
                text-decoration: none;
                color: gray;
                background-color: whitesmoke;
                border: 1px solid gray;
                border-radius: 3px;
                font-size: 15px;
                width: 20%;
                text-align: center;
                margin-top: 2%;
            }
            .logout_bt:hover{
                background-color: red;
                color: white;
                border:0px;
            }
            .my_ac_bt{
                display: block;
                padding: 5px;
                background-color: #c61933;
                text-decoration: none;
                color: white;
                width: 50%;
                border-radius: 3px;
                text-align: center;
            }
            .user_icon{
                width: 40px;
                height: 40px;
                padding: 0px;
                margin: 0px;
                margin-top: 15px;
                border-radius:50%;
            }
            .compose_bt{
                display: block;
                margin-top: 20px;
                margin-left: 30%;
                float: left;
                width: 100px;
                cursor:pointer;
                background-color: white;
                color: gray;
                font-size: 15px;
                text-align: center;
                border: 1px solid gray;
                border-radius: 3px;
                padding-left: 10px;
                
            }
            #compose_page{
                width: 450px;
                height: 500px;
                float: left;
                display: none;
                margin-top: 32px;
                margin-left: 900px;
               
                overflow: auto;
                position: absolute;
                z-index: 1;
                background-color: #edeeef;
                box-shadow: 0px 0px 3px grey;
                
            }
            #compose_page_header{
                width: 99.5%;
                height: 7%;
                background-color: #5d5f60;
                border: 1px solid #5d5f60;
                opacity: 1;
            }
            .close {
            position: absolute;
            right: 15px;
            top: 0;
            color:white;
            font-size: 30px;
            font-weight: bold;
            cursor: pointer;
          
           }
           input{
               width: 95.5%;
               font-size: 15px;
               height: 10%;
               border: 0px;
               padding: 10px;
               background-color: white;
               border-bottom: 1px solid #c2c4c6;
           }
           .send_bt{
               width:19%;
               display: block;
               background-color: #66a3ff;
               color: white;
               border-radius: 3px;
               text-align: center;
               height:5%;
               margin-left: 3%;
               margin-top: 2%;
               padding: 5px;
               font-weight: bold;
               font-size: 13px;
           }
           #frind_list_box{
                width: 200px;
                height: 453px;
                float:right;
                overflow: auto;
                margin-bottom: 0px;
                z-index: 1;
                margin-top: 6%;
                background-color:white;
                border-left: 1px solid whitesmoke;
                
                
            }
            
            .friend_bt{
                
                
                float: left;
                width: 100%;
                cursor:pointer;
                background-color: white;
                color: black;
                font-size: 15px;
                text-align: justify;
              
                border:0px;
                padding-left: 10px;
                
            }
            iframe{
                width: 280px;
                height: 350px;
                float: left;
                position: fixed;
                margin-left: 46%;
                margin-top: 13%;
                padding: 0px;
                border:0px;
                background-color:white;
            }
        </style>
    </head>
    <body id="main_body" class="modal">
        <div id="header">
            <img src="../logo.png" alt="logo" class="logo">
            <button class="user_box" onclick="document.getElementById('user_dialouge_box').style.display='block'" style="width:auto;"><img src="<?php echo"../images/.".$_SESSION['user']['image']?>" class="user_icon"></button>
            <div id="user_dialouge_box" class="modal">
                <div class="avatar">
                    <img src="<?php echo"../images/.".$_SESSION['user']['image']?>" alt="avatar" style="width:80%;height: 80%;margin-left: 10%;margin-top: 10%;border-radius:50%;">
                </div>
                <div class="user_information">
                            <p style="font-size:20px;line-height: 0px;margin-top: 20%"><b>
                        <?php
                        if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
                            echo $_SESSION['user']['first_name']." ". $_SESSION['user']['last_name'];
                        }
                        ?>
                        </b></p>
                        <p style="font-size:15px;line-height: 5px">
                          <?php
                        if(isset($_SESSION['user'])&&!empty($_SESSION['user'])){
                            echo $_SESSION['user']['email'];
                        }
                        ?>
                        </p>
                        <a href="profile.php?unique_id=<?php echo $_SESSION['user']['unique_id'];?>" class="my_ac_bt">My Account</a>
                </div>
                <a href="logout.php"class="logout_bt">Log Out</a>
            </div>
        </div>
        <div id="left_side">
            <button class="compose_bt" onclick="document.getElementById('compose_page').style.display='block'">Compose</button>
        </div>
        <div id="compose_page" class="compose_page">
            <div id="compose_page_header">
                <span onclick="document.getElementById('compose_page').style.display='none'" class="close" title="Close">&times;</span>
                <p style="color: white;margin-left: 8px;margin-top: 5px;">New Message</p> 
               
           </div>
            <form action="../mail/sendmail.php" method="POST">
                <input type="email" name="to" placeholder="To">
                <input type="text" name="subject" placeholder="Subject">
                <textarea name="message" style="height:332px;font-size: 15px;text-align: justify;width: 99.5%;border:0px;"></textarea>
                
                <input type="submit" value="Send" class="send_bt">
            </form>
        </div>
        <div id="frind_list_box">
          <h5 style="margin-top: 0px;width: 97%;display: block;background-color:#c61933;padding: 3px;color: white;">Friend List</h5>
          
          <?php
          foreach($data as $singledata){
          ?>
          <a href="msg_box.php?unique_id=<?php echo$singledata['unique_id'];?>" target="docView"><?php echo $singledata['first_name']." ".$singledata['last_name']?></a><br>
          
          <?php
          }
          ?>
               
        </div>
        <iframe src="#" name="docView" ></iframe>
        <script>
// Get the modal
         var modal = document.getElementById('user_dialouge_box');
         
// When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target === modal) {
        modal.style.display = "none";
       }
       };
       var compose_page = document.getElementById('compose_page');


         </script>
         
    </body>
</html>
<?php
        
}
 else {
    echo "Opps!Some this worng";    
}
?>