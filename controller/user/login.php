<?php
include_once '../../src/user/User.php';
$obj=new User();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $obj->prepare($_POST);
    $obj->login();
    
}
 else {
    echo 'opps! some thing wrong';    
}
?>

