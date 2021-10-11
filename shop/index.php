<?php include "admin/class_user.php";
$user=new User();
$user->login();
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
     <header>
        <img src="images-6.jpg" alt="">
    </header>
     
     <main class="first_page">
        <h1>Cars</h1>
        <div class="wrapper">
        <div>
         <form action="login.php" method="POST">
          
           <input class="login index" type="submit" name="login" id="login" value="Login">
         </form>
        </div>
        <div>
         <form method="POST" action="registration.php">
           <input class="login index" type="submit" name="register" id="register" value="Register">
         </form>
         </div>
        </div>
     </main>
     <footer>
         
     </footer>
     </div><!-- End of container -->
      
   </body>
    
</html>
       
       