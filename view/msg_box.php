<?php

include_once '../src/user/User.php';
$obj=new User();
$obj->prepare($_GET);
$data=$obj->view();
$messages=$obj->get_msg();
?>
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .close {
            position: absolute;
            right: 15px;
            top: 0;
            color:white;
            font-size:20px;
            font-weight: bold;
            cursor: pointer;
          
           }
           #message_box_header{
               width: 95%;
               height:8.8%;
               border:0px;
               position: fixed;
               background-color:#c61933;
           }
           #message_box{
               width: 100%;
               border-left: 1px solid gray;
               border-right: 1px solid gray;
               background-color: yellow;
               padding: 0px;
               
           }
           #show_msg{
               width: 95%;
               height:255px;
               position: fixed;
               overflow: scroll;
               margin-top:30px;
               
               background-color:white;
           }
           .message{
               float: right;
               width: 95%;
               position: fixed;
               float: left;
               height: 40px;
               margin-top:96%;
               z-index: 1;
               border: 0px;
           }
           .msg_sent_bt{
               float: left;
               width: 95%;
               position: fixed;
               margin-top:110%;
               height: 35px;
               background-color: white;
               
           }
        </style> 
    </head>
    <body>
       <div id="message_box" class="message_box">
            <div id="message_box_header">
                <p style="margin-top:3px;margin-left: 5px;color: white"><?php echo $data['first_name']." ".$data['last_name'];?></p>
                <span onclick="document.getElementById('message_box').style.display='none'" class="close" title="Close">&times;</span>
                
                
               </div>
           <div id="show_msg">
               <?php
               foreach ($messages as $message){?>
               <p style="color:blue;font-size: 15px;"><?php echo $message['sender'] ?></p>    
               <p style="font-size:12px;line-height: 0px;"><?php echo $message['message'] ?></p>
                <?php
               }
               ?>
           </div>
                <form action="../controller/user/meassing.php" method="POST">
                    
                    <input type="hidden" name="sender" value="<?php echo $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']?>"style="width: 90%;height: 20px;padding: 0px;">
                    <textarea class="message" name="message"placeholder="write message...."></textarea>
                    
                    <input type="submit" name="send"class="msg_sent_bt" value="Send" >
                    
                    
                </form>
          
        </div> 
    </body>
    
</html>

