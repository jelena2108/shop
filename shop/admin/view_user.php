<?php include "../session.php"; ?>
 
<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php include "class_user.php"; ?>
<?php User::admin_check(); ?>
<?php echo "<br><a href='admin_user.php'>Back</a>"; ?>
 <!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Cars</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
    <div class="container">
     <header class="admin_header">
     
      <h1>User</h1>
       
     </header>
     <main class="view_user">
     <table class="view_one_user">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Username</th>
                 <th>Password</th>
                 <th>Email</th>
                 <th>Admin</th>
                 
             </tr>
         </thead>
         <tbody>
             <tr>
             <?php  
                
                if(isset($_GET['id'])){
                    
                $user_by_id=User::getUserById($_GET['id']);
            ?> <td> 
                <?php echo $user_by_id->id; ?></td>
                <td>
                <?php echo $user_by_id->first_name; ?></td>
                <td>
                <?php echo $user_by_id->last_name; ?></td>
                <td>
                <?php echo $user_by_id->username; ?></td>
                <td>
                <?php echo $user_by_id->password; ?></td>
                <td>
                <?php echo $user_by_id->email; ?></td>
                <td>
                <?php echo $user_by_id->admin; ?></td>
                </tr>
             
                        
                   <?php   } else {
                    header("Location:admin_user.php");
                }     
             ?>
                     
        
                 
             
         </tbody>
     </table>
      <div><a href="delete_user.php?id=<?php echo $user_by_id->id; ?>" onclick="deleteUser()">Delete User</a></div>
      <div><a href="update_user.php?id=<?php echo $user_by_id->id; ?>">Update User</a></div>
      <div><a href="edit_user.php?id=<?php echo $user_by_id->id; ?>">Edit Admin</a></div>

     
     
      
     </main>
  
     </div><!-- End of container -->
      <script>
      function deleteUser(){
          alert("Are you sure you want to delete this user?");
      }
       
      </script>
   </body>
    
</html>
