<?php include "session.php"; ?>

<?php include "admin/class_category.php"; ?>
<?php include "admin/class_user.php"; ?>
<?php include "admin/class_photo.php"; ?>
<?php include "admin/class_basket.php"; ?>
<?php echo "<br><a href='products.php'>Continue shopping</a>"; ?>

<?php echo "<br><a href='basket.php'><img src='images/basket.png''></a><br>"; 


echo $basket->basket_session_check();
  

?>


<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Shop</title>
      <link href="admin/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
    
     <header class="admin_header">
     
      <h1>Basket</h1>
       
     </header>
     <main>
        <?php 
         

            $user_id=$_SESSION['id'];
            $basket->view_basket($user_id);
         
         ?>
         
         <form action="" method="POST">
             <input type="submit" name="order_now" value="Order Now" class="a_comment">
         </form>
         
         <?php 
         if(isset($_POST['order_now'])){
             
             global $database;
             $sql="UPDATE basket SET ordered='yes' WHERE user_id= $user_id";
             $database->make_query($sql);
             
             header("Location:basket.php");
            
         } 
         ?>
       
         
     </main>
     <?php  include "admin/footer.php"; ?>
    </div>
    </body>
</html>
    
