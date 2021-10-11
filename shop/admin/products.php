<?php include "../session.php"; ?>

<?php include "class_user.php"; ?>
<?php include "class_products.php"; ?> 
<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>

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
     
      <h1>Products</h1>
       
     </header>
    
     <aside>
        <?php 
         
         include "nav.php"; ?>
        
         
     </aside>
     <main class="admin">
     <table class="all_comments">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Product</th>
                 
                 <th>Category_id</th>
                 
             </tr>
         </thead>
         <tbody>
             <tr>
                 
                    <?php $product=new Products(); 
                     $products=$product->getAll();
                     foreach($products as $product){
                    ?> <td> 
                 <a href="view_product.php?id=<?php echo $product->id; ?>"><?php echo $product->id; ?></a></td>
                        <td>
                        <?php echo $product->name; ?></td>
                       
                         <td><?php echo $product->category_id; ?></td>
                         
                        </tr>
                        
                        
                   <?php   } ?>
                     
                     
                 
             
         </tbody>
     </table>

     
     
      
     </main>
     <?php  include "footer.php"; ?>
     </div><!-- End of container -->
      
   </body>
    
</html>
