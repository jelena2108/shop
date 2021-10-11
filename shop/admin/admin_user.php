<?php include "../session.php"; ?>
<?php include "db.php"; ?> 
<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php echo "<br><a href='../home.php'>Home</a>"; ?>
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
     
      <h1>User</h1>
       
     </header>
    
     <aside>
        <?php include "nav.php"; ?>
        
         
     </aside>
     <main class="admin">
     <table>
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
                 
                    <?php $user=new User(); 
                     $users=$user->getAllUsers();
                  
                     foreach($users as $user){
                    ?>  
                        <td><a href="view_user.php?id=<?php echo $user->id; ?>"><?php echo $user->id; ?></a></td>
                        <td><?php echo $user->first_name; ?></td>
                         <td><?php echo $user->last_name; ?></td>
                         <td><?php echo $user->username; ?></td>
                         <td><?php echo $user->password; ?></td>
                         <td><?php echo $user->email; ?></td>
                         <td><?php echo $user->admin; ?></td>
            </tr>
                       
                   <?php   } ?>
                 
         </tbody>
     </table>
       
     </main>
     <?php  include "footer.php"; ?>
     </div><!-- End of container -->
      
   </body>
    
</html>
