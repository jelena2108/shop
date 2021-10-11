<?php include "../session.php"; ?>
 
<?php include "class_user.php"; ?>
<?php User::admin_check(); ?>
<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php echo "<br><a href='../home.php'>Home</a>"; ?>

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
     
      <h1>Admin</h1>
       
     </header>
    
     <aside>
       <?php include "nav.php"; ?>  
     </aside>
     <main class="admin">
     
     
      
     </main>
     
     <?php  include "footer.php"; ?>
     </div><!-- End of container -->
      
   </body>
    
</html>
