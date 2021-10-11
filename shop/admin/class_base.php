<?php include_once "db.php"; ?>
<?php
class BaseClass{
  
    public function  getAll(){
        global $database;
        
        $sql="SELECT * FROM " . $this->table ;
        $result=$database->make_query($sql);
        $categories=static::make_array($result);
        // print_r($categories); NIZ KOJI SADRZI OBJEKTE
        
         return $categories;
        
    }
    
  
     public function getById($id){
        global $database;
         $sql="SELECT * FROM " . $this->table . " WHERE id=$id";
        $result=$database->make_query($sql);
         $category=static::make_array($result);
         
         foreach($category as $category_by_id){
             
             // echo $category_by_id->category; // PRISTUPAMO SVOJSTVU OBJEKTA
             
            return $category_by_id;
         }
     }
    
    public static function make_array($row){
        global $database;
       
        $array=array();
       while($result=mysqli_fetch_assoc($row)){
       $array[]=static::objects($result);
            
       }
          //print_r ($array);
       
         return $array;
             }
    
     public static function objects($result) {
            $object=new static;
            foreach($result as $attribute=>$value){
                
                if($object->property($attribute)){
                $object->$attribute=$value;
                }
            }
            return $object;
        }
    	private function property($the_property){

			$object_properties = get_object_vars($this); // POMOĆU OVE FUNKCIJE DOBIJAMO SVA SVOJSTVA OVE KLASE
			
			return array_key_exists($the_property, $object_properties); // PROVERAVAMO DA LI SE $the_property NALAZI MEĐU SVOJSTVIMA DOBIJENIM POMOĆU FUNKCIJE get_object_vars()
    
}
    /*
        public function search_product(){
        if(isset($_POST['search']) && $_POST['search']!=""){
    $search=trim($_POST['search']);
    global $database;
    $sql="SELECT categories.category, products.name FROM products JOIN categories ON categories.id=products.category_id WHERE products.name LIKE '$search%'";
    $result=$database->make_query($sql);
    foreach($result as $res){
      
        $category=$res['category'];
        $name=$res['name'];
        printf("<p><i>Category:%s</i></p><p>%s</p><br>",$category,$name);
       
            }
        }
    }
    
    */
        public function search_product(){
        if(isset($_POST['search']) && $_POST['search']!=""){
    $search=trim($_POST['search']);
    $search=filter_var($search,FILTER_SANITIZE_STRING);
    global $database;
    $sql="SELECT categories.category, products.name,product_photo.product_name FROM products JOIN categories ON categories.id=products.category_id JOIN product_photo ON products.id=product_photo.product_id WHERE products.name LIKE '$search%'";
    $result=$database->make_query($sql);
    foreach($result as $res){
      
        $category=$res['category'];
        $name=$res['name'];
        
        $product_name=$res['product_name'];
        printf("<p><i>Category:%s</i></p><p><b>%s</b></p><p><a href=''>%s</a></p><br>",$category,$name,$product_name);
       
            }
        }
    }
    
    
      
    
}




?>