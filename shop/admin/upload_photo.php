<?php include "class_photo.php"; ?>
<?php 
if(isset($_FILES['upload_file'])){
$photos->set_file($_FILES['upload_file']);

$photos->create();

    
    

// echo $photos->filename;
}

/*
$result=$photos->getById(79);

    echo $result->title."<br>";
    echo $result->description."<br>";
    echo $result->filename."<br>";
    echo $result->type."<br>";
    echo $result->size."<br>";
   
*/
?>

 <img src="<?php echo $result->picture_path(); ?>">


<!DOCTYPE html>
<html lang="en">
   <head>
      <link href="style.css" rel="stylesheet">
      <title>Shop</title>
       
   </head>
   <body>
     
       
   </body>
    
    
    
    
</html>