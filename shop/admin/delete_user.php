<?php include_once "db.php"; ?>
<?php include "class_user.php"; ?>
<?php 

if(isset($_GET['id'])){
    User::delete();
}
header("Location:admin_user.php");

?>