<?php include "../session.php"; ?>
 
<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php echo "<br><a href='../home.php'>Home</a>"; ?>
<?php include "class_photo.php"; ?>
<?php include "class_user.php"; ?>
<?php User::admin_check(); ?>


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
  
     <div class="display_photo">
      
     <div class="single_photo">
    <?php 
    if(isset($_GET['id'])){   
    $result=$photos->getById($_GET['id']);
    
    
    ?>
     
    <img class="one_photo" src="<?php echo $result->picture_path(); ?>"><br>
    </div>
    <div class="photo_description">
    <?php
    echo "<p class='one_photo'>$result->title</p>";
    echo "<p class='one_photo'>$result->description</p>";
    //echo $result->filename."<br>";
    //echo $result->type."<br>";
    //echo $result->size."<br>";
     }else {
        echo "<p class='one_photo'><a href='display_all_photos.php'>Select Photo</a></p>";
    }    
    ?>
    </div>
     
       
    </div>
  
     
  
</main>
     <?php  include "footer.php"; ?>
     </div><!-- End of container -->

</body>
    
</html>
