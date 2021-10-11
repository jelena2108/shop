<?php include_once "class_base.php"; //If the file was already included previously, this statement will not include it again. 
?> 
<?php
    
class Products extends BaseClass {
    public $id;
    public $name;
    public $category_id;
    public $table="products";

    
    public static function delete(){ 
        global $database;
        $product_id=$_GET['id'];
        if(isset($product_id)){
        $sql="DELETE FROM products WHERE id={$product_id}";
        }
        $database->make_query($sql);
        return true;
    }
    
    public function view_product_comment(){
       if(isset($_GET['id'])){
        $prod=$_GET['id'];
        global $database;
        
        $sql="SELECT comments.comment,user.username FROM comments JOIN user ON user.id=comments.user_id JOIN products ON products.id=comments.product_id  WHERE products.id='$prod'";
        $result=$database->make_query($sql);
          echo "Comments:";
             foreach($result as $res){
               
                 $comment=$res['comment']." ";
                 $username=$res['username'];
                 echo "<br>";
                 printf("%s<i>%s</i>",$comment,$username);
                }
                 
          }
    }
    
    
    /*
    public function select_clothes(){
        global $database;
        $sql="SELECT * FROM products WHERE category_id=1";
        $result=$database->make_query($sql);
        foreach($result as $res){
            $name=$res['name'];
            
           echo "<input type='checkbox' name='product[]' id='$name' value='$name'> 
          
         <label for='$name'>$name</label><br>";
        }
        
    }
    
    */
    
    
     public function select_category($category){
        global $database;
        $sql="SELECT * FROM products JOIN categories ON categories.id=products.category_id WHERE category='$category'";
        $result=$database->make_query($sql);
        foreach($result as $res){
            $name=$res['name'];
            
           echo "<input type='checkbox' name='product[]' id='$name' value='$name'> 
          
         <label for='$name'>$name</label><br>";
           
        }
        
    }
    
    public function num_products_in_category($category){
        global $database;
         $sql="SELECT * FROM products JOIN categories ON categories.id=products.category_id WHERE category='$category'";
        
        $result=$database->make_query($sql);
        echo $category."(".$num_rows=$result->num_rows.")";
    }
    
    
    
}
$products=new Products();
?>