<?php include "session.php"; ?>

<?php include "admin/class_products.php"; ?>
<?php include "admin/class_user.php"; ?>
<?php User::if_session(); ?> 
<?php  echo "<br><a href='logout.php'>Logout</a>"; ?>

<?php $products=new Products(); ?>

<?php 
/*
if(isset($_POST['submit'])){
    if(isset($_POST['product'])){
        global $database;
        $product=$_POST['product']; //DOBILI SMO NIZ JER SMO U FORMI name="product[]" DEFINISALI NIZ
       
       foreach($product as $prod){
           $sql="SELECT name FROM products WHERE name='$prod'";
           $result=$database->make_query($sql);
           foreach($result as $rez){
               echo $rez['name'];
           }
       }
           
        }
    }
*/
/*
if(isset($_POST['submit'])){
    if(isset($_POST['product']) && isset($_POST['gender'])){
        global $database;
        $gender=$_POST['gender'];
        $product=$_POST['product'];
       foreach($gender as $res){ 
           foreach($product as $prod){
           $sql="SELECT products.name,clothes.gender FROM products JOIN product_clothes ON products.id=product_clothes.product_id JOIN clothes ON clothes.id=product_clothes.clothes_id WHERE name='$prod' AND gender='$res'";
           $result=$database->make_query($sql);
           foreach($result as $rez){
               echo $rez['name'];
               echo $rez['gender'];
           }
         }
            
        }
          
    }
}
*/

/*
if(isset($_POST['submit'])){
    if(isset($_POST['product']) && isset($_POST['gender']) && isset($_POST['brand']) && isset($_POST['size'])){
        global $database;
        $gender=$_POST['gender'];
        $product=$_POST['product'];
        $brand=$_POST['brand'];
        $size=$_POST['size'];
       foreach($gender as $res){ 
           foreach($brand as $mark){
            foreach($size as $sz){
           foreach($product as $prod){
           $sql="SELECT products.name,clothes.gender,clothes.brand,clothes.size FROM products JOIN product_clothes ON products.id=product_clothes.product_id JOIN clothes ON clothes.id=product_clothes.clothes_id WHERE name='$prod' AND gender='$res' AND brand='$mark' AND size='$sz'";
           $result=$database->make_query($sql);
           foreach($result as $rez){
               echo $rez['name'];
               // echo $rez['gender'];
               // echo $rez['brand'];
               // echo $rez['size'];
           }
         }
          
           
           
           }
        }
       }
    }
}

*/


if(isset($_POST['submit'])){
    if(isset($_POST['product']) && isset($_POST['gender']) && isset($_POST['brand']) && isset($_POST['size'])){
        global $database;
        $gender=$_POST['gender'];
        $product=$_POST['product'];
        $brand=$_POST['brand'];
        $size=$_POST['size'];
       foreach($gender as $res){ 
           foreach($brand as $mark){
            foreach($size as $sz){
           foreach($product as $prod){
           $sql="SELECT products.name,product_photo.product_name,product_photo.price, product_photo.brand,product_clothes.gender, product_clothes.size FROM products JOIN product_photo ON products.id=product_photo.product_id JOIN photo_clothes ON product_photo.id=photo_clothes.product_photo_id JOIN product_clothes ON product_clothes.id=photo_clothes.product_clothes_id WHERE name='$prod' AND gender='$res' AND brand='$mark' AND size='$sz'";
           $result=$database->make_query($sql);
           foreach($result as $rez){
               echo $rez['name']."<br>";
               echo $rez['product_name']."<br>";
               echo $rez['price']."<br>";
               echo $rez['brand']."<br>";
               echo $rez['gender']."<br>";
               echo $rez['size']."<br>";
           }
         }
          
           
           
           }
        }
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
     <header class="home">
       
        <nav>
            <ul>
                <li><a href="admin/index.php">Admin</a></li>
                <li><a href="admin/user.php">User</a></li>
                <li><a href="index.php">Login</a></li>
                <li><a href="categories.php">Categories</a></li>
                <li><a href="products.php">Products</a></li>
            </ul>
        </nav>
        
     </header>
     <aside>
         
     <p>Filter:</p>
     
     
     
     <form action="" method="POST" class="searched">
       <p><b><?php $products->num_products_in_category("Clothes"); ?></b></p>
        <?php $products->select_category("Clothes"); ?>
         <p><b>Gender</b></p>
         <input type="checkbox" name="gender[]" id=" men" value="men">
         <label for="men">Men</label><br>
         <input type="checkbox" name="gender[]" id="women" value="women">
         <label for="women">Women</label><br>
         <input type="checkbox" name="gender[]" id="kids" value="kids">
         <label for="kids">Kids</label><br>
         
         
         
         <p><b>Brand</b></p>
         <input type="checkbox" name="brand[]" id=" nike" value="nike">
         <label for="men">Nike</label><br>
         <input type="checkbox" name="brand[]" id="under_armour" value="under_armour">
         <label for="women">Under Armour</label><br>
         <input type="checkbox" name="brand[]" id="addidas" value="addidas">
         <label for="kids">Addidas</label><br>
         <input type="checkbox" name="brand[]" id="reebok" value="reebok">
         <label for="kids">Reebok</label><br>
         <input type="checkbox" name="brand[]" id="puma" value="puma">
         <label for="kids">Puma</label><br>
         
         <p><b>Size</b></p>
         <input type="checkbox" name="size[]" id="xxs" value="xxs">
         <label for="xxs">XXS</label><br>
         <input type="checkbox" name="size[]" id="xs" value="xs">
         <label for="xs">XS</label><br>
         <input type="checkbox" name="size[]" id="s" value="s">
         <label for="s">S</label><br>
         <input type="checkbox" name="size[]" id="m" value="m">
         <label for="m">M</label><br>
         <input type="checkbox" name="size[]" id="l" value="l">
         <label for="l">L</label><br>
         <input type="checkbox" name="size[]" id="xl" value="xl">
         <label for="xl">XL</label><br>
         <input type="checkbox" name="size[]" id="xxl" value="xxl">
         <label for="xxl">XXL</label><br><br>
        
         <input type="submit" name="submit" value="Submit">
         
     </form>
         
     </aside>
    
     <main>
     
    
     
      
     </main>
     <footer>
         <?php include "admin/footer.php"; ?>
     </footer>
     </div><!-- End of container -->
      
   </body>
    
</html>
