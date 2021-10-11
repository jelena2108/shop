<?php include_once "class_base.php"; ?>

<?php 

class Photo extends BaseClass {
    public $table="photo";
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $prod_photo_id;
    
    public $sel_category;
    public $name_of_product;
    public $upload;
    
    public $tmp_path;
    public $upload_directory="images";
    
    
    public $target_path;
    
    
    public $errors=array();
	public $upload_errors_array=array(

	UPLOAD_ERR_OK           =>"There is no error",
	UPLOAD_ERR_INI_SIZE     =>"The upload file exceeds.....",
	UPLOAD_ERR_FORM_SIZE    =>"The uploaded file exceeds the max_file_size....",
	UPLOAD_ERR_PARTIAL      =>"The uploaded file was only partially uploaded.",
	UPLOAD_ERR_NO_FILE      =>"No file was uploaded",
	UPLOAD_ERR_NO_TMP_DIR   =>"Missing a temporary folder",
	UPLOAD_ERR_CANT_WRITE   =>"Failed to write fie to a disk",
	UPLOAD_ERR_EXTENSION    =>"A PHP extension stopped the file upload"
	);
    
    
    //KAO PARAMETAR PRIMA $_FILES['uploaded_file']
    public function set_file($file){
        
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[]="There is no file uploaded here";
            return false;
        }elseif($file['error'] !=0){
            $this->errors[]=$this->errors[$file['error']];
            return false;
        }else{
            
            
        $ext=".jpg";
    
        $title=$this->title=basename($file['name'],$ext);   
        $filename=$this->filename=basename($file['name']);
        $tmp_path=$this->tmp_path=$file['tmp_name'];
        $type=$this->type=$file['type'];
        $size=$this->size=$file['size'];
        }
        
    }
    
    
    public function picture_path(){
        return $this->upload_directory . DS . $this->filename;
    }
  
    
    public function create(){
        
        if(isset($_POST['submit']) && isset($_POST['description'])  && isset($_FILES['upload_file']) && isset($_POST['upload'])  && isset($_POST['sel_category']) && isset($_POST['name_of_product'])){
            
             
           
        global $database;
       
        //print_r($file);
    
        $description=$this->description=$_POST['description'];
            
        $sel_category=$this->sel_category=$_POST['sel_category'];   
        $name_of_product=$this->name_of_product=$_POST['name_of_product']; 
        $upload=$this->upload=$_POST['upload'];
            $sq="SELECT product_photo.id FROM product_photo JOIN products ON products.id=product_photo.product_id JOIN categories ON categories.id=products.category_id WHERE category='$sel_category' AND name='$name_of_product' AND product_name='$upload'";
            $rez=$database->make_query($sq);
            foreach($rez as $r){
        
            $this->prod_photo_id=$r['id'];
            }
           
        $target_path=$this->target_path=SITE_ROOT. DS. 'admin' .DS . $this->upload_directory . DS . $this->filename;
       
        
        if(file_exists($target_path)){
            $this->errors[]="The file {$this->filename}already exists";
            return false;
        }    
        if(move_uploaded_file($this->tmp_path,$target_path)){
           
            
        //echo $title;
        $sql="INSERT INTO photo (title,description,filename,type,size,prod_photo_id) VALUES ('$this->title','$this->description','$this->filename','$this->type','$this->size','$this->prod_photo_id')";
        $database->make_query($sql);
        if($database->make_query($sql)){
               
                $this->id=$database->last_insert_id();
            
                unset($this->tmp_path);
            
                 header("Location:photos.php");
            }else{
                return false;
            }
        }else {
            $this->errors[]="The folder probably does not have the permission";
            return false;
        }
        
        }
    }
    
       public function select_category_name(){ 
       
           global $database;
           $sql="SELECT category FROM categories ";
           $result=$database->make_query($sql);
           foreach($result as $res){
               
               $category=$res['category'];
               echo "<option value='-1'></option><option value='$category'>$category</option>";
               
           }
           
       }
    
     public function select_name_of_product(){ 
       
           global $database;
           $sql="SELECT name FROM products ";
           $result=$database->make_query($sql);
           foreach($result as $res){
               
             $name=$res['name'];
             echo "<option value='-1'><option value='$name'>$name</option>";
               
           }
               
       }
    
    
       public function select_product_name(){ 
       
           global $database;
           $sql="SELECT product_name FROM product_photo";
           $result=$database->make_query($sql);
           foreach($result as $res){
               
               $product_name=$res['product_name'];
               echo "<option value='-1'><option value='$product_name'>$product_name</option>";
               
           }
           
       }
   
}

$photos=new Photo();




?>