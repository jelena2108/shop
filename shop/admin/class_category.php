<?php 
include_once "class_base.php";
class Category extends BaseClass{
    public $id;
    public $category;
    public $table="categories";
   
    
    
        public function create(){
        global $database;
        $sql="INSERT INTO categories (category) VALUES ('$this->category')";
        
        if($database->make_query($sql)){
               
                $this->id=$database->last_insert_id();
                
                return true;
            }else{
                return false;
            }
    }
    
    
    
    
        public static function delete(){ 
        global $database;
        $category_id=$_GET['id'];
        if(isset($category_id)){
        $sql="DELETE FROM categories WHERE id={$category_id}";
        }
        $database->make_query($sql);
        return true;
    }
    
    
    /*
    
        public function view_category_products(){
  
        if(isset($_GET['category'])){
        $cat=$_GET['category'];
        global $database;
        $sql="SELECT products.id,products.name FROM categories JOIN products ON categories.id=products.category_id WHERE categories.category='$cat'";
        $result=$database->make_query($sql);
          
            echo "<table class='delete_categ'><thead><tr><td><b>Id</b></td><td><b>Product</b></td></tr></thead>";
             foreach($result as $res){
                 $id=$res['id'];
                 $product=$res['name'];
                 //$price=$res['price'];
                 printf("<tbody><tr><td><a href='view_product.php?id=$id'>%s</a></td><td>%s</td></tr>",$id,$product);
                }
                 echo "</tbody></table>"; 
          }
            
        }
    */
    
    
    /*
    public function view_category_products(){
    
    if(isset($_GET['category'])){
        $cat=$_GET['category'];
        global $database;
         $sql="SELECT products.id,products.name,product_photo.product_name,product_photo.price,photo.description FROM categories JOIN products ON categories.id=products.category_id JOIN product_photo ON products.id=product_photo.product_id JOIN photo ON product_photo.id=photo.prod_photo_id WHERE categories.category='$cat'";
         $result=$database->make_query($sql);
         echo "<table class='delete_categ'><thead><tr><td><b>Id</b></td><td><b>Product</b></td><td><b>Product Name</b></td><td><b>Description</b></td><td><b>Price</b></td></tr></thead>";
         foreach($result as $res){
                 $id=$res['id'];
                 $product=$res['name'];
                 $product_name=$res['product_name'];
                 $description=$res['description'];
                 $price=$res['price'];
                 printf("<tbody><tr><td><a href='view_product.php?id=$id'>%s</a></td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",$id,$product,$product_name,$description,$price);
                }
                 echo "</tbody></table>"; 
          }
            
        }
    
    */
    public function view_category_products(){
    
    if(isset($_GET['category'])){
        $cat=$_GET['category'];
        global $database;
        $sql="SELECT products.id,products.name,product_photo.product_name,product_photo.price,photo.description FROM categories JOIN products ON categories.id=products.category_id JOIN product_photo ON products.id=product_photo.product_id JOIN photo ON product_photo.id=photo.prod_photo_id WHERE categories.category='$cat'";
         $result=$database->make_query($sql);
        
         foreach($result as $res){
                 $id=$res['id'];
             
                 $product=$res['name'];
                 $product_name=$res['product_name'];
                 $description=$res['description'];
                 $price=$res['price'];
                 printf("<div class='single_photo'></div><div class='photo_description'><p><a href='view_product.php?id=$id'>%s</a></p><p>%s</p><p>%s</p><p>%s</p><p>%s</p>",$id,$product,$product_name,$description,$price);
             echo "</div>";
                }
                
          }
        
        
            
        }
    
    
    
    
    
    
    
    
}




?>