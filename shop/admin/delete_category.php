<?php include_once "db.php"; ?>
<?php include "class_category.php";
if(isset($_GET['id'])){
   Category::delete();
}
header("Location:categories.php");



?>