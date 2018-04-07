<?php
include_once '../src/user/User.php';
$obj=new User();
//$obj->prepare($_GET);
//$data=$obj->view();
$messages=$obj->get_msg();
echo"<pre>";
print_r($messages);