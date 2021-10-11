<?php include "session.php"; ?>
<?php include "admin/class_category.php"; ?>
<?php include "admin/class_user.php"; ?>
<?php include "admin/class_photo.php"; ?>
<?php include "admin/class_basket.php"; ?>
<?php User::if_session(); ?> 
<?php echo "<br><a href='logout.php'>Logout</a>"; ?>
<?php echo "<br><a href='home.php'>Home</a>"; ?>
<?php echo "<br><a href='basket.php'><img src='images/basket.png''></a>"; ?>
<?php echo $basket->basket_session_check(); ?>



<?php 

$category=new Category();

if(isset($_POST['category'])){
$categories=$category->getAll();
    foreach($categories as $category){
        $categ=$category->category;
    if($categ==$_POST['category']){
    $location="categories.php?category=".$categ;
    header("Location:$location");
    }
  }
}

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
    
    
    
    
    
     <header class="admin_header">
     
      <h1>Categories</h1>
       
     </header>
    
<aside>
       
         
       <?php include "nav_front.php"; ?>
</aside>
<main class="admin">
   <div class="cat_prod">
    <div class="sel_category">
     
     <form method="POST" action="">
         <label for="category"><b>Select Category</b></label><br>
         <select class="category" name="category" id="category">
       
        <?php 
         
         $categories=$category->getAll();
                foreach($categories as $category){ 
         ?>
         <option value="<?php echo $category->category; ?>"><?php echo $category->category; ?></option>
         <?php } ?>
         </select>
         <br><br>
         <input type="submit" value="View Products">
      </form><br>
      
  </div>
  
  
  <div class="product_found">
     <div class="search">
          <form  class="searched" action="" method="POST">
           <input type="search" name="search" id="search" value="Search Product...">
          </form>
     </div>
     <p><?php $category->search_product(); ?></p>
  </div>
  </div>
  
  <div class="display_photo">
       <?php
         
          
      if(isset($_GET['category'])){
      $cat=$_GET['category'];
         
          $rzl=$photos->getAll();
          foreach($rzl as $r){
              $photo_id=$r->id;
              $photo=$r->picture_path();
              $prod_photo_id=$r->prod_photo_id;
         
      
        global $database;
        $sql="SELECT photo.id, photo.prod_photo_id,products.id,products.name,product_photo.product_name,product_photo.price,photo.description,categories.category FROM categories JOIN products ON categories.id=products.category_id JOIN product_photo ON products.id=product_photo.product_id JOIN photo ON product_photo.id=photo.prod_photo_id WHERE categories.category='$cat' AND photo.id=$photo_id AND product_photo.id=$prod_photo_id";
         $result=$database->make_query($sql);
          
         foreach($result as $res){
                $id=$res['id'];
                $product=$res['name'];
                $product_name=$res['product_name'];
                $description=$res['description'];
                $price=$res['price'];
                $category=$res['category'];
                printf("<div><h3><i>%s</i></h3></div><div class='photo_product'><a href='the_product.php?id=$photo_id'><img src='%s'></a><p>%s</p><p>%s</p><p>%s</p><p>%s</p>",$category,$photo, $product,$product_name,$description,$price);
             
                echo "</div>";
                 }
                }
              }
        
      ?>
       
 </div>
  
</main>
     <?php  include "admin/footer.php"; ?>
     </div><!-- End of container -->

</body>
    
</html>



