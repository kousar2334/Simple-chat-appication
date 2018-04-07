<?php
include_once '../../src/user/User.php';
$obj=new User();

$error=array();
$image_name= time().$_FILES['image']['name'];
$image_type=$_FILES['image']['type'];
$image_tmp_location=$_FILES['image']['tmp_name'];
$image_size=$_FILES['image']['size'];

$my_image_extention= strtolower(end(explode('.', $image_name)));
$required_format= array('jpg','png');
if(in_array($my_image_extention, $required_format)){
   
    
}
 else {
    $error="Invalid image format";
     }  
    if($image_size>5735800){
        $error="Image size too large";
    }
   if(empty($error)){
       move_uploaded_file($image_tmp_location, "../../images/.$image_name");
       $_POST['image']=$image_name;
       $obj->prepare($_POST)->profile_update();
   }