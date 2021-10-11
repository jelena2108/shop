<?php 
include_once "db.php";
class User {
    
    public $id;
    public $first_name;
    public $last_name;
    public $username;
    public $password;
    public $email;
    public $admin;
    
     public function getAllUsers(){
        global $database;
        
        $sql="SELECT * FROM user";
        
        $result=$database->make_query($sql);
        $users=self::make_array($result);
        // print_r($users); NIZ KOJI SADRZI OBJEKTE
        
         return $users;
        
    }
    
  
     public static function getUserById($id){
        global $database;
         $sql="SELECT * FROM user WHERE id=$id";
        $result=$database->make_query($sql);
         $user=self::make_array($result);
         
         foreach($user as $user_by_id){
             
             // echo $user_by_id->username; // PRISTUPAMO SVOJSTVU OBJEKTA
             
            return $user_by_id;
         }
     }
    
    public static function make_array($row){
        global $database;
       
        $array=array();
       while($result=mysqli_fetch_assoc($row)){
       $array[]=self::objects($result);
            
       }
          //print_r ($array);
       
         return $array;
             }
    
     public static function objects($result) {
            $object=new self;
            foreach($result as $attribute=>$value){
                
                if($object->property($attribute)){
                $object->$attribute=$value;
                }
            }
            return $object;
        }
    	private function property($the_property){

			$object_properties = get_object_vars($this); // POMOĆU OVE FUNKCIJE DOBIJAMO SVA SVOJSTVA OVE KLASE
			
			return array_key_exists($the_property, $object_properties); // PROVERAVAMO DA LI SE $the_property NALAZI MEĐU SVOJSTVIMA DOBIJENIM POMOĆU FUNKCIJE get_object_vars()
    
}
    
    public static function admin_check(){
         global $database;
         if(!isset($_SESSION['admin']) || $_SESSION['admin']==0){
             header("Location:../home.php");
         }
    }
    public static function if_session(){
        global $database;
        if(!isset($_SESSION['admin'])){
            header("Location:index.php");
        }
    }
 
    public function create(){
        global $database;
        $sql="INSERT INTO user (first_name,last_name,username,password,email,admin) VALUES ('$this->first_name','$this->last_name','$this->username','$this->password','$this->email','$this->admin')";
        
        if($database->make_query($sql)){
               
                $this->id=$database->last_insert_id();
                
                return true;
            }else{
                return false;
            }
    }
    
    public static function delete(){ 
        global $database;
        $user_id=$_GET['id'];
        if(isset($user_id)){
        $sql="DELETE FROM user WHERE id={$user_id}";
        }
        $database->make_query($sql);
        
    }
    
    public static function update($id){
        global $database;
        
        if(isset($_POST['submit_register']) && isset($_POST['first_name'],$_POST['last_name'],$_POST['username'],$_POST['password'],$_POST['email']) && $_POST['first_name']!="" && $_POST['last_name']!="" && $_POST['username']!="" && $_POST['password']!="" && $_POST['email']!=""){
            
        $user=new self;
        $users=$user->getAllUsers();
        foreach($users as $user)
        if($_POST['username'] !== $user->username && $_POST['email'] !== $user->email ){
            
            $user->username=trim($_POST['username']);
            $user->username=filter_var($user->username,FILTER_SANITIZE_STRING); 
            $user->email=trim($_POST['email']);
            $user->email=filter_var($user->email,FILTER_SANITIZE_STRING);
            $user->first_name=trim($_POST['first_name']);
            $user->first_name=filter_var($user->first_name,FILTER_SANITIZE_STRING);
            $user->last_name=trim($_POST['last_name']);
            $user->last_name=filter_var($user->last_name,FILTER_SANITIZE_STRING);
            $user->password=md5(trim($_POST['password']));
            $user->password=filter_var($user->password,FILTER_SANITIZE_STRING);
            
        
    
        $sql="UPDATE user SET first_name='$user->first_name',last_name='$user->last_name',username='$user->username',email='$user->email',password='$user->password' WHERE id={$id}";
        $database->make_query($sql);
        }
        return true;
        
        } else {
            echo "<p>All fields must be filled in!</p>";
        }
        }

    
    
    public static function edit_admin(){
        global $database;
        $user_id=$_GET['id'];
        
        $user=self::getUserById($user_id);
        $admin=$user->admin;
        
        if(isset($user_id)){
            if($admin==1){
            $sql="UPDATE user SET admin=0 WHERE id={$user_id}";
            } else if ($admin==0){
            $sql="UPDATE user SET admin=1 WHERE id={$user_id}";   
            }
        }
        $database->make_query($sql);
        
        
    }
    
    
    
    
    public function login(){
        global $database;
        if(isset($_POST['submit_login']) && isset($_POST['username']) && isset($_POST['password'])){
        $this->username=trim($_POST['username']);
        $this->password=md5(trim($_POST['password']));
            
        if($this->username !="" && $this->password !=""){
        
        $sql="SELECT * FROM user WHERE username='$this->username' AND password='$this->password'";
        $result=$database->make_query($sql);
        
        $users=self::make_array($result);
            if($users){
            foreach($users as $user){
        
            session_start();
            $_SESSION['id']=$user->id;
            $_SESSION['username']=$user->username;
            $_SESSION['logged_in']=true;
            $_SESSION['admin']=$user->admin;
                
            $this->admin=$_SESSION['admin'];
                if($this->admin==1){
                    header("Location:admin/index.php");
                }else if ($this->admin==0){
                    header("Location:home.php");
                }
            
            
             }
            
        }else{
            echo "<p>User does not exist,please <a href='registration.php'>register now!</a></p>";
            }
         }
            
            
            
            
            
            
        }
   return true; 
    
    }
    
    
    public function register(){
        
        if(isset($_POST['submit_register']) && isset($_POST['first_name'],$_POST['last_name'],$_POST['username'],$_POST['password'],$_POST['email']) && $_POST['first_name']!="" && $_POST['last_name']!="" && $_POST['username']!="" && $_POST['password']!="" && $_POST['email']!=""){
    
        $user=new self;
        $users=$user->getAllUsers();
        foreach($users as $user){
        if($_POST['username'] !== $user->username && $_POST['email'] !== $user->email ){
            
            $user->username=trim($_POST['username']);
            $user->username=filter_var($user->username,FILTER_SANITIZE_STRING); 
            $user->email=trim($_POST['email']);
            $user->email=filter_var($user->email,FILTER_SANITIZE_STRING);
            $user->first_name=trim($_POST['first_name']);
            $user->first_name=filter_var($user->first_name,FILTER_SANITIZE_STRING);
            $user->last_name=trim($_POST['last_name']);
            $user->last_name=filter_var($user->last_name,FILTER_SANITIZE_STRING);
            $user->password=md5(trim($_POST['password']));
            $user->password=filter_var($user->password,FILTER_SANITIZE_STRING);
            $user->admin=0;
        }else{
           die("<p>Username or email is already in use,please <a href='registration.php'>try again!</a></p>");
        }
    }
        $user->create();
        header("Location:login.php");
       
      }else {
        echo "<p>All fields must be filled in!</p>";
      }
    }
   
    
} // End of class User

$user=new User();
//print_r($user->getAllUsers());
/*
$users=$user->getAllUsers();
foreach($users as $user){
  echo $user->username. "<br>";  
}
*/
 



?>
