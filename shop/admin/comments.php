<?php include "../session.php"; ?>
 
<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php include "class_user.php"; ?>
<?php include "class_comment.php"; ?>

<?php User::admin_check(); ?>
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
    
     <aside>
        <?php include "nav.php"; ?>
        
         
     </aside>
     <main class="admin">
        
         <table class="all_comments">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Comment</th>
                 <th>Time</th>
                 <th>User_id</th>
                 <th>Product_id</th>
                 
             </tr>
         </thead>
         <tbody>
             <tr>
                 
                    <?php $comment=new Comment(); 
                     $comments=$comment->getAll();
                     foreach($comments as $comment){
                        
                    ?> <td> 
                 <a href="view_comment.php?id=<?php echo $comment->id; ?>"><?php echo $comment->id; ?></a></td>
                        <td>
                        <?php echo $comment->comment; ?></td>
                         <td>
                         <?php echo $comment->comment_time; ?></td>
                         <td>
                         <?php echo $comment->user_id; ?></td>
                         <td>
                         <?php echo $comment->product_id; ?></td>
                         
                         
                        </tr>
                        
                        
                   <?php   } ?>
                     
                     
                 
             
         </tbody>
     </table>
     </main>
     <?php  include "footer.php"; ?>
     </div><!-- End of container -->
      
   </body>
    
</html>