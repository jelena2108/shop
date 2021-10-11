<?php include_once "class_base.php"; ?>
<?php 

class Basket extends BaseClass{
    public $id;
    public $firstName;
    public $lastName;
    public $productName;
    public $price;
    public $user_id;
    public $table="basket";
    
    public function view_basket($user_id){
   
        global $database;
        $sql="SELECT * FROM basket WHERE user_id=$user_id AND ordered='no'";
        $result=$database->make_query($sql);
        
        if($result->num_rows==0){
            echo "<p>Your basket is empty!</p><p><a href='products.php'>Continue shopping</a></p>";
            
        }else{
            
        ?>
        <table><thead><tr><td><b>Product</b></td><td><b>Price</b></td></tr><tbody>
        <?php   
        foreach($result as $res){
            
            printf("<tr><td>%s</td><td>%s</td></tr>",$res['productName'],$res['price']);
         
        }
        ?>
        </tbody></table>
        <?php
        echo "<br>".$res['firstName']." ";
        echo $res['lastName']."<br>";
        
        }
        
    }
       
    
    public function basket_session_check(){
        $user=$_SESSION['id'];
        global $database;
        $sql="SELECT * FROM basket WHERE user_id=$user AND ordered='no'";
        $result=$database->make_query($sql);
        
        if($result->num_rows>0){
    
        $_SESSION['session_basket']=$result->num_rows;
        $session_basket=$_SESSION['session_basket'];
        }else{
            $_SESSION['session_basket']=0;
            $session_basket=$_SESSION['session_basket'];
        }
        return $session_basket;
    }
}
$basket=new Basket();


?>