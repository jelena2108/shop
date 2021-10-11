<?php include_once "db.php"; ?>
<?php include "class_products.php";
if(isset($_GET['id'])){
   Products::delete();
}
header("Location:products.php");



?>