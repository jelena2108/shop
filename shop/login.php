<?php include "admin/class_user.php"; ?>
<?php
$user=new User();
$user->login();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Cars</title>
      <link href="admin/style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
    <div class="cont log">
 
     <main class="first_page">
     
        <h2>Login</h2>
    <form method="POST" action="">
           
        <label for="username">Username:</label>
        <div>
        <input class="login index" type="text" name="username" id="username" onblur="validateText(this)">
        </div>
           
        <label for="password">Password:</label>
        <div>
        <input class="login index" type="password" name="password" id="password" onblur="validateText(this)">
        </div>
        <div>
        <input class="login index" type="submit" name="submit_login" id="submit_login" value="Login">
        </div>
        
            
            
</form>
        <script>
               function validateText(f){
                   if(f.value==""){
                      f.style.borderColor="red";
                   
                      }else{
                          f.style.borderColor="";
                      }
               }
               
           </script>
        
         
     </main>
     
     </div><!-- End of container -->
      
   </body>
    
</html>
