<?php include "../session.php"; ?>

<?php include "class_user.php"; ?>
 <?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php User::admin_check(); ?>
<?php echo "<br><a href='admin_user.php'>Back</a>"; ?>
<?php
if(isset($_GET['id'])){
    $user_id=$_GET['id'];
} else {
    header("Location:admin_user.php");
}
$user=User::getUserById($user_id);


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Cars</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
    <div class="cont log">
 
     <main class="first_page">
     
        <h2>Update User</h2>
   <form method="POST" action="">
           
        <label for="first_name">First Name:</label>
        <div>
        <input class="login index" type="text" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>" onblur="validateText(this)">
        </div>
           
        <label for="last_name">Last Name:</label>
        <div>
        <input class="login index" type="text" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>" onblur="validateText(this)">
        </div>
        <label for="username">Username:</label>
        <div>
        <input class="login index" type="text" name="username" id="username" value="<?php echo $user->username; ?>" onblur="validateText(this)">
        </div>
           
        <label for="password">Password:</label>
        <div>
        <input class="login index" type="password" name="password" id="password" onblur="validateText(this)">
        </div>
        <label for="email">Email:</label>
        <div>
        <input class="login index" type="email" name="email" id="email" value="<?php echo $user->email; ?>" onblur="validateText(this)">
        </div>
        <div>
        <input class="login index" type="submit" name="submit_register" id="submit_register" value="Update">
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
       </div>
    </body>
</html>
<?php if(User::update($user_id)){
    header("Location:admin_user.php");
}
?>