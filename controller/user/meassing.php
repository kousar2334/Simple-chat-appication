<?php

include_once '../../src/user/User.php';
$obj=new User();
$obj->prepare($_POST);
$obj->send_msg();
header('location:../../view/msg_box.php');