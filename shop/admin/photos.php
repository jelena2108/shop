<?php include "../session.php"; ?>
 
<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php echo "<br><a href='../home.php'>Home</a>"; ?>
<?php include "class_photo.php"; ?>
<?php include "class_user.php"; ?>
<?php User::admin_check(); ?>


<?php if(isset($_FILES['upload_file'])){
$photos->set_file($_FILES['upload_file']);
 
// echo $photos->filename;
}
$photos->create(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <title>Shop</title>
      <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
     <header class="admin_header">
     
      <h1>Photos</h1>
       
     </header>
    
<aside>
        <?php 
       
        include "nav.php"; ?>
         
</aside>
<main class="admin">
    <div class="select_category">
     <div class="insert_category">
      <form action="" method="POST" enctype="multipart/form-data">
           <label for="description">Description:</label>
           <input type="text" name="description" id="description"><br><br>
           <input type="file" name="upload_file" id="upload_file"><br><br>
           
           <label for="sel_category">Select Category:</label><br>
           <select type="checkbox" name="sel_category" id="sel_category">
              
            <?php  $photos->select_category_name(); ?>
           </select>
           
           <label for="name_of_product">Select Name of Product:</label><br>
           <select type="checkbox" name="name_of_product" id="name_of_product">
              
               <?php $photos->select_name_of_product(); ?>
           </select>
           
           
           <label for="upload">Select Product Name:</label><br>
           <select type="checkbox" name="upload" id="upload">
             
               <?php $photos->select_product_name(); ?>
           </select>
           
           <br>
           
           <input type="submit" name="submit" value="Upload">
           
       </form>
       
     
    </div>
       <p><a href="display_all_photos.php">View All Photos</a></p>
  </div>
</main>
     <?php  include "footer.php"; ?>
     </div><!-- End of container -->

</body>
    
</html>
