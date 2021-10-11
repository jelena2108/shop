<?php include "../session.php"; ?>
 
<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php include "class_user.php"; ?>
<?php include "class_products.php"; ?>
<?php User::admin_check(); ?>
<?php echo "<br><a href='products.php'>Back</a>"; ?>
<?php $products=new Products(); ?>

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
     <main class="view_user">
     <table class="view_one_user">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Product</th>
                
                 <th>Category_id</th>
                 
                 
             </tr>
         </thead>
         <tbody>
            <tr>
             <?php  
                
                if(isset($_GET['id'])){
                    
                $product_by_id=$products->getById($_GET['id']);
            ?> 
               <td><?php echo $product_by_id->id; ?></td>
               <td><?php echo $product_by_id->name; ?></td>
               
               <td><?php echo $product_by_id->category_id; ?></td>
               
            </tr>
                
                   <?php   } else {
                    header("Location:products.php");
                }     
             ?>
              
         </tbody>
     </table>
     
     <?php  $products->view_product_comment(); ?>
     
      <div><a href="delete_product.php?id=<?php echo $product_by_id->id; ?>" onclick="deleteProduct()">Delete Product</a></div>
      <div><a href="update_product.php?id=<?php echo $product_by_id->id; ?>">Update Product</a></div>
      
     </main>
  
     </div><!-- End of container -->
     
      <script>
      function deleteProduct(){
          alert("Are you sure you want to delete this product?");
      }
       
      </script>
      
   </body>
    
</html>
