<?php


class User {
    public $id='';
    public $first_name='';
    public $last_name='';
    public $email='';
    public $password='';
    public $mobile_phone='';
    public $month='';
    public $day='';
    public $year='';
    public $gender='';
    public $location='';
    public $image='';
    public $data='';
    public $unique_id='';
    public $school='';
    public $collage='';
    public $graduation='';
    public $company='';
    public $sender='';
    public $message='';
    public function __construct() {
        session_start();
        mysql_connect("localhost","root","") or die("Server not found");
        mysql_select_db('flash_server') or die("database not fount");
    }
    public function prepare($data=''){
        
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('first_name', $data)&& !empty($data['first_name'])){
            $this->first_name=$data['first_name'];
        }
      else {
          
          $_SESSION['fist_name_error']="*Required this field";
      }
        if (array_key_exists('last_name', $data)){
            $this->last_name=$data['last_name'];
        }
        if(array_key_exists('email', $data)&&!empty($data['email'])){
            $this->email=$data['email'];
        }
       else {
        $_SESSION['email_error']="*required this field";
       }
        if(array_key_exists('password', $data)&&!empty($data['password'])){
            $this->password=$data['password'];
        }
        else {
            $_SESSION['password_error']="*required this field";
        }
        if(array_key_exists('month', $data)){
            $this->month=$data['month'];
        }
        if(array_key_exists('day', $data)){
            $this->day=$data['day'];
        }
        if(array_key_exists('year', $data)){
            $this->year=$data['year'];
        }
        if(array_key_exists('gender', $data)){
            $this->gender=$data['gender'];
        }
        if(array_key_exists('mobile_phone', $data)){
            $this->mobile_phone=$data['mobile_phone'];
        }
        if(array_key_exists('image', $data)){
            $this->image=$data['image'];
        }
        if(array_key_exists('location', $data)){
            $this->location=$data['location'];
        }
        if(array_key_exists('school', $data)){
            $this->school=$data['school'];
        }
        if(array_key_exists('collage', $data)){
            $this->collage=$data['collage'];
        }
        if(array_key_exists('graduation', $data)){
            $this->graduation=$data['graduation'];
        }
        if(array_key_exists('company', $data)){
            $this->company=$data['company'];
        }
        if(!empty($data['unique_id'])){
            $this->unique_id=$data['unique_id'];
        }
        if(!empty($data['sender'])){
            $this->sender=$data['sender'];
        }
        if(!empty($data['message'])){
            $this->message=$data['message'];
        }
        return $this;
    }
    
    public function insert_data(){
       
        if(!empty($this->first_name) && !empty($this->email)&& !empty($this->password)){
        $query="INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `month`, `day`, `year`, `gender`, `mobile_phone`, `location`, `unique_id`) VALUES (NULL, '$this->first_name', '$this->last_name', '$this->email', '$this->password', '$this->month', '$this->day', '$this->year', '$this->gender', '$this->mobile_phone', '$this->location','".uniqid()."')";
        if(mysql_query($query)){
          $_SESSION['registermsg']="Your registration id successfull, You may sign in";
          header('location:../../view/signin.php');
        }
        }
    else {
        header('location:../../view/create_ac.php');
    }
       
    }
    
    public function index(){
       $query="SELECT * FROM `user`";
        $result=mysql_query($query);
        while ($row=mysql_fetch_assoc($result)){
            $this->data[]=$row;
        }
        return $this->data;
    }

    public function view(){
        $query = "SELECT * FROM `user` WHERE unique_id=" ."'". $this->unique_id."'";
        $mydata = mysql_query($query);
        $row = mysql_fetch_assoc($mydata);
        return $row;
    }

    public function login()
    {
        if(!empty($this->email)&& !empty($this->password)){
            
           $query="SELECT * FROM `user` WHERE email='$this->email'&& password='$this->password'";
                $result=mysql_query($query);
                $row=mysql_fetch_assoc($result);
                if(!empty($row)){
                $_SESSION['user']= $row;
                header('location:../../view/user_home_page.php');
                    }
              else {
                 $_SESSION['invalid_login']="Your email or password is invalid";
                 header('location:../../view/signin.php'); 
              }
                }
        
     else {
         if(empty($this->email)){
             $_SESSION['email_null']="Please insert email";
             header('location:../../view/signin.php');
         }
         elseif (empty ($this->password)) {
             $_SESSION['password_null']="Please insert password";
             header('location:../../view/signin.php');
         
     }
   else {
         $_SESSION['password_email_null']="Please insert password and email";
         header('location:../../view/signin.php');
     }
     }
    }
    
    public function profile_update(){
        
         $query = "UPDATE `flash_server`.`user` SET `first_name` = '$this->first_name', `last_name` = '$this->last_name', `email` = '$this->email', `image` = '$this->image', `school` = '$this->school', `collage` = '$this->collage', `graduation` = '$this->graduation', `company` = '$this->company' WHERE `user`.unique_id=" ."'". $this->unique_id."'";
         mysql_query($query);
         header('location:../../view/user_home_page.php');
    }
    public function get_msg(){
        $query="SELECT * FROM `chat`";
        $result=mysql_query($query);
        while ($row=mysql_fetch_assoc($result)){
            $this->data[]=$row;
        }
        return $this->data;   
    }
    public function send_msg(){
        if(!empty($this->sender)&& !empty($this->message)){
            
             $query="INSERT INTO `chat` (`msg_id`, `sender`, `message`) VALUES (NULL, '$this->sender', '$this->message')";
            mysql_query($query);
            
           
        }
    }
}
