<?php include_once "class_base.php"; ?>
<?php 

class Comment extends BaseClass {
    public $id;
    public $comment;
    public $comment_time;
    public $user_id;
    public $product_id;
    public $table="comments";
    
   
        public function create(){
        global $database;
        $sql="INSERT INTO comments (comment,comment_time,user_id,product_id) VALUES ('$this->comment','$this->comment_time','$this->user_id','$this->product_id')";
        
        if($database->make_query($sql)){
               
                $this->id=$database->last_insert_id();
                
                return true;
            }else{
                return false;
            }
    }
    
}

$comments=new Comment();




?>