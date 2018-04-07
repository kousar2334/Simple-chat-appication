<?php
include_once '../../src/user/User.php';
$oj=new User();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $oj->prepare($_POST);
    $oj->insert_data();
    
}
 else {
    $_SESSION['err_msg']="opps! You can not access this page";
    header('location:error_page.php');
    
}

?>


