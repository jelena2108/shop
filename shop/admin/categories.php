<?php include "../session.php"; ?> 

<?php  echo "<br><a href='../logout.php'>Logout</a>"; ?>
<?php echo "<br><a href='../home.php'>Home</a>"; ?>
<?php include "class_user.php"; ?>
<?php include "class_category.php"; ?>
<?php User::admin_check(); ?>

<?php $category=new Category(); ?>
<?php
if(isset($_POST['insert_category']) && isset($_POST['insert_submit'])){
    $category->category=$_POST['insert_category'];
    $category->create();
    if($category->create()){
         echo "<p>New category inserted!</p>";
        
    }
  
}       

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
      <link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="container">
     <header class="admin_header">
     
      <h1>Categories</h1>
       
     </header>
    
<aside>
        <?php 
       
        include "nav.php"; ?>
         
</aside>
<main class="admin">
    <div class="select_category">
     <div class="insert_category">
     <form method="POST" action="">
         
         <label for="insert_category"><b>Insert Category</b></label><br>
         <input type="text" class="category" name="insert_category" id="insert_category"><br><br>
         <input type="submit" value="Insert" name="insert_submit"><br><br>
         
     </form>
     
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
     
       <?php $category->view_category_products(); ?>
    </div>
  
     
     <div class="delete_category">
         <p class="delete_categ"><b>Delete Category</b></p>
      <table class="delete_categ">
         <thead>
             <tr>
                 <th>Id</th>
                 <th>Category</th>
                 
             </tr>
         </thead>
         <tbody>
             <tr>
                <?php 
                $categories=$category->getAll();
                foreach($categories as $category){ ?>
                  
                 <td><a href="delete_category.php?id=<?php echo $category->id; ?>"><?php echo $category->id; ?></a></td>
                 <td><?php echo $category->category; ?></td>
                        
             </tr>
                        
                <?php   } ?>
                  
         </tbody>
     </table>
    </div>
  </div>
</main>
     <?php  include "footer.php"; ?>
     </div><!-- End of container -->

</body>
    
</html>
