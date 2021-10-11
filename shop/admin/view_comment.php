<?php include "../session.php"; ?> 

<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php include "class_user.php"; ?>
<?php include "class_comment.php"; ?>
<?php User::admin_check(); ?>
<?php echo "<br><a href='comments.php'>Back</a>"; ?>
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
     
      <h1>Comments</h1>
       
     </header>
     <main class="view_user">
     <table class="view_one_user">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Comment</th>
                 <th>Comment Time</th>
                 <th>User_id</th>
                 <th>Product_id</th>
                 
             </tr>
         </thead>
         <tbody>
             <tr>
             <?php  
                
                if(isset($_GET['id'])){
                $comment=new Comment();   
                $comment_by_id=$comment->getById($_GET['id']);
            ?> <td> 
                <?php echo $comment_by_id->id; ?></td>
                <td>
                <?php echo $comment_by_id->comment; ?></td>
                <td>
                <?php echo $comment_by_id->comment_time; ?></td>
                <td>
                <?php echo $comment_by_id->user_id; ?></td>
                <td>
                <?php echo $comment_by_id->product_id; ?></td>
               
                
                </tr>
             
                        
                   <?php   } else {
                    header("Location:admin_user.php");
                }     
             ?>
                     
        
                 
             
         </tbody>
     </table>
   </main>
  
     </div><!-- End of container -->
      
 </body>
</html>
