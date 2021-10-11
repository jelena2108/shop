<?php include_once "db.php"; ?>
<?php include "class_user.php";

if(isset($_GET['id'])){
    User::edit_admin();
}
header("Location:admin_user.php");




?>