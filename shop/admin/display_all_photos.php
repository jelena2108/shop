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
  
    
      
    <?php 
        
    
    $result=$photos->getAll();
         foreach($result as $res){?>       
          <div class="display_photo">
         <div class="single_photo">
            <?php
             //echo $res->title."<br>";
             ?>
             <a href="display_photo.php?id=<?php echo $res->id; ?>"><img class="one_photo" src="<?php echo $res->picture_path(); ?>"></a><br>
        </div>
        <div class="photo_description">
             <?php
             echo "<p class='one_photo'>$res->title</p>";
              echo "<p class='one_photo'>$res->description</p>";
    //echo $result->filename."<br>";
    //echo $result->type."<br>";
    //echo $result->size."<br>";
        ?>
        </div> 
    </div>
         <?php     
         }
    
    ?>
     
        
     
       
    
  
     
  
</main>
     <?php  include "footer.php"; ?>
     </div><!-- End of container -->

</body>
    
</html>
